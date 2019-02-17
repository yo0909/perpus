@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/admin/riwayat') }}">riwayat</a></li>
						<li><class="active">Ubah riwayat</li>
					</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title">Ubah riwayat</h2>
							</div>
								<div class="panel-body">
									{!! Form::model($riwayat,['url' => route ('riwayat.update',$riwayat->id),'method'=>'put','class'=>'form-horizontal']) !!}
										@include('riwayat.form')
										{!! Form::close() !!}
									</div>
							</div>
					</div>
			</div>
		</div>
@endsection