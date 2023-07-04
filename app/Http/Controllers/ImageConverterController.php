<?php

namespace App\Http\Controllers;

use App\Models\History;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ImageConverterController extends Controller
{
    public function text()
    {
        return view('convert.text');
    }


    public function textConvert(Request $request)
    {
        $text = $this->getText($request->file('img'));
        if (!$text) {
            return back()->withErrors("Image Not Readable");
        }

        return back()->with('result', ['img' => $text['img'], 'data' => $text['data']]);
    }


    public function audio()
    {
        return view('convert.audio');
    }


    public function audioConvert(Request $request)
    {
        $text = $this->getText($request->file('img'));
        $text['data'] = preg_replace("/\r|\n/", " ", $text['data']);
        $audioFolder = 'audio';
        if (!file_exists($audioFolder)) {
            mkdir($audioFolder, 0777, true);
        }
        $outputFile = $audioFolder . '/' . rand(000000, 999999) . '.wav';
        exec('espeak-ng -p 75 -s 150 -w ' . $outputFile . ' "' . $text['data'] . '"');

        $history = History::find($text['history']);
        $history->type = 'Image to Audio';
        $history->audio = $outputFile;
        $history->save();

        return back()->with('result', ['img' => $text['img'], 'audio' => $outputFile]);
    }


    public function video()
    {
        return view('convert.video');
    }


    public function videoConvert(Request $request)
    {
        $validated = $request->validate([
            'color' => 'required|string|min:1',
            'fontSize' => 'required|string|min:1',
            'textColor' => 'required|string|min:1',
        ]);

        $text = $this->getText($request->file('img'));
        $text['data'] = preg_replace("/\r|\n/", " ", $text['data']);
        $outputImg = $text['img'];
        $audioFolder = 'audio';
        if (!file_exists($audioFolder)) {
            mkdir($audioFolder, 0777, true);
        }
        $audioFile = $audioFolder . '/' . rand(000000, 999999) . '.wav';
        exec('espeak-ng -p 75 -s 150 -w ' . $audioFile . ' "' . $text['data'] . '"');

        // Use FFmpeg to generate the video
        $ffmpegPath = 'ffmpeg'; // path to ffmpeg executable
        $videoFolder = 'video';
        if (!file_exists($videoFolder)) {
            mkdir($videoFolder, 0777, true);
        }
        $videoName = $videoFolder . '/' . rand(000000, 999999) . '.mp4'; // name of output video
        $backgroundColor = $validated['color']; // background color of video
        $textColor = $validated['textColor']; // background color of video
        $fontSize = $validated['fontSize']; // background color of video
        $data = $text['data']; // text to be displayed in video
        $audioPath = $audioFile; // path to audio file

        // Run the ffmpeg command to get the duration of the audio file
        $duration_output = shell_exec("ffmpeg -i \"$audioPath\" 2>&1");
        preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $duration_output, $matches);

        // Calculate the duration of the audio file in seconds
        $duration_seconds = ($matches[1] * 3600) + ($matches[2] * 60) + $matches[3] + 3;

        $cmd = "$ffmpegPath -y -f lavfi -i color=c=$backgroundColor:s=1920x1080:d=$duration_seconds -i $audioPath -filter_complex \"[0:v]drawtext=fontfile=/Windows/Fonts/arial.ttf:text='$data':fontcolor='$textColor':fontsize='$fontSize':y=(h-text_h)/2:x=-200*t:box=1:boxcolor=black@0.5:boxborderw=5[v];[v][1:a]concat=n=1:v=1:a=1\" $videoName";
        exec($cmd);


        $history = History::find($text['history']);
        $history->type = 'Image to Video';
        $history->video = $videoName;
        $history->save();

        return back()->with('result', ['img' => $outputImg, 'video' => $videoName]);
    }

    public function getText($img)
    {
        $validated = Validator::make(['img' => $img], [
            'img' => 'required|image|mimes:jpeg,gif,png,jpg|max:5000',
        ]);

        if ($validated->fails()) {
            throw new Exception('Invalid image file');
        }

        // get picture
        $img_name = time() . rand(000, 999) . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('text'), $img_name);

        try {
            $data = (new TesseractOCR('text/' . $img_name))
                ->setLanguage('eng')
                ->run();

            // saving data to database
            $history = new History();
            $history->type = 'Image to Text';
            $history->attachment = $img_name;
            $history->result = $data;
            $history->save();
        } catch (Exception $e) {
            return false;
        }

        return ['img' => $img_name, 'data' => $data, 'history' => $history->id];
    }
}
