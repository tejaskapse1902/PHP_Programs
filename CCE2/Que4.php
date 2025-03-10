<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file1 = $_POST["file1"]; // First file (source)
    $file2 = $_POST["file2"]; // Second file (destination)

    $file1Path = "C:\\xampp\\htdocs\\programs\\CCE2\\".$file1;
    $file2Path = "C:\\xampp\\htdocs\\programs\\CCE2\\".$file2;
   
    $fp1 = fopen($file1Path, "r");
    $contents = fread($fp1, filesize($file1Path));
   
    $fp2 = fopen($file2Path, "a");
    fwrite($fp2, $contents);
    echo "Content of '$file1' successfully appended to '$file2'.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Append File Content</title>
</head>
<body>
    <h2>Enter File Names</h2>
    <form method="post">
        <label>Source File (to read from):</label>
        <input type="text" name="file1" required><br><br>

        <label>Destination File (to append to):</label>
        <input type="text" name="file2" required><br><br>

        <button type="submit">Append Content</button>
    </form>
</body>
</html>
