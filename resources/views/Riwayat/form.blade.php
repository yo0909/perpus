<div class="form-group{{ $errors->has('kodebuku_id') ? ' has-error' : '' }}">
  {!! Form::label('kodebuku_id', 'Kodebuku', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::select('kodebuku_id', [''=>'']+App\Kodebuku::pluck('kodebuku','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih Kodebuku']) !!}
        {!! $errors->first('kodebuku_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('lamapeminjaman') ? ' has-error' : '' }}">
  {!! Form::label('lamapeminjaman', 'Lama Peminjaman', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::number('lamapeminjaman', null, ['class'=>'form-control']) !!}
        {!! $errors->first('lamapeminjaman', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group{{ $errors->has('denda') ? ' has-error' : '' }}">
  {!! Form::label('denda', 'Denda', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('denda', null, ['class'=>'form-control']) !!}
        {!! $errors->first('denda', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
  {!! Form::label('user_id', 'User', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
         {!! Form::select('user_id', [''=>'']+App\User::pluck('name','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih User']) !!}
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>