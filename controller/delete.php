<?php
  include "../model/Treinador.php";
  include "../model/Pokemon.php";
  
  if($_GET["id"] ?? null) {
    $id = $_GET["id"];
    $Treinador = new Treinador();
    $Treinador->delete($id);
  }

  $idPoke = $_GET["idPoke"];
  $Pokemon = new Pokemon();
  $Pokemon->delete($idPoke);

  echo $idPoke;
  header("Location: /view/index.php?cpf={$_GET["cpf"]}&index={$_GET["index"]}");
  