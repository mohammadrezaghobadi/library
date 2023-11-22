<?php

namespace BooksFile1\ReadBooks;

class FilterBooks
{
    public function __construct($filterinformation)
    {
        $this -> filterinformation = $filterinformation;
    }
    public function filterData($authorNames,$page,$perpage):void{
        $filter = [];
        foreach ($authorNames as $authorName){
            $temp = (array_filter($this -> filterinformation,fn ($i) => $i["authorName"] === $authorName));
            array_push($filter,...$temp);
        }
        if($perpage >= count(array_chunk($filter,$page)) || $perpage < 0){
            echo '------------------------------' . "<br />";
            echo 'no Books!' . "<br />";
        }else{
            $chunk = array_chunk($filter,$page)[$perpage];
            $filterdto = new ShowDto($chunk);
            foreach ($filterdto -> show as $items){
                echo "<br />";
                echo '------------------------------' . "<br />";
                foreach ($items as $item){
                    echo "<br />";
                    print_r($item) . "<br />";
                }
            }
        }
    }
}