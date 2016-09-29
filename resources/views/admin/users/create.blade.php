@extends('layouts.admin')
@section('contentt')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('isActive',array(0=>'Active',1=>'Sleep'),1,['class'=>'custom-select']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('role_id',$roles,1,['class'=>'custom-select'])!!}
    </div>
    <div class="form-group">
        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file','Select Picture',['class'=>'custom-file']) !!}
        {!! Form::file('photo_id',null,['class'=>'custom-file-input']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
@endsection