@extends('layouts.app')
@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/themes/prism.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/plugins/autoloader/prism-autoloader.min.js"></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                API KEY
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <code>{{ $user->api_token }}</code>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                USAGE SEND MESSAGE
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                        aria-selected="true">HTTP</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">JavaScript - jQuery</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false">PHP - cURL</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-go"
                                        role="tab" aria-controls="nav-contact" aria-selected="false">GO- Native</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    @include('usage.send.http')
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    @include('usage.send.js')
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    @include('usage.send.php')
                                </div>
                                <div class="tab-pane fade" id="nav-go" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    @include('usage.send.go')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                USAGE GET LOCATION
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="location-http-tab" data-toggle="tab"
                                        href="#location-http" role="tab" aria-controls="location-http"
                                        aria-selected="true">HTTP</a>
                                    <a class="nav-item nav-link" id="location-js-tab" data-toggle="tab"
                                        href="#location-js" role="tab" aria-controls="location-js"
                                        aria-selected="false">JavaScript - jQuery</a>
                                    <a class="nav-item nav-link" id="location-php-tab" data-toggle="tab"
                                        href="#location-php" role="tab" aria-controls="location-php"
                                        aria-selected="false">PHP - cURL</a>
                                    <a class="nav-item nav-link" id="location-go-tab" data-toggle="tab" href="#location-go"
                                        role="tab" aria-controls="location-go" aria-selected="false">GO- Native</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="location-http" role="tabpanel"
                                    aria-labelledby="location-http-tab">
                                    @include('usage.location.http')
                                </div>
                                <div class="tab-pane fade" id="location-js" role="tabpanel"
                                    aria-labelledby="location-js-tab">
                                    @include('usage.location.js')
                                </div>
                                <div class="tab-pane fade" id="location-php" role="tabpanel"
                                    aria-labelledby="location-php-tab">
                                    @include('usage.location.php')
                                </div>
                                <div class="tab-pane fade" id="location-go" role="tabpanel"
                                    aria-labelledby="location-go-tab">
                                    @include('usage.location.go')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection