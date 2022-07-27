<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Post_imgesController extends Controller
{
    //
    public function index() {
        return view('top-admin/top-admin-main');
    }

    public function create() {
        return view('top-admin/top-admin-post');
    }

    public function store(Request $request) {

    }
}
