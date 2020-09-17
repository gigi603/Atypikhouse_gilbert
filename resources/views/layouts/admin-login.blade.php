<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   {{-- Title --}}
  <title>Atypikhouse - Connexion admin</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin-component/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin-component/css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('admin-component/css/custom-admin-login.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
    @yield('content')
    <script src="{{ asset('admin-component/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-component/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-component/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>
</html>