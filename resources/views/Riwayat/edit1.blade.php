@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/admin/riwayat') }}">riwayat</a></li>
						<li><class="active">pengembalian</li>
					</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title">pengembalian</h2>
							</div>
								<div class="panel-body">
									{!! Form::model($riwayat,['url' => route ('riwayat.update1',$riwayat->id),'method'=>'post','class'=>'form-horizontal']) !!}
										@include('riwayat.form1')
										{!! Form::close() !!}
									</div>
							</div>
					</div>
			</div>
		</div>
@endsection