<?php

    $a = array("A", "B", "C");
    $b = array(4, 5, 6);

    for($x = 0; $x < count($a); $x++) {
        array_push($b, $x);
    }
    for($y = 0; $y < count($b); $y++) {
        echo $b[$y].", ";
    }
    
?>