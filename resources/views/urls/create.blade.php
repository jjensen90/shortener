@extends('app')

@section('content')
    <h4>Shorten a URL</h4>

    {!! Form::model(new Shortener\Models\Url, ['route' => ['urls.store']]) !!}
    @include('urls/partials/_form', ['submit_text' => 'Shorten URL'])
    {!! Form::close() !!}
@endsection