<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <form action="http://127.0.0.1:8080/tasks" method="post" enctype="multipart/form-data">

        <div>
            @csrf
            <input type="text" name="title" value="" placeholder="title">
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="description"></textarea>
        </div>
        <div>
            <button type="submit"> отправить</button>
        </div>
        
        </form>
    </body>
</html>
