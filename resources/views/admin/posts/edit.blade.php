@extends('layouts.admin')
@section('contentt')
    <div class="col-md-6">
        <img height="400px" width="400px" src="{{$post->photo ? $post->photo->file : ""}}" alt="" class="img-responsive img-round">
    </div>
    <div class="col-md-6">
        {!! Form::model($post,['method'=>'PUT','action'=>['PostsController@update',$post->id],'files'=>true]) !!}

        <div class="form-group ">
            {!! Form::text('name',$post->title,['class'=>'form-control','placeholder'=>'Enter name']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('email',$post->body,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('category_id',$cat,null,['class'=>'custom-select']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file','Select Picture',['class'=>'custom-file']) !!}
            {!! Form::file('photo_id',null,['class'=>'custom-file-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('edit',['class'=>'btn btn-primary']) !!}
        </div>
        <div>
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
        </div>
        {!! Form::close() !!}
    </div>

@endsection