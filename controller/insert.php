<?php
  include "../model/Treinador.php";
  include "../model/Pokemon.php";

  if($_POST["cidade"] ?? null) {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cidade = $_POST["cidade"];
    $cpf = $_POST["cpf"];
  
  
    $Treinador = new Treinador();
    $Treinador->nome = $nome;
    $Treinador->sobrenome = $sobrenome;
    $Treinador->cidade = $cidade;
    $Treinador->cpf = $cpf;
  
    $Treinador->insert($Treinador);
    header("Location: /view/index.php");
  }

    $nome = $_POST["nomePoke"];
    $tipo = $_POST["tipoPoke"];
    $altura = $_POST["alturaPoke"];
    $poder = $_POST["poderPoke"];
    $cpfUser = $_POST["cpf"];
    $index = $_POST["index"];
  
    $Pokemon = new Pokemon();
  
    $Pokemon->nome = $nome;
    $Pokemon->tipo = $tipo;
    $Pokemon->altura = $altura;
    $Pokemon->poder = $poder;
    $Pokemon->cpf = $cpfUser;
  
    $Pokemon->insert($Pokemon);
    header("Location: /view/index.php?cpf={$cpfUser}&index={$index}");
  

print_r($cpfUser);  