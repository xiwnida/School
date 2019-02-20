<h2>Example variable, IF ELSE</h2>

<?php
echo '<h3>Variable</h3>';
$n1=10;
$n2=15;
$result=$n1+$n2;
echo'<p>'.$n1.'+'.$n2.'='.$result.'</p>';
//----------------
echo '<hr>';
echo '<h3>IF-ELSE</h3>';
$number=12;
$comment='';
if($number%2==0){
    $comment.=$number.' - четное число.';
}else{
    $comment.=$number.' - нечетное число.';
}
echo $comment;