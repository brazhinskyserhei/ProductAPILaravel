## Запуск проекта
Для запуска необходимо загрузить теущий проект с данного репозитория. Можно скачать на прямую или воспользоваться командой:
```
git clone https://github.com/brazhinskyserhei/ProductAPILaravel.git
```
В файле *.env* в корне проекта необходимо изменить парамеры приложения и базы данных:
<table>
<tr>
    <th>Параметр</th>
    <th>Описание</th>
    <th>Пример</th>
</tr>
<tr>
    <td>APP_URL</td>
    <td>Имя домена</td>
    <td>http://productapi</td>
</tr>
<tr>
    <td>DB_CONNECTION</td>
    <td>Сервер базы данных</td>
    <td>mysql</td>
</tr>
 <tr>
    <td>DB_HOST</td>
    <td>Хост базы данных</td>
    <td>mysql</td>
</tr>
 <tr>
    <td>DB_PORT</td>
    <td>Порт</td>
    <td>3306</td>
</tr> 
 <tr>
    <td>DB_DATABASE</td>
    <td>Имя базы данных</td>
    <td>test_task</td>
</tr>
 <tr>
    <td>DB_USERNAME</td>
    <td>Пльзователь базы данных</td>
    <td>root</td>
</tr>
 <tr>
    <td>DB_PASSWORD</td>
    <td>Пароль</td>
    <td>1234</td>
</tr>
</table> 

## Запуск миграций и генерация фейковых данных
Для запуска миграций в консоле переходим в корень  проекта запускаем команду
```
php artisan migrate
```
<p>После этого должна быть создана структура табоицы со всеми таблицами и данными.</p>
<p>Для генерации фейковых данных необходимо запустить сиды в консоле:</p>

### Генерация фейковых пользователей
```
php artisan db:seed --class=UsersTableSeeder
```
### Генерация фейковых категорий
```
php artisan db:seed --class=CategoriesTableSeeder
```
### Генерация фейковых продуктов
```
php artisan db:seed --class=ProductsTableSeeder
```
### Генерация записей для промежуточной таблицы продуктов и категорий
```
php artisan db:seed --class=ProductsCategoriesSeeder
```
## Тестирование API

Для тестирования API можно вопользоваться люьбым HTTP-клиентом, напрмер Postman

### Регистрация пользователя
<table>
<tr>
    <th>Метод</th>
    <th>URL</th>
</tr>
<tr>
    <td>POST</td>
    <td>/api/register</td>
</tr>
</table> 

### Параметры

<table>
    <tr>
        <th>Параметр</th>
        <th>Тип</th>
        <th>Пример</th>
    </tr>
    <tr>
        <td>name*</td>
        <td>string</td>
        <td>Sergey</td>
    </tr>
    <tr>
        <td>email*</td>
        <td>string</td>
        <td>sergey@site.com</td>
    </tr>
     <tr>
        <td>password*</td>
        <td>string</td>
        <td>1234</td>
    </tr>
    <tr>
        <td>password_confirmation*</td>
        <td>string</td>
        <td>1234</td>
    </tr>
     <tr>
        <td>file</td>
        <td>file</td>
        <td>image.jpg</td>
    </tr>    
</table>

### Ответ

 ```
{
    "user": {
        "name": "Sergey",
        "email": "sergey@site.com",
        "avatar": "http://productapi/public/images/users/no-avatar.jpg",
        "updated_at": "2019-02-09 16:50:09",
        "created_at": "2019-02-09 16:50:09",
        "id": 10
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9wcm9kdWN0YXBpXC9hcGlcL3JlZ2lzdGVyIiwiaWF0IjoxNTQ5NzMxMDA5LCJleHAiOjE1NDk3MzQ2MDksIm5iZiI6MTU0OTczMTAwOSwianRpIjoiWHlYR1p1Y28wNGplanNzUyIsInN1YiI6MTAsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.uA4-DZDgEuJGtrHHG-u0UJc9IP3AowXdSLSxmBs4uDI"
}
```


### Авторизация(генерация токена)

<table>
<tr>
    <th>Метод</th>
    <th>URL</th>
</tr>
<tr>
    <td>POST</td>
    <td>api/login</td>
</tr>
</table> 

### Параметры

<table>
    <th>Параметр</th>
    <th>Описание</th>
    <th>Пример</th>
    <tr>
        <td>email*</td>
        <td>string</td>
        <td>sergey@site.com</td>
    </tr>
     <tr>
        <td>password*</td>
        <td>string</td>
        <td>1234</td>
    </tr>   
</table>

### Ответ

 ```
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9wcm9kdWN0YXBpXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTQ5NzI2MjU4LCJleHAiOjE1NDk3Mjk4NTgsIm5iZiI6MTU0OTcyNjI1OCwianRpIjoiakx2TkZXVzlNZFl2TWplRyIsInN1YiI6OCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.WxMV9ZQZRFVly4ARa9RGkg48634FJr22Ji02tgwivLs"
}
```

### Список всех категорий (без регистрации)

<table>
<tr>
    <th>Метод</th>
    <th>URL</th>
</tr>
<tr>
    <td>GET</td>
    <td>api/categories</td>
</tr>
</table> 


### Список всех товаров по определенной категории (без регистрации)

<table>
<tr>
    <th>Метод</th>
    <th>URL</th>
</tr>
<tr>
    <td>GET</td>
    <td>api/categories/{id}</td>
</tr>
</table> 

## Категории

### Добавить категорию (с авторизацией)

<table>
    <tr>
        <th>Метод</th>
        <th>URL</th>
    </tr>
    <tr>
        <td>POST</td>
        <td>/api/categories</td>
    </tr>
</table> 

### Параметры

<table>
    <th>Параметр</th>
    <th>Описание</th>
    <tr>
        <td>name*</td>
        <td>string</td>
    </tr>
     <tr>
        <td>description*</td>
        <td>string</td>
    </tr>   
</table>

### Обновить категорию (с авторизацией)

<table>
    <tr>
        <th>Метод</th>
        <th>URL</th>
    </tr>
    <tr>
        <td>PUT</td>
        <td>api/categories/{id}</td>
    </tr>
</table> 

### Параметры

<table>
    <th>Параметр</th>
    <th>Описание</th>
    <tr>
        <td>name*</td>
        <td>string</td>
    </tr>
     <tr>
        <td>description*</td>
        <td>string</td>
    </tr>   
</table>

### Удалить категорию (с авторизацией)

<table>
    <tr>
        <th>Метод</th>
        <th>URL</th>
    </tr>
    <tr>
        <td>DELETE</td>
        <td>api/categories/{id}</td>
    </tr>
</table>

