<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="\resources\js\app.js">
</head>
<body>
    <div class="container">
        <h1>Products App</h1>

        {{-- Successful Creation Message --}}
        @if(session()->get('success'))
        <div class="toast toast-success">
            {{session()->get('success')}}
        </div>
        @endif

        {{-- Content inserts here --}}
        <div class ="mt-1">
            @yield('content')
        </div>
    </div> 
    <script src="/js/app.js"></script>  
</body>
</html>