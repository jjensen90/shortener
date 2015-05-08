<div class="form-group">
    {!! Form::label('original_url', 'URL:') !!}
    {!! Form::text('original_url', '', ['class' => 'url_input']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>