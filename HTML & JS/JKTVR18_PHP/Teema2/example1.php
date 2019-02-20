<?php

function title($text,$nom){
    $str='<h'.$nom.'>'.$text.'<h'.$nom.'>';
    return $str;
}
echo title("Hello, world", 1);

$text='Tere, maailm';
$n=2;
echo title($text, $n);
$text="Привет, Мир!";
echo title($text, 4);
