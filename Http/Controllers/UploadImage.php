<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Test;

class UploadImage extends Controller
{
    public function store(request $request)
    {
        $path=$request->file('image')->store('upload');
        echo $path;
        echo "test";
    }
}
