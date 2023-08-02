<?php

use \App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [

        'tasks' => Task::latest()->get()

    ]);

})->name('tasks.index');


// ORDER OF ROUTE MATTERS IN BELOW WE HAVE ROUTE WITH PARAMETER SO IF I PUT THIS CODE BELOW THAT PARAMETER CODE IT WILL NOT WORK BECAUSE IT WILL ASSUME THIS /CREATE AS PARAMETER AND GO TO THAT ROUTE 
Route::view('/tasks/create', 'create')

    ->name('tasks.create');


Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {

    $data = $request->validate([

        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',

    ]);
    //creating new model
    $task = new Task;

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])
        // you can add flash message with a method called with() which lets you set some session data
        ->with('success', 'Task created successfully!');
    ;
})->name('tasks.store');

Route::fallback(function () {
    return 'Still got somewhere';
});