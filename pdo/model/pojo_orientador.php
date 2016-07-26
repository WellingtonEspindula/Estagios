<?php

require_once "pojo_pessoa.php";

 class PojoOrientador extends PojoPessoa {
 private $cpf_pessoa;

 public function getCpf_pessoa() {
 return $this->cpf_pessoa;
 }
 public function setCpf_pessoa($cpf_pessoa) {
 $this->cpf_pessoa = $cpf_pessoa;
 }

 }
 ?>
