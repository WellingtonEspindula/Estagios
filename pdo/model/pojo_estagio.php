<?php
 class PojoEstagio {
 private $id_estagio;
 private $protocolo;
 private $situacao;
 private $obrigacao;
 private $inicio;
 private $instituicao_de_ensino_CNPJ;
 private $fim;
 private $horas_diarias;
 private $horas_semanais;
 private $auxilio;
 private $area;
 private $turno;
 private $alimentacao;
 private $transporte;
 private $remuneracao;
 private $agente_integracao;
 private $carga_total;
 private $id_estagiario;
 private $id_concedente;
 private $id_orientador;
 private $id_supervisor;

public function getInstituicao_de_ensino_CNPJ() {
 return $this->instituicao_de_ensino_CNPJ;
 }
 public function setInstituicao_de_ensino_CNPJ($instituicao_de_ensino_CNPJ) {
 $this->instituicao_de_ensino_CNPJ= $instituicao_de_ensino_CNPJ;
 }
 public function getId_estagiario() {
 return $this->id_estagiario;
 }
 public function setId_estagiario($id_estagiario) {
 $this->id_estagiario = $id_estagiario;
 }
 public function getId_supervisor() {
 return $this->id_supervisor;
 }
 public function setId_supervisor($id_supervisor) {
 $this->id_supervisor = $id_supervisor;
 }
 public function getId_orientador() {
 return $this->id_orientador;
 }
 public function setId_orientador($id_orientador) {
 $this->id_orientador = $id_orientador;
 }
 public function getId_concedente() {
 return $this->id_concedente;
 }
 public function setId_concedente($id_concedente) {
 $this->id_concedente = $id_concedente;
 }
 public function getId_estagio() {
 return $this->id_estagio;
 }
 public function setId_estagio($id_estagio) {
 $this->id_estagio = $id_estagio;
 }
 public function getProtocolo() {
 return $this->protocolo;
 }
 public function setProtocolo($protocolo) {
 $this->protocolo = $protocolo;
 }
 public function getSituacao() {
 return $this->situacao;
 }
 public function setSituacao($situacao) {
 $this->situacao = $situacao;
 }
 public function getObrigacao() {
 return $this->obrigacao;
 }
 public function setObrigacao($obrigacao) {
 $this->obrigacao = $obrigacao;
 }
 public function getInicio() {
 return $this->inicio;
 }
 public function setInicio($inicio) {
 $this->inicio = $inicio;
 }
 public function getFim() {
 return $this->fim;
 }
 public function setFim($fim) {
 $this->fim = $fim;
 }
 public function getHoras_diarias(){
 return $this->horas_diarias;
 }
 public function setHoras_diarias($horas_diarias) {
 $this->horas_diarias = $horas_diarias;
 }
  public function getHoras_semanais() {
 return $this->horas_semanais;
 }
 public function setHoras_semanais($horas_semanais) {
 $this->horas_semanais = $horas_semanais;
 }
  public function getAuxilio() {
 return $this->auxilio;
 }
 public function setAuxilio($auxilio) {
 $this->auxilio = $auxilio;
 }
  public function getArea() {
 return $this->area;
 }
 public function setArea($area) {
 $this->area = $area;
 }
  public function getTurno() {
 return $this->turno;
 }
 public function setTurno($turno) {
 $this->turno = $turno;
 }
  public function getAlimentacao() {
 return $this->alimentacao;
 }
 public function setAlimentacao($alimentacao) {
 $this->alimentacao = $alimentacao;
 }
  public function getTransporte() {
 return $this->transporte;
 }
 public function setTransporte($transporte) {
 $this->transporte = $transporte;
 }
  public function getRemuneracao() {
 return $this->remuneracao;
 }
 public function setRemuneracao($remuneracao) {
 $this->remuneracao = $remuneracao;
 }
   public function getAgente_integracao() {
 return $this->agente_integracao;
 }
 public function setAgente_integracao($agente_integracao) {
 $this->agente_integracao = $agente_integracao;
 }
   public function getCarga_total() {
 return $this->carga_total;
 }
 public function setCarga_total($carga_total) {
 $this->carga_total = $carga_total;
 }

 }
 ?>
