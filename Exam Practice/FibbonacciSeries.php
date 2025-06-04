<?php
$num = 9;

$a = 0;
$b = 1;

for($i = 0; $i < $num; $i++){
    echo " $a ";
    $c = $a + $b;
    $a = $b;
    $b = $c;
}
?>