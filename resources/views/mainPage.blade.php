<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('cssFiles/main.css')}}">
        <title>test</title>
    </head>


    <body>
        <br>
        <h1>
        <div style="height = 100px">
        <p align="center">
            <a href={{route('registration')}}>Регистрация пользователя</a> <br><br>
            <a href={{route('form')}}>Создание нового задания</a><br><br>
            <a href={{route("selectUser")}}>Просмотр заданий пользователя</a><br><br>
        </div>
        </p>
    </body>
</html>