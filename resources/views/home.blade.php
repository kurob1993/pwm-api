@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">API KEY</div>

                <div class="card-body">
                    <code>{{ $user->api_token }}</code>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">USAGE</div>

                <div class="card-body">
                    <code>
                        curl --location --request POST 'https://pwm.kurob.web.id/api/v1/message/store?number=628992141874&text=TEST%20API%20WA%203' \
                        --header 'Accept: application/json' \
                        --header 'Authorization: Bearer **api key** '
                    </code>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
