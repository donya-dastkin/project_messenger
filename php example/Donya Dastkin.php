<?php
//? syntax php

//! control structures
{
//* if
$a = 10;
$b = 5;
if ($a > $b) {
    echo "a is bigger than b";
  }

//* else
$a = 10;
$b = 15;
if ($a > $b) {
  echo "a is greater than b";
} else {
  echo "a is smaller than b";
}

//* else if 
$a = 15;
$b = 15;
if ($a > $b) {
  echo "a is bigger than b";
} elseif ($a == $b) {
  echo "a is equal to b";
} else {
  echo "a is smaller than b";
}

//* endif
if ($a == 15): 
  echo "A is equal to 15";
endif;

//* while
$i = 1;
while ($i <= 10) {
  echo "</br>$i";
  $i++;
}

//* endwhile
$j = 1;
while ($j <= 10):
    echo "$j</br>";
    $j++;
endwhile;

//* do-while
do {
  echo "A is equal to 15";
} while (0);
// اگر شرط حلقه true نباشد یک بار اجرا میشود و در صورت true بودن ماننده while عمل میکند

//* for
for ($f = 1; $f <= 10; $f++) {
  echo $f;
}
//! &$value
//* foreach
$arrNum = array(2,4,6,8);
foreach ($arrNum as &$value) {
    // $value = $value * 2;
    echo "$value /";
  }
  echo "</br>";

//* foreach =>
foreach ($arrNum as $key => $value) {
  echo "{$key} => {$value} ";
}

//* break
$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;
    }
    echo "$val<br />\n";
}

//* continue
$array = ['zero', 'one', 'two', 'three', 'four', 'five', 'six'];
foreach ($array as $key => $value) {
    if (0 === ($key % 2)) { 
        continue;
    }
    echo $value . "\n";
}

//* switch
switch ($i) {
  case 10:
      echo "i equals 10";
      break;
  case 11:
      echo "i equals 11";
      break;
  case 15:
      echo "i equals 15";
      break;
}

//* match
$food = 'apple';
$return_value = match ($food) {
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
    'apple' => 'This food is an apple',
};
var_dump($return_value);

//* declare

//* return

//* 

//* 

//* 

//* 

//* 

}

//? ----------------------------------------

//!  String Methods

//* trim
$myStr = "  Donya  ";
trim($myStr);   //"Donya"
ltrim($myStr);  //"Donya  "
rtrim($myStr);  //"  Donya"

//* str_pad
$resault = str_pad("donya", 8, ".="); // "donya.=.="

//* str_split
$resault = str_split("donya dastkin", 2); // ["do","ny","a ","da","st","ki","n"]

//* explode
$resault = explode("*", "don*ya"); // ["don","ya"]

//* implode
$resault = implode(",", ["don", "ya", 1]); // "don,ya,1"


//!  Array Methods

//* array_walk
$numbers = array(5, 8, 15);
function print_value($val)
{
    echo $val . "\n";
}
array_walk($numbers, "print_value"); // 5 8 15

//* array_flip
$myarr = ["name" => "donya", "lastName" => "dastkin"];
array_flip($myarr);  // ["donya"=>"name","dastkin"=>"lastName"]

//* array_reverse
array_reverse($numbers);  // [15,8,5]

//* array_keys
array_keys($myarr);  // "name"  "lastName"

//* array_values
array_values($myarr); // "donya"  "dastkin"

//* ksort
$arr = ["ن" => "nima", "م" => "mahsa", "ب" => "behnaz"];
ksort($arr);  // ["ب"=>"behnaz","م"=>"mahsa","ن"=>"nima"]

//* array_intersect_key
$arr1 = ["one" => 1, "three" => 3, "five" => 5, "six" => 66];
$arr2 = ["two" => 2, "three" => 33, "four" => 4, "six" => 6];
array_intersect_key($arr1, $arr2);  //["six"=>3,"six"=>66]

?>