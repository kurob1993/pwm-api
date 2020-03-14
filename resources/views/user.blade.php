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
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Is Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $item)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{!! $item->priority->getLabel() !!} {{$item->name}} </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->is_admin}}</td>
                                    <td>
                                        @if ($item->priority->priority)
                                        <a class="btn btn-sm btn-secondary" href="{{ route('update.priority',$item->id) }}">Switch to Basic</a>
                                        @else
                                        <a class="btn btn-sm btn-primary" href="{{ route('update.priority',$item->id) }}">Switch to Priority</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
