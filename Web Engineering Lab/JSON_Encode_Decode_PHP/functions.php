<?php
    function printTitleTable(array $books): string{
        $result = '<i>' . $books['title'] . '<i> - ' . $books['author'];

        if ($books['available'] == false)
            $result = '<i>' . $books['title'] . ' [Not Available]';
        
        return $result;
    }

    function updateBook(array $book) : void{
        require 'books.json';
        $jsonBook = json_encode($book);
        file_put_contents(__DIR__ . '/books.json',$jsonBook , FILE_APPEND | LOCK_EX);
    }
?>