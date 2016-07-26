<?php
 class PojoPessoa { 
 private $nome;
 private $cpf; 
 private $telefone;
 private $rg; 
 private $expedidor;
 private $nascimento;
 private $expedicao; 
 private $endereco;
 private $cep;
 private $celular; 
 private $email;

 public function getNome() {
 return $this->nome; 
 } 
 public function setNome($nome) { 
 $this->nome = $nome; 
 }
 public function getCpf() {
 return $this->cpf; 
 } 
 public function setCpf($cpf) {
 $this->cpf = $cpf; 
 }
 public function getTelefone() { 
 return $this->telefone; 
 } 
 public function setTelefone($telefone) {
 $this->telefone = $telefone; 
 } 
 public function getRg() {
 return $this->rg; 
 } 
 public function setRg($rg) { 
 $this->rg = $rg; 
 }
 public function getNascimento() {
 return $this->nascimento; 
 } 
 public function setNascimento($nascimento) { 
 $this->nascimento = $nascimento; 
 }
 public function getExpedidor() {
 return $this->expedidor; 
 } 
 public function setExpedidor($expedidor) { 
 $this->expedidor = $expedidor; 
 }
 public function getExpedicao() {
 return $this->expedicao; 
 } 
 public function setExpedicao($expedicao) { 
 $this->expedicao = $expedicao; 
 }
 public function getEndereco() {
 return $this->endereco; 
 } 
 public function setEndereco($endereco) {
 $this->endereco = $endereco; 
 }
 public function getCep() {
 return $this->cep; 
 } 
 public function setCep($cep) { 
 $this->cep = $cep; 
 }
 public function getCelular() {
 return $this->celular; 
 } 
 public function setCelular($celular) { 
 $this->celular = $celular; 
 }
 public function getEmail() {
 return $this->email; 
 } 
 public function setEmail($email) {
 $this->email = $email; 
 }
 } 
 ?>