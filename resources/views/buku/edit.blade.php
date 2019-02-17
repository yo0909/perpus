@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/admin/buku') }}">Buku</a></li>
						<li>class="active">Ubah Buku</li>
					</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title">Ubah Buku</h2>
							</div>
								<div class="panel-body">
									{!! Form::model($buku,['url' => route ('buku.update',$buku->id),'method'=>'put','class'=>'form-horizontal']) !!}
										@include('buku.form')
										{!! Form::close() !!}
									</div>
							</div>
					</div>
			</div>
		</div>
@endsection