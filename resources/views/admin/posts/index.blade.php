@extends('layouts.admin')
@section('contentt')


    <div class="container">
        <a href="/admin/posts/create">
            <button class="btn btn-primary">create</button>
        </a>
        <br><br>
    </div>
    <div class="col-xs-4">

        @if(Session::has('PostDeleted'))
            <p class="alert alert-danger">
                deleted
            </p>
        @endif
    </div>
    <div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>user</th>
            <th>photo</th>
            <th>category</th>
            <th>title</th>
            <th>body</th>
            <th>Updated</th>
            <th>edit</th>
            <th>delete</th>

        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->user? $post->user->name : "--"}}</td>
                    <td><img height="100px" width="200px" src="{{$post->photo ? $post->photo->file : "http://lorempixel.com/100/100/sports/"}}" alt=""></img></td>
                    <td>{{$post->category ? $post->category->title : "--"}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ URL::to('admin/posts/'.$post->id.'/edit')  }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="{{URL::to('postdelete/'.$post->id)}}">
                            <i class="fa fa-trash-o" aria-hidden="false"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    </div>


    @stop