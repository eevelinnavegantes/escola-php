<?php
    include("conecta.php");
    // Para pegar o texto dos inputs
    $matricula = $_POST["matricula"];
    $nome      = $_POST["nome"];
    $idade     = $_POST["idade"];

    //Se clicou no botão INSERIR
    if(isset($_POST["inserir"]))
    {
    
    $comando = $pdo->prepare("INSERT INTO alunos VALUES ($matricula,'$nome', $idade)" );

    $resultado = $comando->execute();

    // Para voltar no formulário
    header("Location: cadastro.html");
    }
     
    //Se clicou no botão EXCLUIR
     if(isset($_POST["excluir"]))
    {
    
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    $resultado = $comando->execute();
    
    header("Location: cadastro.html");
    }

    //Se clicou no botão ALTERAR
    if(isset($_POST["alterar"]))
    {
    
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome',idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();

    header("Location: cadastro.html");
    }
    
    //Se clicou no botão LISTAR
    if(isset($_POST["listar"]))
    {
    
    $comando = $pdo->prepare("SELECT * FROM alunos");
    $resultado = $comando->execute();
    
    while( $linhas = $comando->fetch())
    {
        $m = $linhas["matricula"];
        $n = $linhas["nome"];
        $i = $linhas["idade"];
        echo("matricula: $m nome: $n idade: $i <br>");
    }
    }


    
?>