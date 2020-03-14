@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Message
                    <button
                        class="btn btn-sm btn-primary float-right d-flex justify-content-center align-content-between"
                        data-toggle="modal" data-target="#modelId">
                        <i class="material-icons md-18 mr-1">input</i> <span>Input</span>
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th width="60%">Text</th>
                                <th width="10%">Create By</th>
                                <th>Stage</th>
                                <th width="10%">Create At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key => $item)
                            <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td>{{$item->number}}</td>
                                <td>{{ Str::limit($item->text, 100) }}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{!! $item->stage->getLabel() !!}</td>
                                <td>{{ $item->created_at}}</td>
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

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('message.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Input Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        @method('POST')
                        @csrf

                        <input type="number" class="form-control my-1" name="number"
                            placeholder="Number - ext: 628992141874" value="{{ old('number') }}">
                        <textarea name="text" id="" cols="30" rows="10" class="form-control"
                            placeholder="Message">{{ old('text') }}</textarea>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection