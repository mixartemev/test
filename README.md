MODULE ARCHITECTURE SIMPLE EXAMPLE
==================================

OBJECTIVES
----------

1. Made from yii2-app-basic template
2. A simplest User Module extends ActiveRecord, exists required minimum of properties.  
   a. HomePage is Authorization through email+password, if you aren't logged in.  
   b. or Prifile page, where you canchange your password  
   c. Second page is create of new User, entering email+password.
3. A simplest Object Module with dynamic properties of objects.  
   a. Спроектировать БД модуля на основе следующих требований:
      * Объект должен иметь свой id, дату создания, название, тип объекта.  
      Тестовые типы:
         1. Crane
         2. Car
         3. Bus  
      * В зависимости от типа объекта, объект может иметь разные свойства. Количество свойств не должно быть ограничено. Свойство должно иметь свое название и тип данных.  
      Тестовые свойства:
         1. кран: высота (int), грузоподъемность (int), модель (text)
         2. машина: мощность (int), легковой или нет (boolean)
         3. автобус: модель (text), пассажировместимость (int)  
   b. Заполнить базу тестовыми значениями (можно в ручном режиме из любого используемого инструмента администрирования СУБД). At least по 2­3 объекта каждого типа  
   c. Реализовать вывод списка объектов в таблице с колонками
      * id объекта
      * дата создания
      * название
      * количество динамических свойств (число)
      
   d. Реализовать страницу объекта с выводом всех его свойств
      * id объекта
      * Дата создания
      * название
      * Список динамических свойств в виде: название свойства значение


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      config/             contains application configurations
      modules/            contains user and object modules
      runtime/            contains files generated during runtime
      views/              contains common layout view
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.
