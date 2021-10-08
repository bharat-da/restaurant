<?php 
session_start();

$first_num=rand(1,10);
$second_num=rand(1,10);

$operators = array("+","-","*");
$operator = rand(0, count($operators)-1);
$operator=$operators[$operator];

switch($operator){
	case "+":
		$answer = $first_num + $second_num;
		break;
	case "-":
		$answer = $first_num - $second_num;
		break;
	case "*":
		$answer = $first_num * $second_num;
		break;

	}
	
	$text = $first_num." ".$operator." ".$second_num; 
	$_SESSION["vercode"] = $text; 
	$_SESSION['answer'] = $answer;
	$height = 25; 
	$width = 65;   
	$image_p = imagecreate($width, $height); 
	$black = imagecolorallocate($image_p, 0, 0, 0); 
	$white = imagecolorallocate($image_p, 255, 255, 255); 
	$font_size = 14; 
	imagestring($image_p, $font_size, 5, 5, $text, $white); 
	imagejpeg($image_p, null, 80);