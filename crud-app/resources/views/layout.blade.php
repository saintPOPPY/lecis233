<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css%22%3E">
</head>
<body>
    <div class="container">
        <h1>Products App</h1>
        @if(session()->get('success'))
        <div class="toast toast-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class ="mt-1">
            @yield('content')
        </div>
    </div>   
</body>
</html>