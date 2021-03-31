<?php
echo "<h2>Rusexpress calculator</h2>";
include "modules/Calculator.php";

$calc = new Calculator();
//echo $calc->Test("Краснодар");
$temp = $calc->GetAllCities();

foreach ($temp as $city){
    echo "<input type='submit' name='but_{$counter}' value='{$city}'/>";
    $counter++;
}
