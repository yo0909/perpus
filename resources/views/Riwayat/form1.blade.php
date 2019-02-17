<div class="form-group{{ $errors->has('kodebuku_id') ? ' has-error' : '' }}">
  {!! Form::label('kodebuku_id', 'Kodebuku', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::select('kodebuku_id', [''=>'']+App\Kodebuku::pluck('kodebuku','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih Kodebuku','disabled' => 'disabled']) !!}
        {!! $errors->first('kodebuku_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
  {!! Form::label('created_at', 'Tanggal Peminjaman', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('created_at', null, ['class'=>'form-control','disabled' => 'disabled']) !!}
        {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('due') ? ' has-error' : '' }}">
  {!! Form::label('due', 'Tanggal Kembali', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('due', null, ['class'=>'form-control','disabled' => 'disabled']) !!}
        {!! $errors->first('due', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('den') ? ' has-error' : '' }}">
  {!! Form::label('den', 'Denda', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('den', null, ['class'=>'form-control','disabled' => 'disabled']) !!}
        {!! $errors->first('den', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
  {!! Form::label('user_id', 'User', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
         {!! Form::select('user_id', [''=>'']+App\User::pluck('name','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih User']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Kembalikan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>