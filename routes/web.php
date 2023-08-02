<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [
        // latest will give the latest data created
        // this method here is starting a thing called query builder,which lets you build queries,sql queries in an object oriented way so when you are ready with your query you need to call this final get method to actually execute query and get the result. So all those methods return the instance of this query builder object so you can chain those methods and you can call different methods to modify the query slightly
        'tasks' => \App\Models\Task::latest()->get()

    ]);

})->name('tasks.index');

// incases where you don't really need to fetch any additional data like we had in above 2 routes,you don't need to use the get method of the route class. You can just use the view and write route name and view file name
// ORDER OF ROUTE MATTERS IN BELOW WE HAVE ROUTE WITH PARAMETER SO IF I PUT THIS CODE BELOW THAT PARAMETER CODE IT WILL NOT WORK BECAUSE IT WILL ASSUME THIS /CREATE AS PARAMETER AND GO TO THAT ROUTE 
Route::view('/tasks/create', 'create');


Route::get('/tasks/{id}', function ($id) {
    // lets you fetch a record form the database one single row by its primary key,if it cannot find the record it will call the abort function with 404 status code

    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');


Route::fallback(function () {
    return 'Still got somewhere';
});