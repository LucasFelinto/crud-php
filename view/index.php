<?php 
  include "../model/Treinador.php"; 
  include "../model/Pokemon.php";
  $Treinaodor = new Treinador();
  $Pokemon = new Pokemon();
  $all = $Treinaodor->findAll(); // print_r($Pokemon->findAll()); ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/semantic.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <form action="/controller/insert.php" method="POST">
        <!-- bateu a preguiça -->
        <input type="text" placeholder="nome" name="nome" id="">  
        <input type="text" placeholder="sobrenome" name="sobrenome">
        <input type="text" placeholder="cpf" name="cpf">
        <input type="text" placeholder="cidade" name="cidade">
        <input type="submit">
      </form>
    
      <?php foreach ($Treinaodor->findAll() as $index => $values): ?>
      <?php list($cpf, $nome, $sobrenome, $cidade) = $values ?>
      <div class="ui cards">
        <div class="card">
          <div class="content">
            <div class="header">
              <?= $nome ?>
              <?= $sobrenome ?>
            </div>
            <div class="meta">
              <?= $cidade ?>
            </div>
            <div class="description">
              CPF:
              <?= $cpf ?>
            </div>
          </div>
          <div class="extra content">
            <div class="ui two buttons">
              <div class="ui basic green button">
                <a class="btn-poke" href="?cpf=<?=$cpf?>&index=<?=$index?>">Pokemons</a>
              </div>
              <div class="ui basic red button">
                <a href="/controller/delete.php?id=<?= $index ?>">Remover</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="modal">
      <?php 
        $filterAllPokemonsUser = array_filter($Pokemon->findAll(), function($item) { 
          return $item[0] == $_GET["cpf"]; 
        }); 
        list($cpfUsuario,$nomeUsuario, $sobrenomeUsuario,$cidadeUsuario) = $Treinaodor->findAll()[$_GET["index"]]; 
      ?>
      <div class="content2">
        <div class="nome">
          <h1>
            <?= $nomeUsuario ?>
            <?= $sobrenomeUsuario ?>
          </h1>
          <p><?= $cidadeUsuario?></p>
        </div>
        <h1 clas="cpf"><?=$cpfUsuario?></h1>
        <h1 class="titulo">Pokemons: </h1>

        <table class="ui celled table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Tipo</th>
              <th>Altura</th>
              <th>Poder</th>
              <th>Remover</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($filterAllPokemonsUser as $index => $pokemons): ?>
                <?php list(, $pokemonName, $pokemonTipo, $pokemonAltura, $pokemonPoder) = $pokemons; ?>
                  <tr>
                    <td data-label="Nome"><?=$pokemonName?></td>
                    <td data-label="Tipo"><?=$pokemonTipo?></td>
                    <td data-label="Altura"><?=$pokemonAltura?></td>
                    <td data-label="Job"><?=$pokemonPoder?></td>
                    <td><a class="btn2" href="/controller/delete.php?idPoke=<?=$index?>&cpf=<?=$_GET["cpf"]?>&index=<?=$_GET["index"]?>">Remover</a></td>
                  </tr>
            <?php  endforeach ?>
          </tbody>
        </table>

        <h1 class="adicionar">Adicionar: </h1>

        <div>
          <form class="ui form" action="/controller/insert.php" method="POST">
            <div class="field">
              <label>Nome</label>
              <input type="text" name="nomePoke" placeholder="Nome">
            </div>
            <div class="field">
              <label>Tipo</label>
              <input type="text" name="tipoPoke" placeholder="Tipo">
            </div>
            <div class="field">
              <label>Altura</label>
              <input type="text" name="alturaPoke" placeholder="Altuea">
            </div>
            <div class="field">
              <label>Poder</label>
              <input type="text" name="poderPoke" placeholder="Poder">
            </div>
            <div class="field">
              <input type="hidden" value="<?=$_GET["cpf"]?>" name="cpf" >
            </div>
            <div class="field">
              <input type="hidden" value="<?=$_GET["index"]?>" name="index" >
            </div>
            <button class="ui button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script src="../js/script.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"
    ></script>
    <script src="../css/semantic.js"></script>
  </body>
</html>