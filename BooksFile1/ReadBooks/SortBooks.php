<?php

namespace BooksFile1\ReadBooks;

class SortBooks
{
    use TimeOutput;
    public function __construct(array $sortinformation)
    {
        $this -> sortinformation = $sortinformation;
    }
    public function sortData():void{
        usort($this -> sortinformation,fn ($a , $b) => $a['publishDate'] < $b['publishDate'] ? 1 : -1);
        $sortdto = new ShowDto($this -> sortinformation);
        foreach ($sortdto -> show as $sortbooks){
            echo  "<br />";
            echo '-----------------------------' . "<br />";
            foreach ($sortbooks as $sortbook){
                echo  "<br />";
                print_r($sortbook) . "<br />";
            }
        }
    }
}