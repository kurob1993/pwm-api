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
                    <div class="table-responsive">
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
                                        <form action="{{ route('update.priority',$item->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            @if ($item->priority->priority)
                                            <button class="btn btn-sm btn-secondary" type="submit"
                                                href="{{ route('update.priority',$item->id) }}">
                                                Switch to Basic</button>
                                            @else
                                            <button class="btn btn-sm btn-primary" type="submit"
                                                href="{{ route('update.priority',$item->id) }}">
                                                Switch to Priority</button>
                                            @endif
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
