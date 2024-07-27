<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenggunaModel;

class Pengguna extends Controller
{
  public function index()
  {
    $pengguna = PenggunaModel::all();
    return view('content.pengguna.index', compact('pengguna'));
  }
}
