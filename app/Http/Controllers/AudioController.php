<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('audio', 'public');
            return response()->json(['success' => true, 'filePath' => $path]);
        }
        return response()->json(['success' => false]);
    }
}
