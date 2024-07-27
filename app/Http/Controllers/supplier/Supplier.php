<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierModel;

class Supplier extends Controller
{
  public function index()
  {
    $supplier = SupplierModel::all();
    return view('content.supplier.index', compact('supplier'));
  }
}
