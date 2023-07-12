<?php require_once 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $json = file_get_contents(__DIR__ . '/books.json');
        $books = json_decode($json, true);
    ?>
    <ul>
        <?php foreach($books as $book) : ?>
            <li>
                <a href = "?title = <?php echo $book['title']; ?>">
                    <?php echo printTitleTable($book) . '<br>'; ?>
                    <?php echo "<br>" ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action = 'input_form.html'>
        <button>Add New Book</button>
    </form>

</body>
</html>

   
    

