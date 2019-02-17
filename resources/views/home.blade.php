@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


    {{-- @if(isset($details)) --}}
        {{-- <p> The Search results for your query <b> {{ $query }} </b> are :</p> --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($book as $book)
            <tr>
                <td>{{$book->kodebuku->kodebuku}}</td>
                <td>{{$book->created_at->format('D, d M Y')}}</td>
                <td>{{$book->due->format('D, d M Y')}}</td>
                <td>{{$book->status}}</td>
            </tr>
             @endforeach 
        </tbody>
    </table>
    {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection
