<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Point Of Sales</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('inc.navbar')
            @include('inc.dash')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @include('inc.messages')
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
