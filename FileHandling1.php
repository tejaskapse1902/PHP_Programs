<?php
$filename = "D:\\Clg Notes\\MCA\\Second Semester\\DSA Using Java\\FibbonacciSearchTable.txt";
$fp = fopen($filename, "r");//open file in read mode
$contents = fread($fp, filesize($filename));//read file
echo "<pre>$contents</pre>";//printing data of file
fclose($fp);//close file
?>


<?php
$fp = fopen("D:\\Clg Notes\\MCA\\Second Semester\\DSA Using Java\\FibbonacciSearchTable.txt", "r");//open file in read mode
while(!feof($fp)){

    echo fgets($fp);
    // switch($fp){
    //     case $fp == "a":
    //         echo "a is found";
    //         break;
    //     case $fp == "e":
    //         echo "e is found";
    //         break;
    // }
}
fclose($fp);
echo "<br><br>";//printing data of file
?>


<?php
$fp = fopen("D:\\Clg Notes\\MCA\\Second Semester\\DSA Using Java\\FibbonacciSearchTable.txt", "r");//open file in read mode
while(!feof($fp)) {
echo fgetc($fp);
}
fclose($fp);
?>