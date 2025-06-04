<?php
$num = 153;
$original = $num;
$armstrong = 0;
while($num != 0){
    $rem = $num % 10;
    $armstrong = $armstrong + ($rem ** 3);
    $num = $num / 10;
}

if($armstrong == $original){
    echo "$original is a Armstrong Number!";
}
else{
    echo "$original is not a Armstrong Number!";
}
?>