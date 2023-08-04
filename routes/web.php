<?php

use \App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//root route
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//get task
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

//create task form
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

//edit task form
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit');

// show tasks details
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);

})->name('tasks.show');

// create task in db
Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');

//update task in db
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
    ;
})->name('tasks.update');

//delete task
Route::delete('tasks/{task}', function (Task $task) {
    // this will delete data form the database
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

//fallback route
Route::fallback(function () {
    return 'Still got somewhere';
});

// resuable view that is common for different usecases