<?php
$array=[
    [
        "name"=>"Laptop",
        "price"=>3000,
        "quantity"=>"1"
    ],
    [
        "name"=>"Pc",
        "price"=>9000,
        "quantity"=>"3"
    ],
    [
        "name"=>"phone",
        "price"=>99900,
        "quantity"=>"4"
    ]
];

echo count($array);
echo "<br>";
echo "<br>";
echo "<br>";
print_r($array);
echo "<br>";
echo "<br>";
echo "<br>";
echo (in_array("Laptop", $array[0]))?"success":"fail";
echo "<br>";
echo "<br>";
echo "<br>";
print_r(array_values($array));
?>

