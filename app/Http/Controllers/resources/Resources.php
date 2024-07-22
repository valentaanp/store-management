<?php

namespace App\Http\Controllers\resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Resources extends Controller
{
    public function index()
    {
        return view('content.resources.index');
    }
}
