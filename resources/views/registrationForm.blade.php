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
</style>
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
        
        <div>
            <button type="submit"> отправить</button>
        </div>
        
        </form>
    </body>
</html>