<h1>
The list of tasks
</h1>

<div>
    {{-- @if(count($tasks)>0)
        <div>There are tasks!</div>
        @foreach($tasks as $task)
        <div>{{$task->title}}</div>
        @endforeach
    @else
    <div>There are no tasks!</div>
    @endif --}}

    @forelse($tasks as $task)
        <div>{{$task->title}}</div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>


    