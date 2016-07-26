<?php
 class PojoInstituicao { 
 private $nome_instituicao;
 private $cnpj; 
 private $representante_legal;
 private $cep; 
 private $cargo_representante; 
 private $endereco;

 public function getNome_instituicao(){
  return $this->nome_instituicao;
 }
 
 public function setNome_instituicao($nome_instituicao){
  $this->nome_instituicao = $nome_instituicao;
 }
 
 public function getCnpj() {
 return $this->cnpj; 
 } 
 public function setCnpj($cnpj) {
 $this->cnpj = $cnpj; 
 }
 public function getRepresentante_legal() { 
 return $this->representante_legal; 
 } 
 public function setRepresentante_legal($representante_legal) {
 $this->representante_legal = $representante_legal; 
 } 
 public function getCep() {
 return $this->cep;
 }
 public function setCep($cep) { 
 $this->cep = $cep; 
 }
 public function getEndereco() {
 return $this->endereco;
 }
 public function setEndereco($endereco) { 
 $this->endereco = $endereco; 
 }
 public function getCargo_representante() {
 return $this->cargo_representante; 
 } 
 public function setCargo_representante($cargo_representante) { 
 $this->cargo_representante = $cargo_representante; 
 } 
 
 } 
 ?>