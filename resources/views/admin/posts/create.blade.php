@extends('layouts.admin')
@section('contentt')
    <div class="container">
        <h2>Create a Post</h2>
        {!! Form::open(['method'=>'POST','action'=>'PostsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Enter more']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('category_id',$cat,null,['class'=>'custom-select']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file','Select Picture',['class'=>'custom-file']) !!}
            {!! Form::file('photo_id',null,['class'=>'custom-file-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection