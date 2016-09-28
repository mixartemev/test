MODULE ARCHITECTURE SIMPLE EXAMPLE
==================================

OBJECTIVES
----------

* Made from yii2-app-basic template
* A simplest User Module extends ActiveRecord, exists required minimum of properties.
   * HomePage is Authorization through email+password, if you aren't logged in.
   * or Prifile page, where you canchange your password
   * Second page is create of new User, entering email+password.
* A simplest Object Module with dynamic properties of objects.
   * Scheme db has such structure:
      * Object properties: id, name, type, create_by:datetime, updated_by:datetime.
      Test types:
         * Crane
         * Car
         * Bus
      * Dynamic property has name and own datatype. Set of properties depend on object type.
      Test properties:
         * Crane: height (int), capacity (int), modelname (text)
         * Car: power (int), formfactor (boolean)
         * Bus: modelname (text), seating (int)
   * Automatic fill 3 objects of each type for examples.
   * Реализовать вывод списка объектов в таблице с колонками
      * id объекта
      * дата создания
      * название
      * количество динамических свойств (число)

   * Реализовать страницу объекта с выводом всех его свойств
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
