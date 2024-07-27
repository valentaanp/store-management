<?php

namespace App\Http\Controllers\hak_akses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HakAksesModel;

class HakAkses extends Controller
{
  public function index()
  {
    $hakakses = HakAksesModel::all();
    return view('content.hak_akses.index', compact('hakakses'));
  }
}
