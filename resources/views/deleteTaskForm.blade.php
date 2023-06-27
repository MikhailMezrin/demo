<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>Task form</title>
    </head>


    <body>
        <br>
        <form action={{route('delete', ['id'=>$task->id])}} method="post" enctype="multipart/form-data" align="center">
            @csrf
            @method('delete')
        <br>
        <h1>Вы уверены, что хотите удалить это задание?</h1>
        <br>
        <div>
            <button type="submit"> Удалить</button>
        </div>
        
        </form>
    </body>
</html>
