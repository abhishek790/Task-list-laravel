@extends('layouts.app')

@section('title','Add Task')

@section('content')
{{-- lets render the value of the special errors variable that laravel makes available to all views so it doesn't have to be passed from any routes --}}
{{$errors}}
<form action="{{route('tasks.store')}}" method="post">
    
@csrf
<div>
    <label for="title">Title</label>
    <input type="text" id ="title" name = "title">
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
</div>

<div>
    <label for="long_description">Description</label>
    <textarea name="long_description" id="long_description" cols="30" rows="10"></textarea>
</div>

<div>
    <button type= "submit">Add Task</button>
</div>
</form>


@endsection