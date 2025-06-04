<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file1 = $_POST['file1'];
    $file2 = $_POST['file2'];

    $source = fopen($file1, "r");

    $destination = fopen($file2, "a");

    while (!feof($source)) {
        $char = fgetc($source);
        fwrite($destination, $char);
    }

    fclose($source);
    fclose($destination);

    echo "Content of <b>$file1</b> has been appended to <b>$file2</b> successfully.";
}
?>

<!-- HTML Form -->
<form method="post">
    Enter Source File Name: <input type="text" name="file1" required><br><br>
    Enter Destination File Name: <input type="text" name="file2" required><br><br>
    <input type="submit" value="Append Content">
</form>
