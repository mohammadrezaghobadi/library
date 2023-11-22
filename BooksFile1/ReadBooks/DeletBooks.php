<?php

namespace BooksFile1\ReadBooks;

class DeletBooks
{
    public function __construct(array $deletbooks)
    {
        $this -> deletbooks = $deletbooks;
    }
    public function deletBooks(string $deletdata):void{
        $delet = array_filter($this -> deletbooks, fn($i) => $i["authorName"] === $deletdata || $i["bookTitle"] === $deletdata);
        foreach (array_keys($delet) as $item) {
            unset($this->deletbooks[$item]);
        }
        $deletdto = new ShowDto($this -> deletbooks);
        foreach ($deletdto -> show as $items) {
            echo "<br />";
            echo '------------------------------' . "<br />";
            foreach ($items as $item) {
                echo "<br />";
                print_r($item) . "<br />";
            }
        }
    }
}