# **Описание**
Данный проект создан в демонстративных целях.
Сервер способен обрабатывать запросы на создание, изменение, удаление и выдачу задач.
# **FAST RUN**
Для запуска вам потребуется <a href="https://www.docker.com/products/docker-desktop/">docker</a>.

Следующая команда соберет и запустит контейнер(может потребоваться некоторое время)
```
docker-compose up --build -d
```
## Примечание
При запуске вне linux могут возникнут задержки в работе из-за особенностей контейнеризации docker-а 
# **Роуты**
# вне api
## форма для отправки задания
```
GET /form
```
# api
# **Пользователи**
<details>
<summary>

## Регистрация пользователя 
</summary>

```
POST
/api/register 
Шаблон json-а
{
    "name":"your name",
    "email":"yourEmail@gmail.com",
    "password":"your_password"
}
```
ответ
```
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNjg0NDg2NjA5LCJleHAiOjE2ODcwNzg2MDksIm5iZiI6MTY4NDQ4NjYwOSwianRpIjoiTFZxbmVWdDhnYm1rWm9VZCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.XVsaQQHfvUjFd6LTZXC9e7oR-RiXhq7fpucOH2ncM5g",
    "token_type": "bearer",
    "expires_in": 2592000
}
```

</details>


<details>
<summary>

## авторизация пользователя
</summary>  

```
POST        
/api/login

Шаблон json-а
{
    "email":"yourEmail@gmail.com",
    "password":"your password"
}
```
ответ
```
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNjg0NDg2NjA5LCJleHAiOjE2ODcwNzg2MDksIm5iZiI6MTY4NDQ4NjYwOSwianRpIjoiTFZxbmVWdDhnYm1rWm9VZCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.XVsaQQHfvUjFd6LTZXC9e7oR-RiXhq7fpucOH2ncM5g",
    "token_type": "bearer",
    "expires_in": 2592000
}
```

</details>

# **Задачи**
# Без авторизации

<details>
<summary>

## Отправка задания
</summary>

```
POST
/api/tasks

Шаблон json-а
{
    "title":"title",
    "description":"description"
}
```
ответ
```
{
    "message": "Task created successfully"
}
```
</details>

# С авторизацией
(Для авторизации пользователя необходимо указать jwt токен)

<details>
<summary>

## Получение всех заданий
</summary>

```
GET
/api/tasks
Для сортировки по дате создания

/api/tasks?SortByUpdate=true
Для сортировки по дате обновления 
```
ответ
```
{
    "Tasks": {
        "2": {
            "id": 3,
            "title": "title",
            "description": "description",
            "status": "задача выполнена",
            "created_at": "2023-05-19T08:39:54.000000Z",
            "updated_at": "2023-05-19T09:55:36.000000Z"
        },
        "0": {
            "id": 1,
            "title": "title",
            "description": "description",
            "status": "задача выполнена",
            "created_at": "2023-05-19T06:47:12.000000Z",
            "updated_at": "2023-05-19T09:54:01.000000Z"
        },
        "4": {
            "id": 5,
            "title": "title",
            "description": "description",
            "status": "задача в работе",
            "created_at": "2023-05-19T09:37:18.000000Z",
            "updated_at": "2023-05-19T09:37:18.000000Z"
        },
    }
}
```
</details>

<details>
<summary>

## Получение конкретного задания

</summary>

```
GET
/api/tasks/{id} 
```
ответ
```
{
    "Tasks": {
        "id": 2,
        "title": "title",
        "description": "description",
        "status": "in developing",
        "created_at": "2023-05-19T07:53:47.000000Z",
        "updated_at": "2023-05-19T07:53:47.000000Z"
    }
}
```
</details>

<details>
<summary>

## Изменение конкретного задания
</summary>

```
PUT
/api/tasks/{id} 

Шаблон json-а(все поля являются опциональными)
{
    "title":"new title",
    "description":"new description",
    "status":"задача выполнена"
}
```
ответ
```
{
    "message": "Task updated successfully"
}
```

</details>
<details>
<summary>

## Удаление конкретного задания
</summary>

```
DELETE
/api/tasks/{id} 
```
ответ
```
{
    "message": "Task deleted successfully"
}
```
</details>