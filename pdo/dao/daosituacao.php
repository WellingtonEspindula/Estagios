<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_situacao.php"; 
class DaoSituacao {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoSituacao();
   return self::$instance; 
 } 
 public function Inserir(PojoSituacao $situacao) { 
  try {
   $sql = 
	"INSERT INTO situacao (
	  id_situacao,
      nome_situacao)
      VALUES (
      :id_situacao,
      :descricao)";
 $p_sql = Conexao::getInstance()->prepare($sql); 
 $p_sql->bindValue(":id_situacao", $situacao->getId_situacao());
 $p_sql->bindValue(":descricao", $situacao->getDescricao());
 return $p_sql->execute(); 
 } catch (Exception $e) {
  print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
  GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
 }
 }
 public function Editar(PojoSituacao $situacao) {
 try {
  $sql = "UPDATE situacao set 
     nome_situacao=:descricao 
     WHERE id_situacao=:id_situacao;";
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":id_situacao", $situacao->getId_situacao());
   $p_sql->bindValue(":descricao", $situacao->getDescricao());
   return $p_sql->execute(); 
  } catch (Exception $e) {
   echo $e->getMessage();
 } 
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM situacao WHERE id_situacao = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   return $p_sql->execute(); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  }
 }
 public function BuscarPorCOD($cod) { 
  try {
   $sql = "SELECT * FROM situacao WHERE id_situacao = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaSituacao($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
 public function Seleciona() { 
  try {
  
  $resultado = array();
   $sql = "SELECT * FROM situacao"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
 private function populaSituacao($row) {
  $pojo = new PojoSituacao; 
  $pojo->setId_situacao($row['ID_SITUACAO']); 
  $pojo->setdescricao($row['NOME_SITUACAO']); 
  return $pojo; 
 }
 
 private function processResults($stmt) {
        $results = array();
 
 
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
				$pojo = new PojoSituacao(); 
  
				$pojo->setId_situacao($row['ID_SITUACAO']);
				$pojo->setDescricao($row['NOME_SITUACAO']); 
 
    $results[] = $pojo;
		}
 
        return $results;
    }
} ?>
