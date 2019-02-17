<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
  {!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('penulis_id') ? ' has-error' : '' }}">
  {!! Form::label('penulis_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::select('penulis_id', [''=>'']+App\Penuli::pluck('nama','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih Penulis']) !!}
        {!! $errors->first('penulis_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
  {!! Form::label('tahun_terbit', 'Tahun Terbit', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('tahun_terbit', null, ['class'=>'form-control']) !!}
        {!! $errors->first('tahun_terbit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('sinopsis') ? ' has-error' : '' }}">
  {!! Form::label('sinopsis', 'Sinopsis', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('sinopsis', null, ['class'=>'form-control']) !!}
        {!! $errors->first('sinopsis', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>