<?php
function isPrime($num){
    if($num == 1 || $num == 2){
        return false;
    }
    for($i = 2; $i<= sqrt($num); $i++){
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
$num = 7;
if(isPrime($num)){
    echo "$num is Prime Number!";
}else{
    echo "$num is Not Prime Number!";
}
?>