<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }
}
