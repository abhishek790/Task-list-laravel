<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [
        // this method here is starting a thing called query builder,which lets you build queries
        'tasks' => \App\Models\Task::latest()->get()

    ]);

})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    // lets you fetch a record form the database one single row by its primary key,if it cannot find the record it will call the abort function with 404 status code

    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');


Route::fallback(function () {
    return 'Still got somewhere';
});