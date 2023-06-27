<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>test</title>
    </head>


    <body>
        <br>
        <form action={{ route('tasks') }} method="post" enctype="multipart/form-data" align="center">
            <div>
                @csrf
            <br>
            <select name="user">
                @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
        <div>
            <br>
            <br>
            <button type="submit"> выбрать</button>
        </div>
        
        </form>
    </body>
</html>