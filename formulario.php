<?php

include_once("conexao.php");



$nome = $_POST['nome']; 
$email = $_POST['email'];
$telefone= $_POST['telefone'];

$data =  $_POST['data'];
$hora = $_POST['hora'];

$sql = "INSERT INTO events (title, email, telefone,start,end ) VALUES ('$nome','$email','$telefone','$data''$hora','$data''$hora')";



if (!mysqli_query($conn,$sql))
{
    die('Error: ' . mysqli_error($conn));
}

mysqli_close($conn);

header("Location: index.html"); exit;


?>