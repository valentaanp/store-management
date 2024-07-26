@extends('layouts/contentNavbarLayout') @section('title', 'Dashboard')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <div class="d-flex align-items-center justify-content-between">
    <h5 class="card-header">List Barang</h5>
    <button
      class="btn btn-primary m-4"
      data-bs-toggle="modal"
      data-bs-target="#editModal"
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
          <th>Kategori</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th class="text-center">Action</th>
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
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"
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
          <td>{{ $item->IdBarang }}</td>
          <td>{{ $item->NamaBarang }}</td>
          <td>{{ $item->Keterangan }}</td>
          <td>{{ $item->Satuan }}</td>
          <td>{{ $item->IdPengguna }}</td>
          <td class="text-center">
            <button
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#editModal"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Edit"
            >
              <i class="bx bx-edit"></i>
            </button>
            <button
              class="btn btn-danger"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Delete"
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

<!-- Edit Modal -->
<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  aria-labelledby="editModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="itemId" />
          <div class="mb-3">
            <label for="itemName" class="form-label">Nama Item</label>
            <input type="text" class="form-control" id="itemName" />
          </div>
          <div class="mb-3">
            <label for="itemCategory" class="form-label">Kategori</label>
            <select class="form-select" id="itemCategory">
              <option value="Personal Care">Personal Care</option>
              <option value="Household">Household</option>
              <!-- Add other categories as needed -->
            </select>
          </div>
          <div class="mb-3">
            <label for="itemPrice" class="form-label">Harga</label>
            <input type="text" class="form-control" id="itemPrice" />
          </div>
          <div class="mb-3">
            <label for="itemQuantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="itemQuantity" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" id="saveChangesButton">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>

@endsection @section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var editModal = document.getElementById("editModal");
    var editModalLabel = document.getElementById("editModalLabel");
    var saveChangesButton = document.getElementById("saveChangesButton");

    // Event listener for showing the modal
    editModal.addEventListener("show.bs.modal", function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute("data-id");
      var name = button.getAttribute("data-name");
      var category = button.getAttribute("data-category");
      var price = button.getAttribute("data-price");
      var quantity = button.getAttribute("data-quantity");

      var modalId = editModal.querySelector("#itemId");
      var modalName = editModal.querySelector("#itemName");
      var modalCategory = editModal.querySelector("#itemCategory");
      var modalPrice = editModal.querySelector("#itemPrice");
      var modalQuantity = editModal.querySelector("#itemQuantity");

      if (id) {
        editModalLabel.textContent = "Edit Item";
        saveChangesButton.textContent = "Save changes";
        modalId.value = id;
        modalName.value = name;
        modalCategory.value = category;
        modalPrice.value = price;
        modalQuantity.value = quantity;
      } else {
        editModalLabel.textContent = "Tambah Item Baru";
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
      editModalLabel.textContent = "Tambah Item Baru";
      saveChangesButton.textContent = "Tambah Item";
      var modalId = editModal.querySelector("#itemId");
      var modalName = editModal.querySelector("#itemName");
      var modalCategory = editModal.querySelector("#itemCategory");
      var modalPrice = editModal.querySelector("#itemPrice");
      var modalQuantity = editModal.querySelector("#itemQuantity");

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
      var modal = bootstrap.Modal.getInstance(editModal);
      modal.hide();
    });
  });
</script>
@endsection
