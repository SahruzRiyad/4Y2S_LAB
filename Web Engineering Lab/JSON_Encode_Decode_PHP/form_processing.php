<?php

    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $choice = $_POST['choice'];

    if(empty($title) || empty($author) || empty($pages) || empty($choice)){
        echo "Operation Unsuccessful..Please Check the input";
    }
    else{
        $book = [];

        $book['title'] = $title;
        $book['author'] = $author;
        $book['available'] = false;

        if ($choice === 'yes')
            $book['available'] = true;

        $book['pages'] = $pages;
        $book['isbn'] = "";
        
        require_once __DIR__.'/functions.php';
        updateBook($book);
        header(__DIR__ .'/index.php');
        exit;

    }
?>