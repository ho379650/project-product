<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
</head>
<body>
    @include('layouts.inc.navbar')
<div class="container" style="margin-top: 60px">
    @yield('content')
    
</div>
 <script src= "{{asset('frontend/js/bootstrap.min.js')}}"></script>
</body>
</html>