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

@if(session('success'))
<script>
  swal({
    title: 'Sukses',
    text: '{{ session('success') }}',
    icon: 'success',
  });
</script>
@endif