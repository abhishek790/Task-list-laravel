@extends('layouts.app')

@section('title','The list of tasks')

@section('content')
    <div>
        <a href="{{route('tasks.create')}}">Add Task</a>
    </div>

    @forelse($tasks as $task)
        <div>
            
            <a href="{{route('tasks.show',['task'=>$task->id])}}">{{$task['title']}}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    {{--PAGINATION this will chech if there are any task --}}
    @if($tasks)
        {{-- if we have any tasks at all then we need to display the links and we do that by calling links method of the passed variable --}}
        <nav>
            {{$tasks ->links()}}
        </nav>
    @endif

@endsection

    