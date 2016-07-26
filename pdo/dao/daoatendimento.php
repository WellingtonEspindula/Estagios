<?php
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_atendimento.php";
class DaoAtendimento {
 public static $instance;
 private function __construct() {
  //
 }
 public static function getInstance() {
  if (!isset(self::$instance))
   self::$instance = new DaoAtendimento();
   return self::$instance;
 }
 public function Inserir(PojoAtendimento $atendimento) {
  try {
   $sql =
	"INSERT INTO atendimento (
      id_atendimento,
      solicitacao,
	  canal,
      observacao,
      data,
      situacao_id_situacao,
	  estagio_id_estagio)
      VALUES (
      :id_atendimento,
      :solicitacao,
	  :canal,
	  :observacao,
      :data,
	  :id_situacao,
     :id_estagio)";
 $p_sql = Conexao::getInstance()->prepare($sql);
 $p_sql->bindValue(":id_atendimento", $atendimento->getId_atendimento());
 $p_sql->bindValue(":solicitacao", $atendimento->getSolicitacao());
 $p_sql->bindValue(":observacao", $atendimento->getObservacao());
 $p_sql->bindValue(":canal", $atendimento->getCanal());
 $p_sql->bindValue(":data",$atendimento->getData());
 $p_sql->bindValue(":id_situacao",$atendimento->getId_situacao());
 $p_sql->bindValue(":id_estagio",$atendimento->getId_estagio());
 return $p_sql->execute();
 } catch (Exception $e) {
  print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
 }
 }
 public function Editar(PojoAtendimento $atendimento) {
 try {
  $sql = "UPDATE atendimento set 
     solicitacao=:solicitacao,
	 canal=:canal,
     observacao=:observacao,
     data=:data,
     situacao_id_situacao=:id_situacao,
    estagio_id_estagio=:id_estagio 
    WHERE id_atendimento=:id_atendimento";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":id_atendimento", $atendimento->getId_atendimento());
   $p_sql->bindValue(":solicitacao", $atendimento->getSolicitacao());
   $p_sql->bindValue(":observacao", $atendimento->getObservacao());
   $p_sql->bindValue(":canal", $atendimento->getCanal());
   $p_sql->bindValue(":data",$atendimento->getData());
   $p_sql->bindValue(":id_situacao",$atendimento->getId_situacao());
   $p_sql->bindValue(":id_estagio",$atendimento->getId_estagio());
   return $p_sql->execute();
  } catch (Exception $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
 }
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM atendimento WHERE id_atendimento = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   return $p_sql->execute();
  } catch (Exception $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
  }
 }
 
 public function Seleciona() { 
  try {
  
  $resultado = array();
   $sql = "SELECT * FROM atendimento"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
 public function BuscarPorCOD($cod) {
  try {
   $sql = "SELECT * FROM atendimento WHERE id_atendimento = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   $p_sql->execute();
   return $this->populaAtendimento($p_sql->fetch(PDO::FETCH_ASSOC));
  } catch (Exception $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
  }
 }
 
 private function populaAtendimento($row) {
  $pojo = new PojoAtendimento;
  $pojo->setId_atendimento($row['ID_ATENDIMENTO']);
  $pojo->setSolicitacao($row['SOLICITACAO']);
  $pojo->setCanal($row['CANAL']);
  $pojo->setObservacao($row['OBSERVACAO']);
  $pojo->setData($row['DATA']);
  $pojo->setId_situacao($row['SITUACAO_ID_SITUACAO']);
  $pojo->setId_estagio($row['ESTAGIO_ID_ESTAGIO']); 
  return $pojo;
 }

private function processResults($stmt) {
        $results = array();
 
 
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
				$pojo = new PojoAtendimento(); 
  
				$pojo->setId_atendimento($row['ID_ATENDIMENTO']);
				$pojo->setSolicitacao($row['SOLICITACAO']);
				$pojo->setCanal($row['CANAL']);
				$pojo->setObservacao($row['OBSERVACAO']);
				$pojo->setData($row['DATA']);
				$pojo->setId_situacao($row['SITUACAO_ID_SITUACAO']);
				$pojo->setId_estagio($row['ESTAGIO_ID_ESTAGIO']);
 
    $results[] = $pojo;
		}
 
        return $results;
    }
}?>
