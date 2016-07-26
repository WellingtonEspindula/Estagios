<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_instituicao.php"; 

class DaoInstituicao {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoInstituicao();
   return self::$instance; 
 } 
 public function Inserir(PojoInstituicao $instituicao) { 
  try {
   $sql = 
	"INSERT INTO instituicao_de_ensino (
	     nome_instituicao,
      cnpj,
      endereco,
   	  representante_legal,
      cep, 
      cargo_representante)
      VALUES (
      :nome_instituicao,
      :cnpj,
      :endereco,
	     :representante_legal,
	     :cep,
      :cargo_representante)";
 $p_sql = Conexao::getInstance()->prepare($sql); 
 $p_sql->bindValue(":nome_instituicao", $instituicao->getNome_instituicao());
 $p_sql->bindValue(":cnpj", $instituicao->getCnpj());
 $p_sql->bindValue(":endereco", $instituicao->getEndereco());
 $p_sql->bindValue(":cep", $instituicao->getCep()); 
 $p_sql->bindValue(":representante_legal", $instituicao->getRepresentante_legal()); 
 $p_sql->bindValue(":cargo_representante",$instituicao->getCargo_representante());
 return $p_sql->execute(); 
 } catch (Exception $e) {
  echo $e->getMessage();
 }
 }
 
 public function Seleciona(){
  try {
  
  $resultado = array();
   $sql = "SELECT * FROM instituicao_de_ensino"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  }
 }
 
 private function processResults($stmt) {
   $results = array();
 
		 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		 foreach ($rows as $row) {
				$pojo = new PojoInstituicao(); 
  
				$pojo->setNome_instituicao($row['NOME_INSTITUICAO']);
				$pojo->setEndereco($row['ENDERECO']); 
				$pojo->setRepresentante_legal($row['REPRESENTANTE_LEGAL']); 
				$pojo->setCep($row['CEP']); 
				$pojo->setCnpj($row['CNPJ']); 
				$pojo->setCargo_representante($row['CARGO_REPRESENTANTE']); 
 
    $results[] = $pojo;
		}
 
     return $results;
  }
 
  public function Editar(PojoInstituicao $instituicao) {
  try { 
   $sql = "UPDATE instituicao_de_ensino SET 
      endereco=:endereco, 
	     representante_legal=:representante_legal, 
	     cep=:cep, 
      cargo_representante=:cargo_representante, 
      nome_instituicao=:nome_instituicao 
      WHERE cnpj=:cnpj";
    $p_sql = Conexao::getInstance()->prepare($sql); 
    $p_sql->bindValue(":cnpj", $instituicao->getCnpj());
    $p_sql->bindValue(":endereco", $instituicao->getEndereco());
    $p_sql->bindValue(":representante_legal", $instituicao->getRepresentante_legal()); 
    $p_sql->bindValue(":cep", $instituicao->getCep()); 
    $p_sql->bindValue(":cargo_representante",$instituicao->getCargo_representante()); 
    $p_sql->bindValue(":nome_instituicao", $instituicao->getNome_instituicao());
    return $p_sql->execute(); 
   } catch (Exception $e) {
     echo $e->getMessage();
  } 
  }
  public function Deletar($cod) {
   try {
    $sql ="DELETE FROM instituicao_de_ensino WHERE CNPJ = :cod"; 
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
   $sql = "SELECT * FROM instituicao_de_ensino WHERE CNPJ = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaInstituicao($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 private function populaInstituicao($row) {
  $pojo = new PojoInstituicao; 
  $pojo->setCnpj($row['CNPJ']); 
  $pojo->setEndereco($row['ENDERECO']); 
  $pojo->setRepresentante_legal($row['REPRESENTANTE_LEGAL']);
  $pojo->setCep($row['CEP']);
  $pojo->setCargo_representante($row['CARGO_REPRESENTANTE']);
  $pojo->setNome_instituicao($row['NOME_INSTITUICAO']); 
  return $pojo; 
 }
} ?>
