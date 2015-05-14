@extends('app')

@section('content')
    <div id="click-to-copy-success" class="alert-info alert" style="display:none;">Copied to Clipboard!</div>
    <div class="page-header">
        <h1>Shortened URL</h1>
    </div>

    <div class="form-group form-group-lg">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="shortened_url" readonly="readonly" value="{{ $full_shortened_url }}">
            <span class="input-group-btn">
                <button class="btn btn-default" id="shortened_url_copy" data-clipboard-target="shortened_url" type="button">Copy</button>
            </span>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Info</h3>
        </div>
        <div class="panel-body">
            <p><strong>Original URL:</strong> <a href="{{ $url->original_url }}">{{ $url->original_url }}</a></p>

            <p><strong>URL QR Code:</strong></p>
            <img src="data:image/png;base64,{!! $url_qr !!}"/>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Statistics</h3>
        </div>
        <div class="panel-body">
            <p><strong>First Created: </strong>{{ date('M jS Y', strtotime($url->created_at)) }}</p>

            <p><strong>Total Visits: </strong>{{ $url->visits }}</p>
        </div>
    </div>

@endsection