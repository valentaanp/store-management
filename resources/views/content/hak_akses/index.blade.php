@extends('layouts/contentNavbarLayout') @section('title', 'Hak Akses')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Hak Akses</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Nama Akses</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hakakses as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->NamaAkses }}</td>
          <td>{{ $item->Keterangan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
