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
Privalo būti bent 2 vartotojų lygiai. Paprastas naudotojai ir administratorius.
Administratorius gali redaguoti naudotojus ir uzduotis, paprasti naudotojai tik uzduotis
Navigacijos kurimui panaudoti  Zend navigation.
Paprastiems naudotojams turi būti negalima patekti patekti į administratoriui skirtus puslapius ar vykdyti administratoriaus komandų.
      
Programos veikimas:
Darbų sąrašas turi būti paprastai valdomas, o informacija jame pateikta aiškiai ir gerai matoma. Turi būti galimybė įvesti darbo pavadinimą (title), datą iki kurios reikia įvykdyti užduotį (date), užduoties prioritetą (priority).
Kiti laukai neprivalomi, bet nedraudžiami. Reikalinga galimybė lengvai keisti dienas, taip pat turi būti keli darbų sąrašai:
"Šiandienos darbai"     - darbai kuriuos reikia atlikti šiandien;
"Vėluojantys darbai"    - darbai kuriu nesugebėta atlikti iki šiandienos;
"Svarbūs darbai"        - darbai su aukščiausiu prioritetu;
 
Darbų sąrašo valdymui (naujo įrašo sukurimui, esamų redagavimui ir šalinimui) - AJAX.
 