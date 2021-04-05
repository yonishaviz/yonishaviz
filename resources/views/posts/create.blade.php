@extends('layouts.app')

@section('content')
<h1>create posts</h1>
 {!! Form::open(['action' => 'PostController@store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

{{form::label('title','Title')}}
        <br>
        {{form::text('title','',['class' => 'form-control','placeholder' =>'title'])}}
</div>
<div class="form-group">

{{form::label('body','Body')}}
            <br>
        {{form::textarea('body','',['class' => 'form-control','placeholder' =>'body'])}}
</div>
<div>
{{form::file('cover_image')}}



</div>
<div class="form-group">
<br>
        {{form::submit('Submit',['class'  =>'btn-primary'])}}
</div>
{!! Form::close() !!}
@endsection
