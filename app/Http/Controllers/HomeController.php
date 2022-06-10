<?php

namespace App\Http\Controllers;

use App\Http\Icon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $icons = Icon::getBiIcons();

        return view('home', compact('icons'));
    }
}
