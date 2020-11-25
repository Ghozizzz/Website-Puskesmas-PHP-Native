<?php
$db="puskesmas";
$server="localhost";
$user="root";
$pw="";

$conn=mysqli_connect($server,$user,$pw,$db) or die(mysqli_error());
$url = "http://" . $_SERVER['SERVER_NAME'].'/puskesmas/';
?>