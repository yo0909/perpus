@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/admin/kodebuku') }}">KodeBuku</a></li>
						<li>class="active">Ubah KodeBuku</li>
					</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title">Ubah KodeBuku</h2>
							</div>
								<div class="panel-body">
									{!! Form::model($kodebuku,['url' => route ('kodebuku.update',$kodebuku->id),'method'=>'put','class'=>'form-horizontal']) !!}
										@include('kodebuku.form')
										{!! Form::close() !!}
									</div>
							</div>
					</div>
			</div>
		</div>
@endsection