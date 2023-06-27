<!DOCTYPE html>
<html>
    <head>
        <style>
            *{
                margin:0;
                padding: auto;
            }
            body {
                background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.baltana.com%2Ffiles%2Fwallpapers-19%2FSky-Glider-Gradient-4K-Wallpaper-7401.jpg&f=1&nofb=1&ipt=c64ca22a636dff579bb80beae290754f1896e1e3121a276c69386b59f43fc0fe&ipo=images);
                background-size: cover;
                background-repeat: no-repeat;
                width: 100vw;
                height: 100vh
            }
            a{
                color: aliceblue
            }
</style>
        <title>test</title>
    </head>


    <body>
        <br>
        <h1>
        <p align="center">
            <a href={{route('registration')}}>Регистрация пользователя</a> <br>
            <a href={{route('form')}}>Создание нового задания</a><br>
            <a href={{route("selectUser")}}>Просмотр заданий пользователя</a><br>
        </p>
    </body>
</html>