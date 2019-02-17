@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/admin/pemustaka') }}">pemustaka</a></li>
<li class="active">Tambah pemustaka</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah pemustaka</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('pemustaka.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('pemustaka.form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection