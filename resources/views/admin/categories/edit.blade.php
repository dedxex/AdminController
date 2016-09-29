@extends('layouts.admin')
@section('contentt')
    <div class="col-xs-5">
        <div class="form-group">
            {!! Form::model($category,['method'=>'PUT','action'=>['categoriesController@update',$category->id]]) !!}
            {!! Form::text('title',$category->title,['class'=>'form-control']) !!}
            <br>
            <div class="form-group">
                {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @stop