
ToDo list app with users (using zf2 skeleton)


## Setup:
 Using composer and git

```
https://github.com/chillerfx/ToDo-app ToDo-app
&& cd ToDo-app
&& php compser.phar update

```

Import data tables with test data(mysql)
```
cd ToDo-app && mysql -u username -p password < db.sql
```

 Sukurti  config/autoload/local.php su connection stringais
```
<?php
return array(
    'db' => array(
        'username' => 'username',
        'password' => 'password',          
    	),
);
```
Run index.php inside public folder

Test admin - admin@admin.com / admin123 

#Tech requirements:
PHP 5.5+ compatible;
Zend Framework 2.2+;
Jquery 1.11+;
HTML5;
Apache 2.2+;
MySQL 5.1;
Bootstrap;

#Requariments:     
*2 user levels. User and admin. [DONE]
*Admin can edit users and todos, users only todos [INCOMPLETE]
*Zend navigation for navigation. [#DONE]
*Users cannot access admin pages. [#INCOMPLETE]

#Specification:
*Todo list must be simple to use and data must be displayed #clearly. There's features with allow to enter the title of todo, the deadline and the priority of the todo.
*There could be other fields. There must be an easy way to pick and edit the deadlines of the ToDo entry. There's also is several filters:
-"Todays ToDos"
-"Priority rank"
*ToDo list managment implemented with AJAX (creating, updating, deleting).
*Todos can be edited (Todo itself and the deadline)
*Pagination