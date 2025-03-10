<?php 
$filename = "C:\\xampp\\htdocs\\programs\\CCE2\\text1.txt"; 
$fp = fopen($filename, "r");
$contents = fread($fp, filesize($filename));
echo "<pre>$contents</pre>";
fclose($fp);

$file2name = "C:\\xampp\\htdocs\\programs\\CCE2\\text2.txt";
$fp2 = fopen($file2name, 'w');
fwrite($fp2, $contents); 
fclose($fp2); 
echo "File written successfully"; 

?>

