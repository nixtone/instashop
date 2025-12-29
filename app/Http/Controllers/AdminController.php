<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function login() {
        return view('admin.login');
    }

    public function index() {
        return view('admin.index');
    }



}
