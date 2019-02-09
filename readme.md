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
