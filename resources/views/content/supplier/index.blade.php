@extends('layouts/contentNavbarLayout') @section('title', 'Supplier')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Supplier</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Nama Supplier</th>
          <th>Alamat</th>
          <th>Kontak</th>
        </tr>
      </thead>
      <tbody>
        @foreach($supplier as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->NamaSupplier }}</td>
          <td>{{ $item->Alamat }}</td>
          <td>{{ $item->NoHp }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
