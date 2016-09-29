@extends('layouts.admin')
@section('contentt')
    <div class="container">
        <div class="col-xs-5">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>category</th>
                    <th>Updated</th>
                    <th>edit</th>
                    <th>delete</th>

                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)

                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{$category->updated_at?$category->updated_at->diffForHumans():"--"}}</td>
                            <td>
                                <a href="{{ URL::to('admin/categories/'.$category->id.'/edit')  }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="{{URL::to('catdelete/'.$category->id)}}">
                                    <i class="fa fa-trash-o" aria-hidden="false"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
        <div class="col-xs-5">
            <h2>Create a Category</h2>
            <div class="form-group">
                {!! Form::open(['method'=>'POST','action'=>'categoriesController@store']) !!}
                {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'enter category name']) !!}
                <br>
                <div class="form-group">
                    {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop