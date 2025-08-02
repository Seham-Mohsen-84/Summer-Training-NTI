<?php
$array=[
    "Html","Css","Javascript","php","mysql"
];

echo "<br>";
echo "<br>";
array_push($array,"Git");
print_r(array_values($array));
echo "<br>";
echo "<br>";
array_pop($array);
print_r(array_values($array));
echo "<br>";
echo "<br>";
array_unshift($array,"git");
print_r(array_values($array));
echo "<br>";
echo "<br>";
array_shift($array);
print_r(array_values($array));
echo "<br>";
echo "<br>";

?>