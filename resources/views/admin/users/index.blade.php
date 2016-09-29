@extends('layouts.admin')
@section('contentt')
@parent
    <div class="">
        <div>
            <a href="/admin/users/create">
                <button class="btn btn-primary">create</button>
            </a>
            <br><br>
        </div>
        <div class="col-xs-4">

            @if(Session::has('userDeleted'))
                <p class="alert alert-danger">
                    deleted
                </p>
            @endif
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>status</th>
                <th>Added</th>
                <th>Updated</th>
                <th>edit</th>
                <th>delete</th>

            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)

                    <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->isActive == 0 ? "Active" : 'Sleep'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{ URL::to('admin/users/'.$user->id.'/edit')  }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="{{URL::to('userdelete/'.$user->id)}}">
                                    <i class="fa fa-trash-o" aria-hidden="false"></i>
                                </a>
                            </td>

                    </tr>
                    @endforeach
            @endif

            </tbody>
        </table>
    </div>
@endsection