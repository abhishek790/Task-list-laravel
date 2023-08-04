@extends('layouts.app')

@section('title',$task->title)

@section('content')

<p>{{$task->description}}</p>

@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

{{-- toggling --}}
<p>
    @if($task->complete)
        Completed
    @else
        Not Completed
    @endif
</p>

<div>
    <a href="{{route('tasks.edit',['task'=> $task->id])}}">Edit</a>
</div>

<div>
    {{-- TOGGLING. the end point is using the put so we need form for that --}}
    <form action="{{route('tasks.toggle-complete',['task'=>$task->id])}}" method ="POST">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{$task->complete? 'not completed':'completed'}}
        </button>
    
    </form>
</div>

<div>
    <form action="{{route('tasks.destroy',['task' => $task->id])}}" method='POST'>
        @csrf
        @method('DELETE')
        <button type ="submit">Delete</button>
    </form>
</div>
@endsection