<?php

namespace BooksFile1\ReadBooks;

class ReadCsv
{
    public function __construct(public $adders,public array $data_csv = [])
    {
        $fp = fopen($this->adders,"r");
        while ($data = fgetcsv($fp)){
            $this -> data_csv[] = $data;
        }
        fclose($fp);
        for ($i = 1; $i < count($this->data_csv);$i ++){
            $combine[] = array_combine($this->data_csv[0],$this->data_csv[$i]);
        }
        $this -> data_csv = $combine;
    }
}