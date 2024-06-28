<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
    public function uploadAudio(Request $request)
    {
        $request->validate([
            'audio' => 'required|file|mimes:mp3,wav',
        ]);

        $audioPath = $request->file('audio')->store('audio', 'public');

        return response()->json(['path' => $audioPath]);
    }
}
