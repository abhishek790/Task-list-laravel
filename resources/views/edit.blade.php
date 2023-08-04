@extends('layouts.app')



 {{-- I can also pass some additional data which is the task to the edit form. This passing data is optional because child view can access parent view data --}}
 @include('form',['task'=>$task])