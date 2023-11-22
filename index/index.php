<?php

require "../vendor/autoload.php";

use BooksFile1\ReadBooks\Command;

$commend = new Command();
if ($commend -> readCommand() -> command_name === "BooksFile1"){
    $commend -> readBooks();
}