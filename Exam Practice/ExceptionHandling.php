<?php
function divide($num, $deno){
    if($deno == 0){
        throw new Exception("Divide by zero is not allowed!");
    }
    return $num/$deno;
}

$num1 = 10;
$num2 = 0;

try{
    $result = divide($num1, $num2);
    echo "$num1/$num2 = $result";
}
catch(Exception $e){
    echo "Error: $e";
}
?>