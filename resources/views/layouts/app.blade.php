<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/app.min.css">
  @stack('style')
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{url('')}}/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{url('')}}/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

</head>

<body>
<div id="app">
<div class="main-wrapper main-wrapper-1">
@include('layouts.header')
@yield('main')
@include('layouts.footer')
</div>
</div>
<!-- General JS Scripts -->
<script src="{{url('')}}/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="{{url('')}}/assets/bundles/sweetalert/sweetalert.min.js"></script>
<script src="{{url('')}}/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
@stack('scripts')
<script src="{{url('')}}/assets/js/page/sweetalert2.js"></script>
<script src="{{url('')}}/assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="{{url('')}}/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="{{url('')}}/assets/js/custom.js"></script>
@include('_message')
</body>

<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>