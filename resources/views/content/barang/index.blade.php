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
        <!-- @php
      $items = [
        ['id' => 1, 'name' => 'Shampoo', 'category' => 'Personal Care', 'price' => '40000', 'quantity' => 120],
        ['id' => 2, 'name' => 'Toothpaste', 'category' => 'Personal Care', 'price' => '12000', 'quantity' => 200],
        ['id' => 3, 'name' => 'Hand Soap', 'category' => 'Household', 'price' => '10000', 'quantity' => 150],
        ['id' => 4, 'name' => 'Detergent', 'category' => 'Household', 'price' => '30000', 'quantity' => 80],
      ];
    @endphp
        @foreach ($items as $item)
      <tr>
        <th scope="row">{{ $item['id'] }}</th>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['category'] }}</td>
        <td>Rp {{ number_format($item['price'], 2, ',', '.') }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td class="text-center">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarang"
          data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}" data-category="{{ $item['category'] }}"
          data-price="{{ $item['price'] }}" data-quantity="{{ $item['quantity'] }}" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Edit">
          <i class="bx bx-edit"></i>
        </button>
        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
          <i class="bx bx-trash"></i>
        </button>
        </td>
      </tr>
    @endforeach -->
        @foreach($barang as $item)
        <tr>
          <td class="id-barang">{{ $item->IdBarang }}</td>
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
<!-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    var modalBarang = document.getElementById("modalBarang");
    var modalBarangLabel = document.getElementById("modalBarangLabel");
    var saveChangesButton = document.getElementById("saveChangesButton");

    // Event listener for showing the modal
    modalBarang.addEventListener("show.bs.modal", function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute("data-id");
      var name = button.getAttribute("data-name");
      var category = button.getAttribute("data-category");
      var price = button.getAttribute("data-price");
      var quantity = button.getAttribute("data-quantity");

      var modalId = modalBarang.querySelector("#itemId");
      var modalName = modalBarang.querySelector("#itemName");
      var modalCategory = modalBarang.querySelector("#itemCategory");
      var modalPrice = modalBarang.querySelector("#itemPrice");
      var modalQuantity = modalBarang.querySelector("#itemQuantity");

      if (id) {
        modalBarangLabel.textContent = "Edit Item";
        saveChangesButton.textContent = "Save changes";
        modalId.value = id;
        modalName.value = name;
        modalCategory.value = category;
        modalPrice.value = price;
        modalQuantity.value = quantity;
      } else {
        modalBarangLabel.textContent = "Tambah Item Baru";
        saveChangesButton.textContent = "Tambah Item";
        modalId.value = "";
        modalName.value = "";
        modalCategory.value = "Personal Care";
        modalPrice.value = "";
        modalQuantity.value = "";
      }
    });

    // Event listener for Add New Item button
    var addNewItemButton = document.getElementById("addNewItemButton");
    addNewItemButton.addEventListener("click", function () {
      modalBarangLabel.textContent = "Tambah Item Baru";
      saveChangesButton.textContent = "Tambah Item";
      var modalId = modalBarang.querySelector("#itemId");
      var modalName = modalBarang.querySelector("#itemName");
      var modalCategory = modalBarang.querySelector("#itemCategory");
      var modalPrice = modalBarang.querySelector("#itemPrice");
      var modalQuantity = modalBarang.querySelector("#itemQuantity");

      modalId.value = "";
      modalName.value = "";
      modalCategory.value = "Personal Care";
      modalPrice.value = "";
      modalQuantity.value = "";
    });

    // Event listener for Save Changes button
    saveChangesButton.addEventListener("click", function () {
      var id = document.getElementById("itemId").value;
      var name = document.getElementById("itemName").value;
      var category = document.getElementById("itemCategory").value;
      var price = document.getElementById("itemPrice").value;
      var quantity = document.getElementById("itemQuantity").value;

      if (id) {
        // Update existing item logic
        console.log("Updating item with ID:", id);
      } else {
        // Add new item logic
        console.log("Adding new item");
        console.log("Name:", name);
        console.log("Category:", category);
        console.log("Price:", price);
        console.log("Quantity:", quantity);
      }

      // Close modal
      var modal = bootstrap.Modal.getInstance(modalBarang);
      modal.hide();
    });
  });
</script> -->
<script>
  $(document).ready(function () {
    console.log("test");
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    var modalBarang = $("#modalBarang");

    // Tambah Barang Clicked
    $(document).on("click", "#addNewItemButton", function () {
      $("#formBarang").attr("action", "/tambah-barang");
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
      $("#formBarang").attr("action", "/edit-barang/" + idBarang);

      // Show the modal
      modalBarang.modal("show");
    });

    // Delete Barang Clicked
    $(document).on("click", ".delete-barang", function () {
      var idBarang = $(this).data("id");
      console.log(idBarang);

      if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
          url: "/hapus-barang/" + idBarang,
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
