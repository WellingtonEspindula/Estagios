<?php

require_once "pojo_pessoa.php";

 class PojoSupervisor extends PojoPessoa {
 private $cargo;
  private $cpf_pessoa;
 private $formacao;
 private $id_estagio;

 public function getCargo() {
 return $this->cargo;
 }
 public function setCargo($cargo) {
 $this->cargo = $cargo;
 }
 public function getFormacao() {
 return $this->formacao;
 }
 public function setFormacao($formacao) {
 $this->formacao = $formacao;
 }
 public function getCpf_pessoa() {
 return $this->cpf_pessoa;
 }
 public function setCpf_pessoa($cpf_pessoa) {
 $this->cpf_pessoa = $cpf_pessoa;
 }

 }
 ?>
