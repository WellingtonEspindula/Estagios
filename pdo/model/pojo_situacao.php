<?php
 class PojoSituacao { 
 private $id_situacao;
 private $descricao; 

 public function getId_situacao() {
 return $this->id_situacao; 
 } 
 public function setId_situacao($id_situacao) { 
 $this->id_situacao = $id_situacao; 
 }
 public function getDescricao() {
 return $this->descricao; 
 } 
 public function setDescricao($descricao) {
 $this->descricao = $descricao; 
 }
 
 } 
 ?>
