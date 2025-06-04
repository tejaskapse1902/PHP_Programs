<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post">
        Enter file name (With Extension) : <input type="text" name="filename" required>
        <button type="submit">Count Vowels</button>
    </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filename = $_POST['filename'];
    
    $f = fopen($filename, "r");
    $vowelcount = 0;
    while(!feof($f)){
        $char = fgetc($f);
        if ($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char = 'u' 
        || $char = 'A' || $char == 'E' || $char == 'I' || $char == 'O' || $char == 'U') {
            $vowelcount++;
        }
    }

    echo "Vowel Count is $vowelconut !";
}
?>