@extends('app')

@section('content')
    <h4>Shortened URL Info:</h4>
    <p><strong>Original URL:</strong> <a href="{{ $url->original_url }}">{{ $url->original_url }}</a></p>
    <p><strong>Shortened URL: </strong></strong><input name="shortened_url" id="shortened_url" class="url_input"
                             readonly="readonly" type="text" value="{{ $full_shortened_url }}"></p>
    <p><strong>First Created: </strong>{{ date('M jS Y', strtotime($url->created_at)) }}</p>
    <p><strong>Total Visits: </strong>{{ $url->visits }}</p>

    <p><strong>URL QR Code:</strong></p>
    <img src="data:image/png;base64,{!! $url_qr !!}" />
@endsection