<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ImageConverterController extends Controller
{
    public function text()
    {
        return view('convert.text');
    }


    public function textConvert(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        // get picture
        $img = $request->file('img');
        $img_name = time() . rand(000, 999) . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('text'), $img_name);

        try {

            $data = (new TesseractOCR('text/' . $img_name))
                ->setLanguage('eng')
                ->run();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return back()->with('result', ['img' => $img_name, 'data' => $data]);
    }
}
