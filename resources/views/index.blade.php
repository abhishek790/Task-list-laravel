<h1>
The list of tasks
</h1>

<div>
    

    @forelse($tasks as $task)
        <div>
            {{-- in route we pass route name and also parameter --}}
            <a href="{{route('tasks.show',['id'=>$task->id])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>


    