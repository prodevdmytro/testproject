<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 CRUD Application - bishrulhaq.com</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css"> --}}
</head>
<body>
<div class="container" style="max-width: 1410px;">
    <div class="card" style="margin: 50px auto">
        <div class="card-body">
            @yield('content')
        </div>
    </div>
</div>

</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</html>