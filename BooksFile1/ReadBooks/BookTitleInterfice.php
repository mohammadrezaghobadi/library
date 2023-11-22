<?php

namespace BooksFile1\ReadBooks;

interface BookTitleInterfice
{
    public function readDataJson():ReadJson;
    public function readDataCsv():ReadCsv;

}