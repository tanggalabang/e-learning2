

@if(session('success'))
<script>
  swal({
  title: 'Sukses',
  text: '{{ session('success') }}',
  icon: 'success',
  });
</script>
@endif

<script>
  function showConfirmation(event, userId) {
  event.preventDefault(); // Mencegah form dikirimkan secara langsung no
  swal({
  title: "Are you h?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  }).then((willDelete) => {
  if (willDelete) {
  // Submit form
  document.getElementById("deleteForm-" + userId).submit(); // Mengirimkan form jika pengguna menekan tombol 'OK'
  // Lanjutkan dengan penghapusan
  }
  });
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  const table = document.getElementById("dataTable");

  table.addEventListener("click", function(event) {
  if (event.target.classList.contains("btn-delete-row")) {
  event.target.closest("tr").remove();
  }
  });

  document.getElementById("btnTambahBaris").addEventListener("click", function() {
  const row = table.insertRow(table.rows.length);
  row.innerHTML = `
  <td>
  <input type="text" name="nis[]" class="form-control">
  </td>
  <td>
  <input type="text" name="nama[]" class="form-control">
  </td>
  <td>
  <select name="gender[]" class="custom-select">
  <option selected>Choose...</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  </select>
  </td>
  <td>
  <input type="text" name="email[]" class="form-control">
  </td>
  <td>
  <select name="kelas[]" class="custom-select">
  <option selected>Choose...</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  </select>
  </td>
  <td>
  <button type="button" class="btn btn-icon btn-danger btn-delete-row"><i class="fas fa-times"></i></button>
  </td>
  `;
  });
  });
</script>

@if(!empty(session('error')))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif

@if(!empty(session('payment-error')))
<div class="alert alert-error" role="alert">
  {{ session('payment-error') }}
</div>
@endif

@if(!empty(session('warning')))
<div class="alert alert-warning" role="alert">
  {{ session('warning') }}
</div>
@endif

@if(!empty(session('info')))
<div class="alert alert-info" role="alert">
  {{ session('info') }}
</div>
@endif

@if(!empty(session('secondary')))
<div class="alert alert-secondary" role="alert">
  {{ session('secondary') }}
</div>
@endif

@if(!empty(session('primary')))
<div class="alert alert-primary" role="alert">
  {{ session('primary') }}
</div>
@endif

@if(!empty(session('light')))
<div class="alert alert-light" role="alert">
  {{ session('light') }}
</div>
@endif