@extends('layouts/contentNavbarLayout') @section('title', 'Pelanggan')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Pelanggan</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Nama Pelanggan</th>
          <th>Kontak</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pelanggan as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->NamaPelanggan }}</td>
          <td>{{ $item->NoHp }}</td>
          <td>{{ $item->Alamat }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
