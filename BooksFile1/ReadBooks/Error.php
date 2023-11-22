<?php

namespace BooksFile1\ReadBooks;
use Ramsey\Uuid\Rfc4122\Validator;

class Error
{
    public function errorCommand($item){
        if (gettype($item -> parameters -> page) !== "integer") {
            throw new ErrorMessage();
        }elseif ($item -> parameters -> page <= 0){
            throw new ErrorIndex();
        }elseif (gettype($item-> parameters -> authorName) !== "array"){
            throw new ErrorMessage();
        }elseif (gettype($item -> parameters -> perpage) !== "integer"){
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> ISBN) !== "string"){
            throw new ErrorMessage();
        }elseif ($item -> parameters -> perpage < 0){
            throw new ErrorIndex();
        }elseif (gettype($item-> parameters -> deletinformation) !== "string"){
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> search) !== "array"){
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> search[1]) !== "array"){
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> search[0]) !== "string"){
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> search[1][1]) !== "string") {
            throw new ErrorMessage();
        }elseif (gettype($item-> parameters -> search[1][0]) !== "string") {
            throw new ErrorMessage();
        }elseif ($item-> parameters -> search[1][0] === "ISBN"){
            throw new ErrorIsbn();
        }elseif ($item -> parameters -> Address !== "array"){
            throw new ErrorMessage();
        }
    }
}