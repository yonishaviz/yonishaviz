@extends('layouts.app')
@section('content')
<h1>post</h1>
    @if(count($postss) > 0)
<div class="card">
<ul class="list-group list-group-flush">
@foreach($postss as $post)
    <div>
    <h3><a href ="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <small>wrritten on:{{$post->created_at}}</small>
            </div>

    <div>
    
    <img style="width:40%" src= "/storage/cover_images/{{$post->cover_image}}" alt="">
    </div>
    

@endforeach

@endif
    </ul>
</div>

@endsection
