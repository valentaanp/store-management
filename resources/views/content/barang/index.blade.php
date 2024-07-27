@extends('layouts/contentNavbarLayout') @section('title', 'Barang')
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
<!-- Responsive Table -->
<div class="card">
  <div class="d-flex align-items-center justify-content-between">
    <h5 class="card-header">List Barang</h5>
    <button
      class="btn btn-primary m-4"
      data-bs-toggle="modal"
      data-bs-target="#modalBarang"
      id="addNewItemButton"
    >
      + Tambah Barang
    </button>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Nama Item</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <!-- <th>Pengguna</th> -->
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($barang as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="id-barang d-none">{{ $item->IdBarang }}</td>
          <td class="nama-barang">{{ $item->NamaBarang }}</td>
          <td class="desk-barang">{{ $item->Keterangan }}</td>
          <td class="harga-barang">
            {{ $item->HargaPerBarang }} / {{ $item->Satuan }}
          </td>
          <td class="jumlah-barang">{{ $item->Jumlah }}</td>
          <!-- <td>{{ $item->IdPengguna }}</td> -->
          <td class="text-center">
            <button
              class="btn btn-primary edit-barang"
              data-bs-toggle="modal"
              data-bs-target="#modalBarang"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Edit"
            >
              <i class="bx bx-edit"></i>
            </button>
            <button
              class="btn btn-danger delete-barang"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Delete"
              data-id="{{ $item->IdBarang }}"
            >
              <i class="bx bx-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->

<!-- Edit / Add Modal -->
<div
  class="modal fade"
  id="modalBarang"
  tabindex="-1"
  aria-labelledby="modalBarangLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBarangLabel"></h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formBarang" action="/tambah-barang" method="POST">
          @csrf
          <input type="hidden" id="itemId" name="itemId" />
          <div class="mb-3">
            <label for="itemName" class="form-label">Nama Item</label>
            <input
              type="text"
              class="form-control"
              id="itemName"
              name="itemName"
              placeholder="Nama barang"
              required
            />
          </div>
          <div class="mb-3">
            <label for="itemDesc" class="form-label">Deskripsi</label>
            <textarea
              name="itemDesc"
              id="itemDesc"
              placeholder="Deskripsi barang"
              required
              class="form-control"
              rows="3"
            ></textarea>
          </div>
          <div class="mb-3">
            <label for="itemPrice" class="form-label">Detail Harga</label>
            <div class="input-group">
              <input
                type="number"
                aria-label="Item Price"
                id="itemPrice"
                name="itemPrice"
                class="form-control"
                placeholder="Harga barang"
                required
              />
              <span class="input-group-text">/</span>
              <select
                class="form-select"
                id="itemUnit"
                name="itemUnit"
                required
              >
                <option selected="unit" value="unit">Unit</option>
                <option value="pieces">Pcs (Pieces)</option>
                <option value="kilogram">Kg (Kilogram)</option>
                <option value="gram">G (Grams)</option>
                <option value="meter">M (Meter)</option>
                <option value="liter">Liter</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="itemQuantity" class="form-label">Jumlah</label>
            <input
              type="number"
              class="form-control"
              id="itemQuantity"
              name="itemQuantity"
              required
              placeholder="Jumlah barang yang tersedia"
            />
          </div>
          <div class="mt-5 p-0 modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Tutup
            </button>
            <button
              type="submit"
              class="btn btn-primary"
              id="saveChangesButton"
            >
              Tambah Barang
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection @section('page-script')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    var modalBarang = $("#modalBarang");

    // Tambah Barang Clicked
    $(document).on("click", "#addNewItemButton", function () {
      $("#formBarang").attr("action", "/barang/tambah-barang");
      modalBarang.find("#modalBarangLabel").text("Tambah Barang");
      $("#formBarang").trigger("reset"); // Reset the form fields
      modalBarang.modal("show");
    });

    // Edit Barang Clicked
    $(document).on("click", ".edit-barang", function () {
      var row = $(this).closest("tr");
      var idBarang = row.find(".id-barang").text().trim();
      var namaBarang = row.find(".nama-barang").text().trim();
      var deskBarang = row.find(".desk-barang").text().trim();
      var hargaBarang = row
        .find(".harga-barang")
        .text()
        .trim()
        .split(" / ")[0]
        .trim();
      var satuanBarang = row
        .find(".harga-barang")
        .text()
        .trim()
        .split(" / ")[1]
        .trim();
      var jumlahBarang = row.find(".jumlah-barang").text().trim();

      console.log(satuanBarang);

      // Populate modal fields
      $("#itemId").val(idBarang);
      $("#itemName").val(namaBarang);
      $("#itemDesc").val(deskBarang);
      $("#itemPrice").val(hargaBarang);
      $("#itemUnit").val(satuanBarang);
      $("#itemQuantity").val(jumlahBarang);

      // Update modal title and form action
      modalBarang.find("#modalBarangLabel").text("Edit Barang");
      $("#formBarang").attr("action", "/barang/edit-barang/" + idBarang);

      // Show the modal
      modalBarang.modal("show");
    });

    // Delete Barang Clicked
    $(document).on("click", ".delete-barang", function () {
      var idBarang = $(this).data("id");
      console.log(idBarang);

      if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
          url: "/barang/hapus-barang/" + idBarang,
          type: "DELETE",
          success: function (result) {
            alert("Item deleted successfully");
            // Reload the page
            window.location.reload();
          },
          error: function (err) {
            alert("Error deleting item", err);
          },
        });
      }
    });
  });
</script>
@endsection
