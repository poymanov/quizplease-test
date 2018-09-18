# Тестовое задание

## Установка

Для работы приложения необходимо создать файлы:
```
/config/db.local.php
/config/params.local.php
```

В `/config/db.local.php` добавить настройки своей БД:

```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=quizplease-test',
    'username' => 'homestead',
    'password' => 'secret',
    'charset' => 'utf8',
];
```

## Пункты 1,2:

Проверить **GridView**:

`/organization`

Проверить работу мультиформенности:

`/organization/create`

## Пункт 3:

Сначала необходимо добавить какие-либо данные в таблицу `users`

Чтобы проверить работу запроса построенного с помощью `ActiveRecord` нужно открыть страницу:
```
http://quizplease-test.test/site/active-record?name=Test
```

Данные будут отфильтрованы по значению параметра `name`

## Пункт 4:

Доступен по адресу:

```
/product/create
```

Чтобы проверить работу списков нужно предварительно создать данные на страницах:

```
/category/create
/type/create
```
