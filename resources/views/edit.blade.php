@extends('layouts.app')

@section('title','Edit Task')


@section('styles')
<style>
    .error-message{
        color:red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')

<form action="{{route('tasks.update',['id'=>$task->id])}}" method="POST">  
@csrf
{{-- In html only supports POST or GET http methods,but for the edit form we will be using a put method as it is well suitable for cases where you update an existing resource, typically you shouldn't use post for that. So to solve it we have laravel directive  called method where we can specify put.
--}}
@method('PUT')
<div>
    <label for="title">Title</label>
    <input type="text" id ="title" name = "title" value = "{{$task->title}}">
    @error('title')
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10">{{$task->description}}</textarea>
    @error('description')
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <label for="long_description">Description</label>
    <textarea name="long_description" id="long_description" cols="30" rows="10">{{$task->long_description}}</textarea>
    @error('long_description')
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <button type= "submit">Edit Task</button>
</div>
</form>

@endsection