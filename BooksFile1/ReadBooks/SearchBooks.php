<?php

namespace BooksFile1\ReadBooks;

class SearchBooks
{
    public function __construct(array $searchinformation)
    {
        $this -> searchinformation = $searchinformation;
    }
    public function searchBooks(string $isbn):void{
        $search = array_filter($this -> searchinformation,fn ($i) => $i["ISBN"] === $isbn);
        $searchdto = new ShowDto($search);
        if (count($searchdto -> show) === 0){
            echo '------------------------------' . "<br />";
            echo 'no Books!' . "<br />";
        }else {
            foreach ($searchdto -> show as $items) {
                echo "<br />";
                echo '------------------------------' . "<br />";
                foreach ($items as $item) {
                    echo "<br />";
                    print_r($item) . "<br />";
                }
            }
        }
    }
}