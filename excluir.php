<?php
    include("conecta.php");
    // Para pegar o texto dos inputs
    $matricula = $_GET["M"];

    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");

    $resultado = $comando->execute();

    // Para voltar no formulário
    header("Location: cadastro.html");
?>