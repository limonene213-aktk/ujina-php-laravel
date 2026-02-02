<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request; //お願い
use Illuminate\Http\Response; //お返事

class UjinaController extends Controller
{
    public function index()
    {
        return view('ujina2025.ujina');
    }

}
