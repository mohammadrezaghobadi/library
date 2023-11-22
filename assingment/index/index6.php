<?php

spl_autoload_register(function ($class){
    $path = __DIR__ . '/../' . lcfirst(str_replace("\\","/",$class)) . ".php";
    require $path;
});

$arrayjson = json_decode(file_get_contents("..\assingment\database\books.json"),true);

$fp = fopen("..\assingment\database\books.csv","r");

use BooksFile\Read1;

$arraycsv = [];

while ($data = fgetcsv($fp)){
     array_push($arraycsv,$data);
}
fclose($fp);

$read = new Read1($arrayjson,$arraycsv);

echo '------------------------------' . "<br />";

$read -> filterBooksRead("Aldous Orson",1,0);

echo '------------------------------' . "<br />";

$read ->filterBooksReadcsv("Aldous Orson",1,0);

echo '------------------------------' . "<br />";

$read -> sortBooksRead();

echo '------------------------------' . "<br />";

$read -> advancedSearchRead("Ephemeral Horizons","1973-08-23");

echo '------------------------------' . "<br />";

$read -> advancedSearchReadcsv("1950-09-21","Aldous Orson");
