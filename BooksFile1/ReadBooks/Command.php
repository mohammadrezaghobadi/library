<?php

namespace BooksFile1\ReadBooks;

class Command
{
    public function readCommand(){
        $command = json_decode(file_get_contents(__DIR__ . "\..\..\assingment\commands.json"));
        return $command;
    }
    public function readBooks(){
        $error = new Error();
        $booktitle = new BookTitle();
        try {
            $error -> errorCommand($this -> readCommand());
            $booktitle -> handlle
            ($this -> readCommand() -> parameters -> authorName,
                $this -> readCommand() -> parameters -> page,$this -> readCommand() -> parameters -> perpage,
                $this -> readCommand() -> parameters -> ISBN,$this -> readCommand() -> parameters -> deletinformation,
                $this -> readCommand() -> parameters -> search,
                $this -> readCommand() -> parameters -> Address
            );
        }catch (\BooksFile1\ReadBooks\ErrorMessage $e){
            echo "Enter the desired type";
        }catch (\BooksFile1\ReadBooks\ErrorIndex){
            echo "Enter the desired Index";
        }catch (\BooksFile1\ReadBooks\ErrorIsbn){
            echo "You do not have access to this item";
        }
    }
}