Todo applikacija su varototojais (naudojant zf2 skeleton)

### instaliacija/paleidimas
Naudojant composer ir git
1.
```
git clone https://github.com/chillerfx/aviasg-todo/  aviasg-todo 
&& cd aviasg-todo
&& php compser.phar update

```
2. Importuoti lenteles su duomenim(mysql)
```
cd aviasg-todo && mysql -u username -p password < db.sql
```
3.sukurti  config/autoload/local.php su connection stringais
```
<?php
return array(
    'db' => array(
        'username' => 'username',
        'password' => 'password',          
    	),
	),
);
```




Užduotis:
Panaudojant Zend Framework (2.2+, pageidautina - latest) sukurti interaktyvų darbų sąrašą (Todo list).
 
Techniniai reikalavimai:
PHP 5.5+ compatible;
Zend Framework 2.2+;
Jquery 1.11+;
HTML5;
Apache 2.2+;
MySQL 5.1;
Bootstrap;
Doctrine 2 (neprivaloma);
   
Programiniai reikalavimai:     
Privalo būti bent 2 vartotojų lygiai. Paprastas naudotojai ir administratorius. [DONE]
Administratorius gali redaguoti naudotojus ir uzduotis, paprasti naudotojai tik uzduotis [INCOMPLETE]
Navigacijos kurimui panaudoti  Zend navigation. [DONE]
Paprastiems naudotojams turi būti negalima patekti patekti į administratoriui skirtus puslapius ar vykdyti administratoriaus komandų. [INCOMPLETE]
      
Programos veikimas:
Darbų sąrašas turi būti paprastai valdomas, o informacija jame pateikta aiškiai ir gerai matoma. Turi būti galimybė įvesti darbo pavadinimą (title) [DONE] , datą iki kurios reikia įvykdyti užduotį (date) [DONE], užduoties prioritetą (priority)[DONE].
Kiti laukai neprivalomi, bet nedraudžiami. Reikalinga galimybė lengvai keisti dienas, taip pat turi būti keli darbų sąrašai:
"Šiandienos darbai"     - darbai kuriuos reikia atlikti šiandien;[DONE ]
"Vėluojantys darbai"    - darbai kuriu nesugebėta atlikti iki šiandienos;[MISSING??]
"Svarbūs darbai"        - darbai su aukščiausiu prioritetu; [END]
 
Darbų sąrašo valdymui (naujo įrašo sukurimui, esamų redagavimui ir šalinimui) - AJAX. [DONE]
 