<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Episodes</title>
</head>
<body>
    <h1>Episodes</h1>
    <div class="card-group">
    @if (count($episodes) == 0)
        <div class="card">
            <h1>There are no episodes to show at this time!</h1>

    @else 
    @foreach ($episodes as $show)
        <div class="card">
            <img class="card-img-top" src="{{ $show->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $show->name }}</h5>
                <p class="card-text">{!! $show->summary !!}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Season {{ $show->season }}, Episode {{ $show->episode }}</small>
            </div>
        </div>
    @endforeach    
    @endif
    
</body>
</html>