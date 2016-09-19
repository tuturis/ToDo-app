Todo applikacija su vartotojais (naudojant zf2 skeleton)
*Pridetas puslapiavimas

## instaliacija/paleidimas
 Naudojant composer ir git

```
git clone https://github.com/chillerfx/aviasg-todo/aviasg-todo 
&& cd aviasg-todo
&& php compser.phar update

```

 Importuoti lenteles su duomenim(mysql)
```
cd aviasg-todo && mysql -u username -p password < db.sql
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

Test admin - admin/admin123 

#Techniniai reikalavimai:
PHP 5.5+ compatible;
Zend Framework 2.2+;
Jquery 1.11+;
HTML5;
Apache 2.2+;
MySQL 5.1;
Bootstrap;

#Requariments:     
*Privalo būti bent 2 vartotojų lygiai. Paprastas naudotojai ir administratorius. [DONE]
*Administratorius gali redaguoti naudotojus ir uzduotis, paprasti naudotojai tik uzduotis [INCOMPLETE]
*Navigacijos kurimui panaudoti  Zend navigation. [DONE]
*Paprastiems naudotojams turi būti negalima patekti patekti į administratoriui skirtus puslapius ar vykdyti administratoriaus komandų. [INCOMPLETE]

#Specification:
*Darbų sąrašas turi būti paprastai valdomas, o informacija jame pateikta aiškiai ir gerai matoma. Turi būti galimybė įvesti darbo pavadinimą (title) [DONE] , datą iki kurios reikia įvykdyti užduotį (date) [DONE], užduoties prioritetą (priority)[DONE].
*Kiti laukai neprivalomi, bet nedraudžiami. Reikalinga galimybė lengvai keisti dienas, taip pat turi būti keli darbų sąrašai:
-"Šiandienos darbai"     - darbai kuriuos reikia atlikti šiandien;[DONE ]
-"Vėluojantys darbai"    - darbai kuriu nesugebėta atlikti iki šiandienos;[MISSING??]
-"Svarbūs darbai"        - darbai su aukščiausiu prioritetu; [END]
*Darbų sąrašo valdymui (naujo įrašo sukurimui, esamų redagavimui ir šalinimui) - AJAX. [DONE]
 
