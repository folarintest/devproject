<?php
$string = '{"foo": "bar", "cool": "attr"}';
$result = json_decode($string);
 
// Result: object(stdClass)#1 (2) { ["foo"]=> string(3) "bar" ["cool"]=> string(4) "attr" }
var_dump($result);

$string = '{"foo": {"bar": {"cool": "value"}}}';
$result = json_decode($string, true, 2);
 
// Result: null
var_dump($result);

?>