<?php
 class PojoConcedente { 
 private $id_concedente;
 private $nome; 
 private $razao;
 private $cnpj; 
 private $endereco; 
 private $ramo; 
 private $cidade; 
 private $email; 
 private $telefone; 
 private $representante; 
 private $cargo_representante; 
 private $uf; 
 private $rg_representante; 
 private $emissor_rg_representante;
 private $expedicao_rg_representante;
 private $cpf_representante;
 private $convenio;

 public function getId_concedente() {
 return $this->id_concedente; 
 } 
 public function setId_concedente($id_concedente) { 
 $this->id_concedente = $id_concedente; 
 }
 public function getConvenio() {
 return $this->convenio; 
 } 
 public function setConvenio($convenio) {
 $this->convenio = $convenio; 
 }
 public function getNome() {
 return $this->nome; 
 } 
 public function setNome($nome) {
 $this->nome = $nome; 
 }
 public function getRazao() { 
 return $this->razao; 
 } 
 public function setRazao($razao) {
 $this->razao = $razao; 
 } 
 public function getCnpj() {
 return $this->cnpj;
 }
 public function setCnpj($cnpj) { 
 $this->cnpj = $cnpj; 
 }
 public function getEndereco() {
 return $this->endereco; 
 } 
 public function setEndereco($endereco) { 
 $this->endereco = $endereco; 
 } 
 public function getRamo(){ 
 return $this->ramo; 
 }
 public function setRamo($ramo) {
 $this->ramo = $ramo; 
 } 
  public function getCidade() {
 return $this->cidade; 
 } 
 public function setCidade($cidade) {
 $this->cidade = $cidade; 
 }
  public function getEmail() {
 return $this->email; 
 } 
 public function setEmail($email) {
 $this->email = $email; 
 }
  public function getTelefone() {
 return $this->telefone; 
 } 
 public function setTelefone($telefone) {
 $this->telefone = $telefone; 
 }
  public function getRepresentante() {
 return $this->representante; 
 } 
 public function setRepresentante($representante) {
 $this->representante = $representante; 
 }
  public function getCargo_representante() {
 return $this->cargo_representante; 
 } 
 public function setCargo_representante($cargo_representante) {
 $this->cargo_representante = $cargo_representante; 
 }
  public function getUf() {
 return $this->uf; 
 } 
 public function setUf($uf) {
 $this->uf = $uf; 
 }
  public function getRg_representante() {
 return $this->rg_representante; 
 } 
 public function setRg_representante($rg_representante) {
 $this->rg_representante = $rg_representante; 
 }
   public function getEmissor_rg_representante() {
 return $this->emissor_rg_representante; 
 } 
 public function setEmissor_rg_representante($emissor_rg_representante) {
 $this->emissor_rg_representante = $emissor_rg_representante; 
 }
 public function getExpedicao_rg_representante() {
 return $this->expedicao_rg_representante; 
 } 
 public function setExpedicao_rg_representante($expedicao_rg_representante) {
 $this->expedicao_rg_representante = $expedicao_rg_representante; 
 }
   public function getCpf_representante() {
 return $this->cpf_representante; 
 } 
 public function setCpf_representante($cpf_representante) {
 $this->cpf_representante = $cpf_representante; 
 }
 
 } 
 ?>
