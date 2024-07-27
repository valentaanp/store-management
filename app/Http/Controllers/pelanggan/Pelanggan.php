<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PelangganModel;

class Pelanggan extends Controller
{
  public function index()
  {
    $pelanggan = PelangganModel::all();
    return view('content.pelanggan.index', compact('pelanggan'));
  }
}
