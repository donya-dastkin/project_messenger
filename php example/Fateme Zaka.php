<?php
//Functional String & Array functions By Fateme Zaka


//***String Methods***

//trim
$myStr = "  Hello  ";
trim($myStr);   //"Hello"
ltrim($myStr);  //"Hello  "
rtrim($myStr);  //"  Hello"

//explode
$resault = explode("*", "te*st"); // ["te","st"]

//implode
$resault = implode(",", ["te", "st", 1]); // "te,st,1"

//str_pad
$resault = str_pad("test", 8, ".="); // "test.=.="

//str_split
$resault = str_split("test fateme", 2); // ["te","st"," f","at","em","e"]




//***Array Methods***

//array_walk
$numbers = array(5, 8, 15);
function print_value($val)
{
    echo $val . "\n";
}
array_walk($numbers, "print_value"); // 5 8 15

//array_flip
$myarr = ["name" => "fateme", "lastName" => "zaka"];
array_flip($myarr);  // ["fateme"=>"name","zaka"=>"lastName"]

//array_reverse
array_reverse($numbers);  // [15,8,5]

//array_keys
array_keys($myarr);  // "name"  "lastName"

//array_values
array_values($myarr); // "fateme"  "zaka"

//ksort
$arr = ["ن" => "nima", "م" => "mahsa", "ب" => "behnaz"];
ksort($arr);  // ["ب"=>"behnaz","م"=>"mahsa","ن"=>"nima"]

//array_intersect_key
$arr1 = ["one" => 1, "three" => 3, "five" => 5, "six" => 66];
$arr2 = ["two" => 2, "three" => 33, "four" => 4, "six" => 6];
array_intersect_key($arr1, $arr2);  //["six"=>3,"six"=>66]
