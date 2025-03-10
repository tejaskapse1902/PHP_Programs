<?php 
    function divide($num, $den){
        if($den ===0){
            throw new Exception("Divided by zero is not allowed.");
        }
        return $num/$den;
    }

    try {
        $result = divide(500, 0);
        echo $result;
    } catch (Exception $e) {
        echo "An error occurred ".$e->getMessage();
    }
?>