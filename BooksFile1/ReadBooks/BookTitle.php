<?php

namespace BooksFile1\ReadBooks;

class BookTitle implements BookTitleInterfice
{
    use TimeOutput;
    public function readDataCsv():ReadCsv{
        return new ReadCsv("..\assingment\database\books.csv");
    }
    public function readDataJson():ReadJson{
        return new ReadJson("..\assingment\database\books.json");
    }
    public function mergeData(){
        return $this -> timeObject(array_merge($this->readDataCsv()->data_csv,$this -> readDataJson() -> data_json["books"]));
    }
    public function handlle($item,$page,$perpage,$ISBN,$deletinformation,$update,$address){
        $sortdata = new SortBooks($this -> mergeData());

        $filterdata = new FilterBooks($this -> mergeData());

        $secrchdata = new  SearchBooks($this -> mergeData());

        $deletdata = new DeletBooks($this -> mergeData());

        $datanew = new BookTitleNew($this -> mergeData(),$address);

        $updatebooks = new UpdateBooks($this -> mergeData());

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "filter_books" . "<br />";

        $filterdata -> filterData($item,$page,$perpage);

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "sort_books" . "<br />";

        $sortdata -> sortData();

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "search_books" . "<br />";

        $secrchdata -> searchBooks($ISBN);

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "delet_books" . "<br />";

        $deletdata -> deletBooks($deletinformation);

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "add_books" . "<br />";

        $datanew -> mergeData_DataNew();

        echo "<br />";

        echo '-----------------------------' . "<br />";

        echo "update_books" . "<br />";

        $updatebooks -> udpateBooks($update);
    }
}