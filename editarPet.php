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
$caracteristicas = $_POST['caracteristicas'];


// cria uma array e separa cada elemento pela virgula
$caracArray = explode(',', $caracteristicas);

// Remover espaços em branco antes e depois de cada valor
$caracArray = array_map('trim', $caracArray);

// Converter o array em uma string separada por vírgulas

if (!empty($caracArray)) {
    $caracTexto = implode(',', $caracArray);
} else {
    $caracTexto = 'Não foram adicionadas caracteristicas'; // Ou qualquer valor padrão que você desejar
}

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
        imagemPet = '$imagemPet',
        caracteristicas = '$caracTexto'

        where idPet = '$idPet';
        "
        
    );	  // prepara o código sql  
	$stmt ->execute();    // executa o código alterando os dados da tabela pet onde o id for igual o pré estabelecido

    header("location:gerenciarpet.php"); // redireciona para a página gerenciarpet.php

?>