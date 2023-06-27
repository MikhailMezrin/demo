<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>Task form</title>
    </head>


    <body>
        <br>
        @foreach($tasks as $task)
        <h2>
        <div>
        <p align ="center">
        <br>
        {{$task->title}}
        <br>
        {{$task->description}}   <br><br>
        <a href={{route('editTaskForm',['id' => $task->id])}}>изменить</a>
        <a href={{route('deleteTaskForm', ['id' => $task->id])}}>удалить</a>
        </h2></p><br><br> 
    </div>
        @endforeach
    </body>
</html>
