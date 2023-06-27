<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>Task form</title>
    </head>


    <body>
        <br>
        <form action=/api/register method="post" enctype="multipart/form-data" align="center">
        
            <div>
            @csrf
            <br>
            <input type="text" name="name" value="" placeholder="enter your name">
        </div>
        
        <br>
        
        <div>
            <input type="text" name="email" placeholder="enter your email">
        </div>
        
        <br>
        
        <div>
            <input type="password" name="password" placeholder="enter your password">
        </div>
        <br>
        <div>
            <button type="submit"> отправить</button>
        </div>
        
        </form>
    </body>
</html>