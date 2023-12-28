<?php
// //Complete the solution so that it returns true if the first argument(string) passed in ends with the 2nd argument (also a string).

// Examples:

// solution("abc", "bc") // returns true
// solution("abc", "d") // returns false
//link https://www.codewars.com/kata/51f2d1cafc9c0f745c00037d
function solution($str, $ending) {
  if(empty($ending))
    return true;
  if(strstr($str,$ending)){
    $a = substr($str,-strlen($ending));
    if($a == $ending)
      return true;
  }
  return false;
}
// Given a string made of digits [0-9], return a string where each digit is repeated a number of times equals to its value.

// Examples
// "312" should return "333122"
// "102269" should return "12222666666999999999"
// link https://www.codewars.com/kata/585b1fafe08bae9988000314
function digits_explode(string $s): string {
  $temp='';
  $a=strlen($s);
  for($i=0;$i<$a;$i++){
    for($j=0;$j<$s[$i];$j++){
      $temp.= $s[$i];
      }
  } 
  return $temp;
}
// Jaden Smith, the son of Will Smith, is the star of films such as The Karate Kid (2010) and After Earth (2013). Jaden is also known for some of his philosophy that he delivers via Twitter. When writing on Twitter, he is known for almost always capitalizing every word. For simplicity, you'll have to capitalize each word, check out how contractions are expected to be in the example below.

// Your task is to convert strings to how they would be written by Jaden Smith. The strings are actual quotes from Jaden Smith, but they are not capitalized in the same way he originally typed them.

// Example:

// Not Jaden-Cased: "How can mirrors be real if our eyes aren't real"
// Jaden-Cased:     "How Can Mirrors Be Real If Our Eyes Aren't Real"
function toJadenCase($string) 
{
    return ucwords($string);
    
}
// An Arithmetic Progression is defined as one in which there is a constant difference between the consecutive terms of a given series of numbers. You are provided with consecutive elements of an Arithmetic Progression. There is however one hitch: exactly one term from the original series is missing from the set of numbers which have been given to you. The rest of the given series is the same as the original AP. Find the missing term.

// You have to write a function that receives a list, list size will always be at least 3 numbers. The missing term will never be the first or last one.

// Example
// findMissing([1, 3, 5, 9, 11]) == 7
// PS: This is a sample question of the facebook engineer challenge on interviewstreet. I found it quite fun to solve on paper using math, derive the algo that way. Have fun!
// link https://www.codewars.com/kata/52de553ebb55d1fca3000371
function findMissing($list) {
 if($list[1]-$list[0]==$list[2]-$list[1]){
    $difference=$list[1]-$list[0];
 }
 else{
    $difference=$list[2]-$list[1];
  }
  
  for($i=0;$i<count($list);$i++){
    if($difference !== $list[$i+1]-$list[$i]){
      return $list[$i] + $difference;
      }
  }
}
// You are given two arrays a1 and a2 of strings. Each string is composed with letters from a to z. Let x be any string in the first array and y be any string in the second array.

// Find max(abs(length(x) − length(y)))

// If a1 and/or a2 are empty return -1 in each language except in Haskell (F#) where you will return Nothing (None).

// Example:
// a1 = ["hoqq", "bbllkw", "oox", "ejjuyyy", "plmiis", "xxxzgpsssa", "xxwwkktt", "znnnnfqknaz", "qqquuhii", "dvvvwz"]
// a2 = ["cccooommaaqqoxii", "gggqaffhhh", "tttoowwwmmww"]
// mxdiflg(a1, a2) --> 13
// Bash note:
// input : 2 strings with substrings separated by ,
// output: number as a string
//link https://www.codewars.com/kata/5663f5305102699bad000056

function mxdiflg($a1, $a2) {
  if(count($a1) == 0 || count($a2) == 0)
    return -1;
  $max = 0;
  for($i=0;$i<count($a1);$i++){
    for($j=0;$j<count($a2);$j++){
      if(abs(strlen($a1[$i])-strlen($a2[$j])) > $max)
        $max = abs(strlen($a1[$i])-strlen($a2[$j]));
    }
   
  }
  return $max;
}
// In this Kata, you will be given a string that may have mixed uppercase and lowercase letters and your task is to convert that string to either lowercase only or uppercase only based on:

// make as few changes as possible.
// if the string contains equal number of uppercase and lowercase letters, convert the string to lowercase.
// For example:

// solve("coDe") = "code". Lowercase characters > uppercase. Change only the "D" to lowercase.
// solve("CODe") = "CODE". Uppercase characters > lowecase. Change only the "e" to uppercase.
// solve("coDE") = "code". Upper == lowercase. Change all to lowercase.
// More examples in test cases. Good luck!
//link https://www.codewars.com/kata/5b180e9fedaa564a7000009a

function solve($s) {
  $a=str_split($s);
   for($i=0;$i<count($a);$i++){
     
     if(strtoupper($a[$i])==$a[$i]){
       $touper++;
     }
     
     else{
       $lower++;
     }
  
  }
        if($touper<=$lower){
           return strtolower($s);
        }
          return strtoupper($s);
        
}

// Modify the kebabize function so that it converts a camel case string into a kebab case.

// "camelsHaveThreeHumps"  -->  "camels-have-three-humps"
// "camelsHave3Humps"  -->  "camels-have-humps"
// "CAMEL"  -->  "c-a-m-e-l"
// Notes:

// the returned string should only contain lowercase letters
//link https://www.codewars.com/kata/57f8ff867a28db569e000c4a
function kebabize($string) {
  $a=str_split($string);
  $temp = '';
  $numbers = ['0','1','2','3','4','5','6','7','8','9'];
  for($i=0;$i<count($a);$i++){
    if(in_array($a[$i], $numbers))
      continue;
    if($a[$i] == strtoupper($a[$i]))
      $temp .= ($temp==''?'':'-').strtolower($a[$i]);
    else
      $temp .= $a[$i];
  }
  return $temp;
}
// We need a function that can transform a number (integer) into a string.

// What ways of achieving this do you know?

// Examples (input --> output):
// 123  --> "123"
// 999  --> "999"
// -100 --> "-100"
//link https://www.codewars.com/kata/5265326f5fda8eb1160004c8

function numberToString($num)
{
  return strval($num);
}

//This code does not execute properly. Try to figure out why.
// link https://www.codewars.com/kata/50654ddff44f800200000004
function multiply($a, $b) {
  return $a * $b;
}

//Some new cashiers started to work at your restaurant.

// They are good at taking orders, but they don't know how to capitalize words, or use a space bar!

// All the orders they create look something like this:

// "milkshakepizzachickenfriescokeburgerpizzasandwichmilkshakepizza"

// The kitchen staff are threatening to quit, because of how difficult it is to read the orders.

// Their preference is to get the orders as a nice clean string with spaces and capitals like so:

// "Burger Fries Chicken Pizza Pizza Pizza Sandwich Milkshake Milkshake Coke"

// The kitchen staff expect the items to be in the same order as they appear in the menu.

// The menu items are fairly simple, there is no overlap in the names of the items:

// 1. Burger
// 2. Fries
// 3. Chicken
// 4. Pizza
// 5. Sandwich
// 6. Onionrings
// 7. Milkshake
// 8. Coke
//link https://www.codewars.com/kata/5d23d89906f92a00267bb83d
function getOrder($input) {
  $temp = '';
  $a =['Burger','Fries','Chicken','Pizza','Sandwich','Onionrings','Milkshake','Coke'];
  for($i=0;$i<count($a);$i++){
	$count = substr_count($input,strtolower($a[$i]));
    if($count){
      for($j=0;$j<$count;$j++)
        $temp.= $a[$i].' ';
    }
  }
  
  return trim($temp);
}
//Your goal in this kata is to implement a difference function, which subtracts one list from another and returns the result.

// It should remove all values from list a, which are present in list b keeping their order.

// array_diff({1, 2}, 2, {1}, 1, *z) == {2} (z == 1)
// If a value is present in b, all of its occurrences must be removed from the other:

// array_diff({1, 2, 2, 2, 3}, 5, {2}, 1, *z) == {1, 3} (z == 2)
//link https://www.codewars.com/kata/523f5d21c841566fde000009
function arrayDiff($a,$b) {
  return array_values(array_diff($a,$b));
}

// Write a function that accepts two square matrices (N x N two dimensional arrays), and return the sum of the two. Both matrices being passed into the function will be of size N x N (square), containing only integers.

// How to sum two matrices:

// Take each cell [n][m] from the first matrix, and add it with the same [n][m] cell from the second matrix. This will be cell [n][m] of the solution matrix. (Except for C where solution matrix will be a 1d pseudo-multidimensional array).

// Visualization:

// |1 2 3|     |2 2 1|     |1+2 2+2 3+1|     |3 4 4|
// |3 2 1|  +  |3 2 3|  =  |3+3 2+2 1+3|  =  |6 4 4|
// |1 1 1|     |1 1 3|     |1+1 1+1 1+3|     |2 2 4|
// Example
// matrixAddition(
//   [ [1, 2, 3],
//     [3, 2, 1],
//     [1, 1, 1] ],
// //      +
//   [ [2, 2, 1],
//     [3, 2, 3],
//     [1, 1, 3] ] )

// // returns:
//   [ [3, 4, 4],
//     [6, 4, 4],
//     [2, 2, 4] ]
function matrix_addition(array $a, array $b): array {
  for($i=0; $i<count($a); $i++){
     for($j=0; $j<count($b); $j++){
       $sum[$i][$j] = $a[$i][$j] + $b[$i][$j];}}return $sum;
}


//link https://www.codewars.com/kata/550498447451fbbd7600041c
function comp($a1, $a2) {
  echo var_dump($a1, $a2);
  $b=0;
  $c=0;
  if($a1===NULL || $a2===NULL) return false;
  for ($i = 0; $i< count($a1); $i++) {
  for ($j = 1; $j< count($a1); $j++) {
    if($a1[$i] == $a1[$j]){
      $b=$b+1;
    }
  }
}  
  for ($i = 0; $i<count($a2); $i++) {
  for ($j = 1; $j<count($a2); $j++) {
    if($a2[$i] == $a2[$j]){
      $c=$c+1;
    }
  }
}  
  if($c!==$b) return false;

    for($i=0;$i<count($a1);$i++){
      $flag = 0;
      for($j=0;$j<count($a2);$j++){
        if($a1[$i]*$a1[$i] == $a2[$j]){
           $flag = 1;
            break;
        }
      }
      if(!$flag)return false;
    }
      return true;
}
//There is an array with some numbers. All numbers are equal except for one. Try to find it!

// findUniq([ 1, 1, 1, 2, 1, 1 ]) === 2
// findUniq([ 0, 0, 0.55, 0, 0 ]) === 0.55
// It’s guaranteed that array contains at least 3 numbers.

// The tests contain some very huge arrays, so think about performance.

// This is the first kata in series:

// Find the unique number (this kata)
// Find the unique string
// Find The Unique
function find_uniq($a) {
  if($a[0]==$a[1]){
    $b=$a[0];
  }
  else{
    $b=$a[2];
  }
  for($i=0;$i<count($a);$i++){
     if($a[$i]!==$b){
     return $a[$i];
    }
  } 
}
