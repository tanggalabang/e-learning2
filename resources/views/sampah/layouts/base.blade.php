<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NzCoding - Laravel LivewireCRUD</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/app.min.css">
  @stack('style')
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{url('')}}/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/custom.css">
  @livewireStyles
</head>
<body>

{{ $slot }}

<!-- General JS Scripts -->
<script src="{{url('')}}/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="{{url('')}}/assets/bundles/sweetalert/sweetalert.min.js"></script>
<!-- Page Specific JS File -->
@stack('scripts')
<script src="{{url('')}}/assets/js/page/sweetalert2.js"></script>
<script src="{{url('')}}/assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="{{url('')}}/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="{{url('')}}/assets/js/custom.js"></script>
@livewireScripts
</body>
</html>