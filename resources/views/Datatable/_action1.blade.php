{!! Form::model($model,['url' => $form_url, 'method'=> 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
	{!! Form::submit('Pengembalian', ['class'=>'btn btn-xs btn-primary']) !!}
{!! Form::close() !!}