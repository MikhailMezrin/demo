<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>Task form</title>
    </head>


    <body>
        <br>
        <form action={{route('edit', ['id'=>$task->id])}} method="post" enctype="multipart/form-data" align="center">
        <div>
            @csrf
            @method('put')
           <br>
            <input type="text" name="title" value="" placeholder="title">
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="description" rows="32" cols="150"></textarea>
        </div>
        <div>
            <button type="submit"> изменить</button>
        </div>
        
        </form>
    </body>
</html>
