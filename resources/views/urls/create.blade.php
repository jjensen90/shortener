@extends('app')

@section('content')
    <div class="page-header">
        <h1>Shorten a URL</h1>
    </div>


    {!! Form::model(new Shortener\Models\Url, ['route' => ['urls.store']]) !!}
        @include('urls/partials/_form', ['submit_text' => 'Shorten URL'])
    {!! Form::close() !!}
@endsection