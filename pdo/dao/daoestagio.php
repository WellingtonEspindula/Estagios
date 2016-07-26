<?php
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_estagio.php";
class DaoEstagio {
 public static $instance;
 private function __construct() {
  //
 }
 public static function getInstance() {
  if (!isset(self::$instance))
   self::$instance = new DaoEstagio();
   return self::$instance;
 }
 public function Inserir(PojoEstagio $estagio) {
  try {
  
   $sql =
	"INSERT INTO estagio (
	     id_estagio,
      protocolo,
      situacao,
      obrigacao,
      inicio,
      fim,
      horas_diarias,
      horas_semanais,
      auxilio,
      area,
      turno,
      alimentacao,
      transporte,
      remuneracao,
      agente_integracao,
      carga_total,
      concedente_id_concedente,
	     orientador_pessoa_CPF,
	     estagiario_pessoa_CPF,
	     supervisor_pessoa_CPF,
	     instituicao_de_ensino_CNPJ)
   VALUES (
	     :id_estagio,
      :protocolo,
      :situacao,
	     :obrigacao,
      :inicio,
      :fim,
      :horas_diarias,
	     :horas_semanais,
	     :auxilio,
	     :area,
	     :turno,
	     :alimentacao,
	     :transporte,
	     :remuneracao,
	     :agente_integracao,
	     :carga_total,
      :id_concedente,
	     :id_orientador,
	     :id_estagiario,
	     :id_supervisor,
	    :instituicao_de_ensino_CNPJ
	  )";
 $p_sql = Conexao::getInstance()->prepare($sql);
 $p_sql->bindValue(":protocolo", $estagio->getProtocolo());
 $p_sql->bindValue(":situacao", $estagio->getSituacao());
 $p_sql->bindValue(":obrigacao", $estagio->getObrigacao());
 $p_sql->bindValue(":inicio", $estagio->getInicio());
 $p_sql->bindValue(":fim", $estagio->getFim());
 $p_sql->bindValue(":horas_diarias",$estagio->getHoras_diarias());
 $p_sql->bindValue(":horas_semanais",$estagio->getHoras_semanais());
 $p_sql->bindValue(":auxilio",$estagio->getAuxilio());
 $p_sql->bindValue(":area",$estagio->getArea());
 $p_sql->bindValue(":turno",$estagio->getTurno());
 $p_sql->bindValue(":alimentacao",$estagio->getAlimentacao());
 $p_sql->bindValue(":transporte",$estagio->getTransporte());
 $p_sql->bindValue(":remuneracao",$estagio->getRemuneracao());
 $p_sql->bindValue(":agente_integracao",$estagio->getAgente_integracao());
 $p_sql->bindValue(":carga_total",$estagio->getCarga_total());
 $p_sql->bindValue(":id_estagio",$estagio->getId_estagio());
 $p_sql->bindValue(":id_estagiario",$estagio->getId_estagiario());
 $p_sql->bindValue(":id_concedente",$estagio->getId_concedente());
  $p_sql->bindValue(":id_orientador",$estagio->getId_orientador());
  $p_sql->bindValue(":id_supervisor",$estagio->getId_supervisor());
  $p_sql->bindValue(":instituicao_de_ensino_CNPJ",$estagio->getInstituicao_de_ensino_CNPJ());
 return $p_sql->execute();
 } catch (Exception $e) {
  print $e->getMessage();
 }
 }
 
 
 public function Editar(PojoEstagio $estagio) {
 try {
  $sql = "UPDATE estagio set
  protocolo=:protocolo,
  situacao=:situacao,
	 obrigacao=:obrigacao,
  inicio=:inicio,
  fim=:fim,
  horas_diarias=:horas_diarias,
	 horas_semanais=:horas_semanais,
	 auxilio=:auxilio,
	 area=:area,
	 turno=:turno,
	 alimentacao=:alimentacao,
	 transporte=:transporte,
	 remuneracao=:remuneracao,
	 agente_integracao=:agente_integracao,
	 carga_total=:carga_total,
  estagiario_pessoa_CPF=:id_estagiario,
  CONCEDENTE_ID_CONCEDENTE =:id_concedente,
	 orientador_pessoa_CPF =:id_orientador,
	 supervisor_pessoa_CPF =:id_supervisor,
	 instituicao_de_ensino_CNPJ =:instituicao_de_ensino_CNPJ
	 WHERE id_estagio=:id_estagio";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":protocolo", $estagio->getProtocolo());
   $p_sql->bindValue(":situacao", $estagio->getSituacao());
   $p_sql->bindValue(":obrigacao", $estagio->getObrigacao());
   $p_sql->bindValue(":inicio", $estagio->getInicio());
   $p_sql->bindValue(":fim", $estagio->getFim());
   $p_sql->bindValue(":horas_diarias",$estagio->getHoras_diarias());
   $p_sql->bindValue(":horas_semanais",$estagio->getHoras_semanais());
   $p_sql->bindValue(":auxilio",$estagio->getAuxilio());
   $p_sql->bindValue(":area",$estagio->getArea());
   $p_sql->bindValue(":turno",$estagio->getTurno());
   $p_sql->bindValue(":alimentacao",$estagio->getAlimentacao());
   $p_sql->bindValue(":transporte",$estagio->getTransporte());
   $p_sql->bindValue(":remuneracao",$estagio->getRemuneracao());
   $p_sql->bindValue(":agente_integracao",$estagio->getAgente_integracao());
   $p_sql->bindValue(":carga_total",$estagio->getCarga_total());
   $p_sql->bindValue(":id_estagio",$estagio->getId_estagio());
   $p_sql->bindValue(":id_estagiario",$estagio->getId_estagiario());
   $p_sql->bindValue(":id_concedente",$estagio->getId_concedente());
   $p_sql->bindValue(":id_orientador",$estagio->getId_orientador());
   $p_sql->bindValue(":id_supervisor",$estagio->getId_supervisor());
   $p_sql->bindValue(":instituicao_de_ensino_CNPJ",$estagio->getInstituicao_de_ensino_CNPJ());
   return $p_sql->execute();
  } catch (Exception $e) {
   print $e->getMessage();
 }
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM estagio WHERE id_estagio = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   return $p_sql->execute();
  } catch (Exception $e) {
   print $e->getMessage();
  }
 }
 public function BuscarPorCOD($cod) {
  try {
   $sql = "SELECT * FROM estagio WHERE id_estagio = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   $p_sql->execute();
   return $this->populaEstagio($p_sql->fetch(PDO::FETCH_ASSOC));
  } catch (Exception $e) {
   print  $e->getMessage();
  }
 }
 
 public function Seleciona() { 
  try {
  
  $resultado = array();
   $sql = "SELECT * FROM estagio"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print $e->getMessage(); 
  } 
 }
 
 private function processResults($stmt) {
        $results = array();
 
 
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
				$pojo = new PojoEstagio; 
  
				$pojo->setId_estagio($row['ID_ESTAGIO']);
				$pojo->setProtocolo($row['PROTOCOLO']); 
				$pojo->setSituacao($row['SITUACAO']); 
				$pojo->setObrigacao($row['OBRIGACAO']); 
				$pojo->setInicio($row['INICIO']); 
				$pojo->setFim($row['FIM']); 
				$pojo->setHoras_diarias($row['HORAS_DIARIAS']);
				$pojo->setHoras_semanais($row['HORAS_SEMANAIS']); 
				$pojo->setAuxilio($row['AUXILIO']); 
				$pojo->setArea($row['AREA']); 
				$pojo->setTurno($row['TURNO']); 
				$pojo->setAlimentacao($row['ALIMENTACAO']); 
				$pojo->setTransporte($row['TRANSPORTE']); 
				$pojo->setRemuneracao($row['REMUNERACAO']); 
				$pojo->setAgente_integracao($row['AGENTE_INTEGRACAO']); 
				$pojo->setCarga_total($row['CARGA_TOTAL']); 
				$pojo->setInstituicao_de_ensino_CNPJ($row['instituicao_de_ensino_CNPJ']); 
				$pojo->setId_estagiario($row['estagiario_pessoa_CPF']); 
				$pojo->setId_concedente($row['CONCEDENTE_ID_CONCEDENTE']); 
				$pojo->setId_orientador($row['orientador_pessoa_CPF']); 
				$pojo->setId_supervisor($row['supervisor_pessoa_CPF']); 
 
                $results[] = $pojo;
		}
 
        return $results;
    }
 
 private function populaEstagio($row) {
  $pojo = new PojoEstagio;
  $pojo->setProtocolo($row['PROTOCOLO']);
  $pojo->setSituacao($row['SITUACAO']);
  $pojo->setObrigacao($row['OBRIGACAO']);
  $pojo->setInicio($row['INICIO']);
  $pojo->setFim($row['FIM']);
  $pojo->setHoras_diarias($row['HORAS_DIARIAS']);
  $pojo->setHoras_semanais($row['HORAS_SEMANAIS']);
  $pojo->setAuxilio($row['AUXILIO']);
  $pojo->setArea($row['AREA']);
  $pojo->setTurno($row['TURNO']);
  $pojo->setAlimentacao($row['ALIMENTACAO']);
  $pojo->setTransporte($row['TRANSPORTE']);
  $pojo->setRemuneracao($row['REMUNERACAO']);
  $pojo->setAgente_integracao($row['AGENTE_INTEGRACAO']);
  $pojo->setCarga_total($row['CARGA_TOTAL']);
  $pojo->setId_estagio($row['ID_ESTAGIO']);
  $pojo->setId_estagiario($row['estagiario_pessoa_CPF']);
  $pojo->setId_concedente($row['CONCEDENTE_ID_CONCEDENTE']);
  $pojo->setId_orientador($row['orientador_pessoa_CPF']);
		$pojo->setId_supervisor($row['supervisor_pessoa_CPF']); 
  $pojo->setInstituicao_de_ensino_CNPJ($row['instituicao_de_ensino_CNPJ']);
  return $pojo;
 }
} ?>
