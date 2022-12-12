<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class first extends Controller
{
    //
    public function index()
    {
        return view('my_first_page');

    }
    public function display(Request $req)
    {
        $name=$req->name;
        return 'Welcome '.$name;
    }
}
