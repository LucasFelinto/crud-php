<?php
  include "../config/config.php";

  class Pokemon {
    public $nome;
    public $tipo;
    public $altura;
    public $poder;
    public $cpf;

    public function insert($obj) {
      $query = "{$obj->cpf},{$obj->nome},{$obj->tipo},{$obj->altura},{$obj->poder}\n";
      $fp = fopen(POKEMON_FILE, "a");
      fwrite($fp, $query);
      fclose($fp);
    }

    public function delete($id) {
      $file = file(POKEMON_FILE);
      unset($file[$id]);
      file_put_contents(POKEMON_FILE, implode("", $file));
    }

    public function findAll() {
      $file = file(POKEMON_FILE);
      return array_map("str_getcsv", $file);
    }
  }