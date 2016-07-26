<?php

require_once "pojo_pessoa.php";

 class PojoEstagiario extends PojoPessoa{
 private $curso;
 private $turma;
 private $cpf_pessoa;
 
 public function getCpf_pessoa(){
 return $this->cpf_pessoa;
 }
 public function setCpf_pessoa($cpf_pessoa) {
 $this->cpf_pessoa = $cpf_pessoa;
 }
 public function getCurso() {
 return $this->curso;
 }
 public function setCurso($curso) {
 $this->curso = $curso;
 }
 public function getTurma() {
 return $this->turma;
 }
 public function setTurma($turma) {
 $this->turma = $turma;
 }


 }
 ?>
