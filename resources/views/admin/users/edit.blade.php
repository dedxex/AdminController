@extends('layouts.admin')
@section('contentt')
    <div class="col-md-6">
        <img src="{{$user->photo ? $user->photo->file : ""}}" alt="" class="img-responsive img-round">
    </div>
    <div class="col-md-6">
        {!! Form::model($user,['method'=>'PUT','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

        <div class="form-group ">
            {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Enter name']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('isActive',array(0=>'Active',1=>'Sleep'),null,['class'=>'custom-select']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('role_id',$roles,null,['class'=>'custom-select'])!!}
        </div>
        <div class="form-group">
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password']) !!}
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