<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index() {

        $fileTree = Storage::allFiles();
        return view('admin.file.index', compact('fileTree'));
    }
}
