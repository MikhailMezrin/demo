<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>Task form</title>
    </head>


    <body>
        <br>
        <form action=/api/tasks method="post" enctype="multipart/form-data" align="center">
        <div>
            @csrf
            <select name="user">
                @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
            <br>
            <br>
            <input type="text" name="title" placeholder="title">
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="description"></textarea>
        </div>
        <div>
            <br>
            <button type="submit"> отправить</button>
        </div>
        
        </form>
    </body>
</html>
