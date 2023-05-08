<?php

namespace App\Http\Controllers;

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
        return back()->with('result', ['img' => $text['img'], 'audio' => $outputFile]);
    }

    public function getText($img)
    {
        $validated = Validator::make(['img' => $img], [
            'img' => 'required|image|mimes:jpeg,png,jpg|max:5000',
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return ['img' => $img_name, 'data' => $data];
    }
}
