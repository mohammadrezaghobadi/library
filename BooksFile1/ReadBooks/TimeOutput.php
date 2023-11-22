<?php

namespace BooksFile1\ReadBooks;

trait TimeOutput
{
    public function timeObject($times){
        foreach ($times as $time){
            $time["publishDate"] = new \DateTime($time["publishDate"]);
            $timeStamp[] = $time;
        }
        return $timeStamp;
    }
}