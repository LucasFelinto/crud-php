<?php
  include "../config/config.php";

  class Treinador {
    public $nome;
    public $sobrenome;
    public $cidade;
    public $cpf;

    public function insert($obj) {
      $query = "{$obj->cpf},{$obj->nome},{$obj->sobrenome},{$obj->cidade}\n";
      $fp = fopen(TREINADOR_FILE, "a");
      fwrite($fp, $query);
      fclose($fp);
    }

    public function delete($id) {
      $file = file(TREINADOR_FILE);
      unset($file[$id]);
      file_put_contents(TREINADOR_FILE, implode("", $file));
    }

    public function findAll() {
      $file = file(TREINADOR_FILE);
      return array_map("str_getcsv", $file);
    }

  }