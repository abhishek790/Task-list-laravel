@extends('layouts.app')

@section('title','Add Task')


@section('styles')
<style>
    .error-message{
        color:red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')

<form action="{{route('tasks.store')}}" method="POST">  
@csrf

<div>
    <label for="title">Title</label>
    <input type="text" id ="title" name = "title">
    
    
    @error('title')
    
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    @error('description')
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <label for="long_description">Description</label>
    <textarea name="long_description" id="long_description" cols="30" rows="10"></textarea>
    @error('long_description')
    <p class="error-message" >{{$message}}</p>
    @enderror
</div>

<div>
    <button type= "submit">Add Task</button>
</div>
</form>

@endsection