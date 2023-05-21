<?php

//resgata as informações do formulário 
$idPet = $_POST['idPet'];
$nomePet = $_POST['nomePet'];
$tipoAnimal = $_POST['tipoAnimal'];
$raca = $_POST['raca'];
$idadePet = $_POST['idadePet'];
$porte = $_POST['porte'];
$sexo = $_POST['sexo'];
$descricao = $_POST['descricao'];
$vacinas = $_POST['vacinas'];
$vermifugado = $_POST['vermifugado'];
$imagemPet = $_POST['imagemPet'];

    include("config.php");

    $stmt = $pdo->prepare(
        "update pets set
        nomePet = '$nomePet',
        tipoAnimal = '$tipoAnimal',
        raca = '$raca',
        idadePet = '$idadePet',
        porte = '$porte',
        sexo = '$sexo',
        descricao = '$descricao',
        vacinas = '$vacinas',
        vermifugado = '$vermifugado',
        imagemPet = '$imagemPet'

        where idPet = '$idPet';
        "
        
    );	  // prepara o código sql  
	$stmt ->execute();    // executa o código alterando os dados da tabela pet onde o id for igual o pré estabelecido

    header("location:gerenciarpet.php"); // redireciona para a página gerenciarpet.php

?>