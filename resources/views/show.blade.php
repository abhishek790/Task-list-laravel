{{-- to inherit template we use extends directive --}}
@extends('layouts.app')

{{-- since we are not putting html code, we just want to specify the title we can just do like below and you don't need to close sections which don't contain html--}}
@section('title',$task->title)

{{-- now we say where to insert this data using section directive --}}
@section('content')

{{-- <h1>{{$task->title}}</h1> --}}
<p>{{$task->description}}</p>

@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

@endsection