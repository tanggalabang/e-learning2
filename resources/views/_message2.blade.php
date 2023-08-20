@if(!empty(session('success')))
<div id="flash" data-flash="{{ session('success') }}"></div>
@endif

<script>
  var flash = $('#flash').data('flash');
  if (flash) {
  Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'Something went wrong!'
  })
  }
</script>