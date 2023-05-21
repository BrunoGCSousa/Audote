<?php
include('config.php');
?>


<header>
    <nav>
        <ul class="nav-links">
            <li>
                <a href="index.php"><img src="./src/img/logo.jpg" alt=""></a>
            </li>

            <?php

            if($_SESSION == null) {
                echo "       
                <li><a href='reglog.php'>Quero adotar</a></li>
                <li><a href='#'>Quero ajudar</a></li>
                <li><a href='#'>Parcerias</a></li>
                ";
            } else if ($_SESSION["tipoConta"] === 'admin') {
                echo "
                <li><a href='cadastrarpet.php'>Cadastrar Pet</a></li>
                <li><a href='gerenciarpet.php'>Gerenciar Pets</a></li>
                ";
            } else if ($_SESSION["tipoConta"] === 'user') {
                echo "       
                    <li><a href='audote.php'>Quero adotar</a></li>
                    <li><a href='#'>Quero ajudar</a></li>
                    <li><a href='#'>Parcerias</a></li>
                    ";
            }

            
            ?>

            <?php if (!empty($_SESSION["id"])) {
                $id = $_SESSION["id"];
                $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
                $row = mysqli_fetch_assoc($result);
                echo "
                        <li><a href='logout.php' class='sair'>Olá, $row[nome]<br> Deseja sair?</a></li>
                        
                        ";
            } else {
                echo "
            
                        <a href='reglog.php' class='botao-entrar'>Entrar</a>
                        
                        ";
            } ?>
        </ul>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
</header>