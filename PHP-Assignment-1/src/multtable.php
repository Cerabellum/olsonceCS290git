<!DOCTYPE HTML>
<html>
<center>
<table border='1'>
<body>
<?php

    $minMultiplicand = $_GET['min-multiplicand'];
    $maxMultiplicand = $_GET['max-multiplicand'];
    $minMultiplier = $_GET['min-multiplier'];
    $maxMultiplier = $_GET['max-multiplier'];
    
    $values = array('min-multiplicand','max-multiplicand','min-multiplier','max-multiplier');
    
    foreach ($values as $v) {
        if (!$_GET[$v]) {
            echo "Missing parameter $v.";
            return;
        }
        if (!is_numeric($_GET[$v])) {
            echo "$v must be an integer";
            return;
        }
    }
    
    
    if ($minMultiplicand > $maxMultiplicand){
        echo "Minimum multiplicand larger than maximum.";
        return;
    }

    if ($minMultiplier > $maxMultiplier){
        echo "Minimum multiplier larger than maximum.";
        return;
    }
    
    <table>
        <h1> Multiplication Table </h1>
            <thead>
                <tr>
                    <th><!-- empty top-left table --></th>
                        for ($i = $minMultiplier; $i <= $maxMultiplier; ++$i){
                            echo "<th>$i</th>";
                        }
                </tr>
            </thead>
            <tbody>
                    for ($i = $minMultiplicand; $i <= $maxMultiplier; ++$i) {
                        <tr>
                        <th> echo $i; </th>
                        for ($j = $minMultiplier; $j <= $maxMultiplier; ++$j) {
                            echo "<td>".$i*$j."</td>";
                        }
                        </tr>
                    }
            </tbody>
    </table>
?>
</html>
</center>
<table border='1'>
</body>

