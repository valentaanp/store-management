@extends('layouts/contentNavbarLayout') @section('title', 'Dashboard')
@section('content')
<!-- Error and Success Alert -->
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  {{ Session::get('error') }}
  <button
    type="button"
    class="btn-close"
    data-bs-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endif @if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{ Session::get('success') }}
  <button
    type="button"
    class="btn-close"
    data-bs-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endif

<h1 class="mb-4">Laporan Laba Rugi</h1>
<div class="row">
  <div class="col-12 col-md-6">
    <div class="card">
      <div class="card-header">Total Pembelian</div>
      <div class="card-body">
        <h5 class="card-title">
          Rp {{ number_format($totalPembelian, 2, ",", ".") }}
        </h5>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <div class="card">
      <div class="card-header">Total Penjualan</div>
      <div class="card-body">
        <h5 class="card-title">
          Rp {{ number_format($totalPenjualan, 2, ",", ".") }}
        </h5>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header">Laba / Rugi</div>
      <div class="card-body">
        <h5 class="card-title">
          Rp {{ number_format($labaRugi, 2, ",", ".") }}
        </h5>
        @if ($labaRugi > 0)
        <p class="text-success">Profit</p>
        @else
        <p class="text-danger">Loss</p>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection @section('page-script') @endsection
