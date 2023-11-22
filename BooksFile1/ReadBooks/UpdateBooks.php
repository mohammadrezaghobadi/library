<?php

namespace BooksFile1\ReadBooks;

class UpdateBooks
{
    public function __construct(array $arrey)
    {
        $this-> arrey = $arrey;
    }

    public function udpateBooks(array $parametr):void{
        $update = array_filter($this -> arrey,fn ($i) => $i[$parametr[1][0]] === $parametr[0]);
        foreach (array_keys($update) as $key){
            $this->arrey[$key][$parametr[1][0]] = $parametr[1][1];
        }
        $updateDto = new ShowDto($this -> arrey);
        foreach ($updateDto -> show as $items) {
            echo "<br />";
            echo '------------------------------' . "<br />";
            foreach ($items as $item) {
                echo "<br />";
                print_r($item) . "<br />";
            }
        }
    }
}