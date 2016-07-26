<?php
 class PojoAtendimento {
 private $id_atendimento;
 private $solicitacao;
 private $canal;
 private $observacao;
 private $data;
 private $id_situacao;
 private $id_estagio;

 public function getId_atendimento() {
 return $this->id_atendimento;
 }
 public function setId_atendimento($id_atendimento) {
 $this->id_atendimento = $id_atendimento;
 }
 public function getId_estagio() {
 return $this->id_estagio;
 }
 public function setId_estagio($id_estagio) {
 $this->id_estagio = $id_estagio; 
 }
 public function getSolicitacao() {
 return $this->solicitacao;
 }
 public function setSolicitacao($solicitacao) {
 $this->solicitacao = $solicitacao;
 }
 public function getCanal() {
 return $this->canal;
 }
 public function setCanal($canal) {
 $this->canal = $canal;
 }
 public function getObservacao() {
 return $this->observacao;
 }
 public function setObservacao($observacao) {
 $this->observacao = $observacao;
 }
 public function getData() {
 return $this->data;
 }
 public function setData($data) {
 $this->data = $data;
 }
 public function getId_situacao() {
 return $this->id_situacao;
 }
 public function setId_situacao($id_situacao) {
 $this->id_situacao = $id_situacao;
 }

 }
 ?>
