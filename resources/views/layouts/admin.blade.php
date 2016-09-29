@extends('layouts.app')
@section('content')
<div class="container">
    <nav class="navbar navbar">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin/users">Users</a>
            <a class="navbar-brand" href="/admin/posts">Posts</a>
            <a class="navbar-brand" href="/admin/categories">Categories</a>
            <a class="navbar-brand" href="/admin/images">Gallery</a>
        </div>
    </nav>
</div>
    <div class="container">
        @yield('contentt')



    </div>
@endsection
