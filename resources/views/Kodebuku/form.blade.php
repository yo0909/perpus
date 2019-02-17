<div class="form-group{{ $errors->has('kodebuku') ? ' has-error' : '' }}">
  {!! Form::label('kodebuku', 'Kode Buku', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::text('kodebuku', null, ['class'=>'form-control']) !!}
        {!! $errors->first('kodebuku', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
  {!! Form::label('buku_id', 'Bukuid', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::select('buku_id', [''=>'']+App\Buku::pluck('judul','id')->all(), null, ['class'=>'js-selectize','placeholder'=>'Pilih Kodebuku']) !!}
        {!! $errors->first('buku_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>