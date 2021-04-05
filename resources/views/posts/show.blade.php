@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-defualt">go back</a>
<h1>{{$post->title}}</h1>
    <img style="width:40%" src= "/storage/cover_images/{{$post->cover_image}}" alt="">

<p>{{$post->body}}</p>
<hr>
    <small>wrritten on:{{$post->created_at}}</small>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-defualt">edit</a>
<br><br>
{!!Form::open(['action'=> ['PostController@destroy',$post->id],'method' => 'POST','class' =>'pull-right'])!!}
{{form::hidden('_method','DELETE')}}
{{form::submit('delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
@endsection
