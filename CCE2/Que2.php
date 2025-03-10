<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST['filename'];
    $filePath = "C:\\xampp\\htdocs\\programs\\CCE2\\".$filename;
    $file = fopen($filePath, "r");
    $count = 0;
    while(!feof($file)) {
        $temp = fgetc($file);
        echo $temp;
        switch($temp) {
            case 'A':
            case 'E':
            case 'I':
            case 'O':
            case 'U':
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
                $count++;
                break;
            default:
                break;

        }
        }
    echo "<br><br><h2>Number of Vowels are ".$count."</h2><br>";
    fclose($file);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Count Vowels in File</title>
</head>
<body>
    <h2>Enter File Name to Count Vowels</h2>
    <form method="post">
        <input type="text" name="filename" placeholder="Enter file name" required>
        <button type="submit">Check Vowels</button>
    </form>
</body>
</html>