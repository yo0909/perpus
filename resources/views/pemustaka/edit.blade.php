@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li><a href="{{ url('/admin/pemustaka') }}"> pemustaka</a></li>
						<li>class="active">Ubah pemustaka</li>
					</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title">Ubah pemustaka</h2>
							</div>
								<div class="panel-body">
									{!! Form::model($pemustaka,['url' => route ('pemustaka.update',$pemustaka->id),'method'=>'put','class'=>'form-horizontal']) !!}
										@include('pemustaka.form')
										{!! Form::close() !!}
									</div>
							</div>
					</div>
			</div>
		</div>
@endsection