<?php

namespace BooksFile1\ReadBooks;

trait TimeOutputNew
{
    public function timeObjectNew($times){
        foreach ($times as $time){
            foreach ($time as$item) {
                $item["publishDate"] = new \DateTime($item["publishDate"]);
                $timeStamp[] = $item;
            }
        }
        return $timeStamp;
    }
}