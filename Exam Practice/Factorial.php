<?php
function factorial($num){
    $fact = 1;
    for($i = 1; $i<=$num; $i++){
        $fact = $fact * $i;
    }
    return $fact;
}
$num = 3;
echo "Factorial of $num is ".factorial($num);
?>