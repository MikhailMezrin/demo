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
            h1{
                color: aliceblue
            }
</style>
        <title>Task form</title>
    </head>


    <body>
        <br>
        <form action={{route('delete', ['id'=>$task->id])}} method="post" enctype="multipart/form-data" align="center">
            @csrf
            @method('delete')
        <br>
        <h1>Вы уверены, что хотите удалить это задание?</h1>
        <div>
            <button type="submit"> Удалить</button>
        </div>
        
        </form>
    </body>
</html>
