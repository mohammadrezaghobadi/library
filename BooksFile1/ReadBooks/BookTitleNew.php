<?php

namespace BooksFile1\ReadBooks;

use Biblys\Isbn\Isbn;

class BookTitleNew
{
    use TimeOutputNew;

    public function __construct(array $arrey,array $arreynew)
    {
        $this -> arrey = $arrey;
        $this -> arreynew = $arreynew;
    }

    public function readDataCsvNew():array{
        $lst1 = [];
        foreach ($this -> arreynew as $item){
            if (str_ends_with($item,".csv")){
                $readcsv = new ReadCsv($item);
                $lst1[] = $readcsv -> data_csv;
            }
        }
        return $lst1;
    }
    public function readDataJsonNew():array{
        $lst = [];
        foreach ($this -> arreynew as $item){
            if (str_ends_with($item,".json")){
                $readjson = new ReadJson($item);
                $lst[] = $readjson ->data_json["books"];
            }
        }
        return $lst;
    }
    public function mergeDataNew(){
        $timeobject = $this -> timeObjectNew(array_merge($this -> readDataCsvNew(),$this ->readDataJsonNew()));
        return $timeobject;
    }
    public function mergeData_DataNew():void{
        try {
            foreach ($this -> mergeDataNew() as $book){
                Isbn::validateAsEan13($book["ISBN"]);
            }
        } catch (\Biblys\Isbn\IsbnValidationException $e) {
            echo "The desired ISBN is not of the ISBN-13 type";
        }
        foreach ($this -> mergeDataNew() as $book){
            foreach ($this->arrey as $item){
                if ($item["ISBN"] === $book["ISBN"]){
                    $arreynew = $this -> arrey;
                    break 2;
                }else{
                    $arreynew = array_merge($this -> arrey ,$this -> mergeDataNew());
                }
            }
        }
        $adddto = new ShowDto($arreynew);
        foreach ($adddto -> show as $item){
            echo "<br />";
            echo '------------------------------' . "<br />";
            foreach ($item as $items){
                echo "<br />";
                print_r($items) . "<br />";
            }
        }
    }
}