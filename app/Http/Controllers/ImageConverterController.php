<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $profile = $request->file('img');
        $profile_name = time() . rand(000, 999) . '.' . $profile->getClientOriginalExtension();
        $profile->move(public_path('text'), $profile_name);

        return back()->with('success', 'Image Converted to Text Successfully');
    }
}
