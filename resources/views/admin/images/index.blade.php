@extends('layouts.admin')
@section('contentt')
    <div>
        @foreach($images as $image)
            <div class="cardstyle">
                <img class="img-rounded thumbnailss" width="400px" height="200px" src="{{$image->photo ? $image->photo->file : "http://lorempixel.com/400/200/sports/"}}" alt="Card image cap">
                <br><br>
            </div>
        @endforeach
            @foreach($images1 as $image)
                <div class="cardstyle">
                    <img class="img-rounded thumbnailss" width="400px" height="200px" src="{{$image->photo ? $image->photo->file : "http://lorempixel.com/400/200/sports/"}}" alt="Card image cap">
                    <br><br>
                </div>
            @endforeach
    </div>
    @stop