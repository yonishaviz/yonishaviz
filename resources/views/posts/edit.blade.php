@extends('layouts.app')

@section('content')
<h1>edit posts</h1>
 {!! Form::open(['action' => ['PostController@update',$post->id],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

{{form::label('title','Title')}}
        <br>
        {{form::text('title',$post->title,['class' => 'form-control','placeholder' =>'title'])}}
</div>
<div class="form-group">

{{form::label('body','Body')}}
            <br>
        {{form::textarea('body',$post->body,['class' => 'form-control','placeholder' =>'title'])}}
</div>
<div>
{{form::file('cover_image')}}



</div>
<div class="form-group">
<br>
    {{form::hidden('_method','PUT')}}
        {{form::submit('Submit',['class'  =>'btn-primary'])}}
</div>
{!! Form::close() !!}
@endsection
