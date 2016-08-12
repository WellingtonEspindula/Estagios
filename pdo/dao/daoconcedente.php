<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_concedente.php"; 
class DaoConcedente {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoConcedente();
   return self::$instance; 
 } 
 public function Inserir(PojoConcedente $concedente) { 
  try {
   $sql = 
	"INSERT INTO concedente (
	  id_concedente,
      nome, 
      razao,
      cnpj, 
      endereco,
      ramo, 
      cidade, 
      email,
      telefone,
      representante, 
      cargo_representante,
      uf,
      rg_representante, 
      emissor_rg_representante,
      expedicao_rg_representante,
      cpf_representante,
	  convenio)
      VALUES (
	  :id_concedente,
      :nome,
      :razao,
	  :cnpj,
      :endereco,
      :ramo,
	  :cidade,
	  :email,
	  :telefone,
	  :representante,
	  :cargo_representante,
	  :uf,
	  :rg_representante,
	  :emissor_rg_representante,
	  :expedicao_rg_representante,
	  :cpf_representante,
	  :convenio)";
	  	
 $p_sql = Conexao::getInstance()->prepare($sql); 
 $p_sql->bindValue(":id_concedente", $concedente->getId_concedente());
 $p_sql->bindValue(":nome", $concedente->getNome());
 $p_sql->bindValue(":razao", $concedente->getRazao());
 $p_sql->bindValue(":cnpj", $concedente->getCnpj()); 
 $p_sql->bindValue(":endereco", $concedente->getEndereco()); 
 $p_sql->bindValue(":ramo",$concedente->getRamo());
 $p_sql->bindValue(":cidade",$concedente->getCidade());
 $p_sql->bindValue(":email",$concedente->getEmail());
 $p_sql->bindValue(":telefone",$concedente->getTelefone());
 $p_sql->bindValue(":representante",$concedente->getRepresentante());
 $p_sql->bindValue(":cargo_representante",$concedente->getCargo_representante());
 $p_sql->bindValue(":uf",$concedente->getuf());
 $p_sql->bindValue(":rg_representante",$concedente->getRg_representante());
 $p_sql->bindValue(":emissor_rg_representante",$concedente->getEmissor_rg_representante());
 $p_sql->bindValue(":expedicao_rg_representante",$concedente->getExpedicao_rg_representante());
 $p_sql->bindValue(":cpf_representante",$concedente->getCpf_representante());
 $p_sql->bindValue(":convenio",$concedente->getConvenio());
 
 return $p_sql->execute(); 
 } catch (Exception $e) {
  print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
 }
 }
 public function Editar(PojoConcedente $concedente) {
 try { 
  $sql = "UPDATE concedente set 
     nome=:nome,
     razao=:razao,
	    cnpj=:cnpj,
     endereco=:endereco,
     ramo=:ramo,
	    cidade=:cidade,
	    email=:email,
	    telefone=:telefone,
   	 representante=:representante,
	    cargo_representante=:cargo_representante,
	    uf=:uf,
	    rg_representante=:rg_representante,
	    emissor_rg_representante=:emissor_rg_representante,
	    expedicao_rg_representante=:expedicao_rg_representante,
	    cpf_representante=:cpf_representante,
     convenio  = :convenio 
     WHERE id_concedente = :id_concedente";
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":nome", $concedente->getNome()); 
   $p_sql->bindValue(":razao", $concedente->getRazao());
   $p_sql->bindValue(":cnpj", $concedente->getCnpj()); 
   $p_sql->bindValue(":endereco", $concedente->getEndereco()); 
   $p_sql->bindValue(":ramo",$concedente->getRamo());
   $p_sql->bindValue(":cidade",$concedente->getCidade());
   $p_sql->bindValue(":email",$concedente->getEmail());
   $p_sql->bindValue(":telefone",$concedente->getTelefone());
   $p_sql->bindValue(":representante",$concedente->getRepresentante());
   $p_sql->bindValue(":cargo_representante",$concedente->getCargo_representante());
   $p_sql->bindValue(":uf",$concedente->getUf());
   $p_sql->bindValue(":rg_representante",$concedente->getRg_representante());
   $p_sql->bindValue(":emissor_rg_representante",$concedente->getEmissor_rg_representante());
   $p_sql->bindValue(":expedicao_rg_representante",$concedente->getExpedicao_rg_representante());
   $p_sql->bindValue(":cpf_representante",$concedente->getCpf_representante());
   $p_sql->bindValue(":id_concedente",$concedente->getId_concedente()); 
   $p_sql->bindValue(":convenio",$concedente->getConvenio()); 
   return $p_sql->execute(); 
  } catch (Exception $e) {
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
 } 
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM concedente WHERE ID_CONCEDENTE = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   return $p_sql->execute(); 
  } catch (Exception $e) { 
   print  $e->getMessage(); 
  }
 }
 public function BuscarPorCOD($cod) { 
  try {
   $sql = "SELECT * FROM concedente WHERE id_concedente = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaConcedente($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 private function populaConcedente($row) {
  $pojo = new PojoConcedente;
  $pojo->setNome($row['NOME']);   
  $pojo->setRazao($row['RAZAO']); 
  $pojo->setCnpj($row['CNPJ']); 
  $pojo->setEndereco($row['ENDERECO']); 
  $pojo->setRamo($row['RAMO']); 
  $pojo->setCidade($row['CIDADE']);
  $pojo->setEmail($row['EMAIL']); 
  $pojo->setTelefone($row['TELEFONE']); 
  $pojo->setRepresentante($row['REPRESENTANTE']); 
  $pojo->setCargo_representante($row['CARGO_REPRESENTANTE']); 
  $pojo->setUf($row['UF']); 
  $pojo->setRg_representante($row['RG_REPRESENTANTE']); 
  $pojo->setEmissor_rg_representante($row['EMISSOR_RG_REPRESENTANTE']);
  $pojo->setExpedicao_rg_representante($row['EXPEDICAO_RG_REPRESENTANTE']); 
  $pojo->setCpf_representante($row['CPF_REPRESENTANTE']); 
  $pojo->setId_concedente($row['ID_CONCEDENTE']); 
  $pojo->setConvenio($row['CONVENIO']); 
  return $pojo; 
 }
 private function processResults($stmt) {
        $results = array();
 
 
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
				$pojo = new PojoConcedente; 
  
				$pojo->setId_concedente($row['ID_CONCEDENTE']);
				$pojo->setNome($row['NOME']); 
				$pojo->setRazao($row['RAZAO']); 
				$pojo->setCnpj($row['CNPJ']); 
				$pojo->setEndereco($row['ENDERECO']); 
				$pojo->setRamo($row['RAMO']); 
				$pojo->setCidade($row['CIDADE']);
				$pojo->setEmail($row['EMAIL']); 
				$pojo->setTelefone($row['TELEFONE']); 
				$pojo->setRepresentante($row['REPRESENTANTE']); 
				$pojo->setCargo_representante($row['CARGO_REPRESENTANTE']); 
				$pojo->setUf($row['UF']); 
				$pojo->setRg_representante($row['RG_REPRESENTANTE']); 
				$pojo->setEmissor_rg_representante($row['EMISSOR_RG_REPRESENTANTE']); 
				$pojo->setExpedicao_rg_representante($row['EXPEDICAO_RG_REPRESENTANTE']); 
				$pojo->setCpf_representante($row['CPF_REPRESENTANTE']); 
				$pojo->setConvenio($row['CONVENIO']); 
 
                $results[] = $pojo;
		}
 
        return $results;
    }
 public function Seleciona() { 
  try {
  
  $resultado = array();
   $sql = "SELECT * FROM concedente"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
 
} ?>
