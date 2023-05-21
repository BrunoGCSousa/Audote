<?php

    include("config.php");

    $idPet = $_GET['idPet'];

    // echo $id;


    $stmt = $pdo->prepare("delete from pets where idPet = $idPet");	    
	$stmt ->execute();    

    header("location:gerenciarpet.php"); 


?>