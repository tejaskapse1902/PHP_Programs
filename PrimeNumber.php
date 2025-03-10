<?php
    function isPrime($num){
        if($num < 2){
            return false;
        }
        for($i = 2 ; $i<= $num/2; $i++){
            if($num%$i ==0){
                return false;
            }
        }
        return true;
    }

    $number = 17;
    if(isPrime($number)){
        echo $number." is prime number";
    }
    else{
        echo $number." is not a prime number";
    }
?>