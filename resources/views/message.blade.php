@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Message</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Text</th>
                                <th>Create By</th>
                                <th>Stage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $item)
                                <tr>
                                    <td scope="row">{{$item->number}}</td>
                                    <td>{{$item->text}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{!! $item->stage->getLabel() !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $message->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
