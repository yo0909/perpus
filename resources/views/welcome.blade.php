<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="/css/font-awesome.min.css" rel='stylesheet' type='text/css'> 
    <link href="/css/jquery.dataTables.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/selectize.css" rel="stylesheet"> 
    <link href="/css/selectize.bootstrap3.css" rel="stylesheet"> 
    <link href="/css/app.css" rel="stylesheet"> 
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Cari Buku"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="btn btn-primary"></span>
                        </button>
                    </span>
                </div>
            </form>
            <div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample Book details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Penulis</th>
                <th>Judul Buku</th>
                <th>Kode buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $book)
            <tr>
                <td>{{$book->penulis->nama}}</td>
                <td>{{$book->judul}}</td>
                @foreach($book->kodebuku as $kode)
                <td>{{$kode->kodebuku}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
            </div>
        </div>
    </body>
</html>
