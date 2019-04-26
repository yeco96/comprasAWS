<?php

$hostname = "localhost";
$database= "bdferreteria";
$username= "root";
$pass= ""; 

$mysql = new mysqli($hostname, $username, $pass, $database);

if($mysql->connect_errno){
    $error = "Falló la conexión";
}else{
    $error = false;
}
