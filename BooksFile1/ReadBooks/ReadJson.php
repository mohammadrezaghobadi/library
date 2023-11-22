<?php

namespace BooksFile1\ReadBooks;

class ReadJson
{
    public function __construct(public $addres,public array $data_json = [])
    {
        $this -> data_json= json_decode(file_get_contents($this->addres), true);
    }
}