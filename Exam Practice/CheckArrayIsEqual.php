<?php
$arr1 = [2,5,7,9,2,5];
$arr2 = [2,7,5,9,5,2];

sort($arr1);
sort($arr2);

if($arr1 == $arr2){
    echo "Both are equal array!";
}else{
    echo "Both are not equal array!";
}
?>