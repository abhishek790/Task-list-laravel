@extends('layouts.app')

@section('title',$task->title)

@section('content')
<div class ="mb-4">
    <a href="{{route('tasks.index')}}" class = "link"><- Go back to the task list!</a>
</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>

@if($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif

{{-- diffForHumans will show time like 1 day ago , 23 hours ago --}}
<p class = "mb-4 text-sm text-slate-500">Created {{$task->created_at->diffForHumans()}} • Updated {{$task->updated_at->diffForHumans()}} </p>


{{-- toggling --}}
<p class ="mb-4">
    @if($task->complete)
        <span class ="font-medium text-green-500">Completed</span>
    @else
    <span class ="font-medium text-red-500">Not Completed</span> 
    @endif
</p>

<div class ='flex gap-2'>
    <a href="{{route('tasks.edit',['task'=> $task->id])}}" class="btn">Edit</a>

    {{-- TOGGLING. the end point is using the put so we need form for that --}}
    <form action="{{route('tasks.toggle-complete',['task'=>$task->id])}}" method ="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn ">
            Mark as {{$task->complete? 'not completed':'completed'}}
        </button>
    
    </form>

    <form action="{{route('tasks.destroy',['task' => $task->id])}}" method='POST'>
        @csrf
        @method('DELETE')
        <button type ="submit" class="btn">Delete</button>
    </form>
</div>
@endsection