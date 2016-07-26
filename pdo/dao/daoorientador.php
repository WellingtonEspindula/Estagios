<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_orientador.php"; 
class DaoOrientador {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoOrientador();
   return self::$instance; 
 } 
 public function Inserir(PojoOrientador $orientador) { 
  try {
   $sql = 
	"
	INSERT INTO pessoa (
      nome,
      cpf,
      telefone,
      rg,
      expedidor,
      nascimento,
      expedicao,
      endereco,
      cep,
      celular,
      email)
      VALUES (
      :nome,
      :cpf,
	     :telefone,
      :rg,
      :expedidor,
	     :nascimento,
	     :expedicao,
	     :endereco,
	     :cep,
   	  :celular,
	     :email)
	  ";
	
	$sql2 = "INSERT INTO orientador (
	  PESSOA_CPF)
      VALUES (
      :cpf_pessoa
	  ) ";
 $p_sql = Conexao::getInstance()->prepare($sql);
 $p_sql2 = Conexao::getInstance()->prepare($sql2);
 $p_sql->bindValue(":nome", $orientador->getNome());
 $p_sql->bindValue(":cpf", $orientador->getCpf());
 $p_sql->bindValue(":telefone", $orientador->getTelefone());
 $p_sql->bindValue(":rg", $orientador->getRg());
 $p_sql->bindValue(":expedidor",$orientador->getExpedidor());
 $p_sql->bindValue(":nascimento",$orientador->getNascimento());
 $p_sql->bindValue(":expedicao",$orientador->getExpedicao());
 $p_sql->bindValue(":endereco",$orientador->getEndereco());
 $p_sql->bindValue(":cep",$orientador->getCep());
 $p_sql->bindValue(":celular",$orientador->getCelular());
 $p_sql->bindValue(":email",$orientador->getEmail());
 $p_sql2->bindValue(":cpf_pessoa", $orientador->getCpf());
 return $p_sql->execute() && $p_sql2->execute(); 
 } catch (Exception $e) {
  print $e->getMessage(); 
 }
 }
 public function Editar(PojoOrientador $orientador) {
 try { 
  $sql = "UPDATE pessoa SET 
  nome=:nome, 
	 telefone=:telefone, 
  rg=:rg, 
  expedidor=:expedidor, 
	 nascimento=:nascimento, 
	 expedicao=:expedicao, 
	 endereco=:endereco, 
	 cep=:cep, 
	 celular=:celular, 
	 email=:email 
	 WHERE CPF=:cpf ";
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":nome", $orientador->getNome());
   $p_sql->bindValue(":cpf", $orientador->getCpf_pessoa());
   $p_sql->bindValue(":telefone", $orientador->getTelefone());
   $p_sql->bindValue(":rg", $orientador->getRg());
   $p_sql->bindValue(":expedidor",$orientador->getExpedidor());
   $p_sql->bindValue(":nascimento",$orientador->getNascimento());
   $p_sql->bindValue(":expedicao",$orientador->getExpedicao());
   $p_sql->bindValue(":endereco",$orientador->getEndereco());
   $p_sql->bindValue(":cep",$orientador->getCep());
   $p_sql->bindValue(":celular",$orientador->getCelular());
   $p_sql->bindValue(":email",$orientador->getEmail());
   return $p_sql->execute(); 
  } catch (Exception $e) {
   print  $e->getMessage();
 } 
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM orientador WHERE pessoa_cpf = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   return $p_sql->execute(); 
  } catch (Exception $e) { 
   print $e->getMessage(); 
  }
 }
 public function BuscarPorCOD($cod) { 
  try {
   $sql = "SELECT * FROM orientador JOIN pessoa ON orientador.PESSOA_CPF = pessoa.CPF WHERE pessoa_CPF = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaOrientador($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print $e->getMessage(); 
  } 
 }
 private function populaOrientador($row) {
  $pojo= new PojoOrientador; 
  $pojo->setCpf_pessoa($row['pessoa_CPF']); 
  $pojo->setNome($row['NOME']);
  $pojo->setTelefone($row['TELEFONE']);
  $pojo->setRg($row['RG']);
  $pojo->setExpedidor($row['EXPEDIDOR']);
  $pojo->setNascimento($row['NASCIMENTO']);
  $pojo->setExpedicao($row['EXPEDICAO']);
  $pojo->setEndereco($row['ENDERECO']);
  $pojo->setCep($row['CEP']);
  $pojo->setCelular($row['CELULAR']);
  $pojo->setEmail($row['EMAIL']);
  return $pojo; 
 }
 
 
  public function Seleciona() { 
  try {
  
   $sql = "SELECT * FROM orientador
			JOIN pessoa ON orientador.PESSOA_CPF = pessoa.CPF;"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print $e->getMessage(); 
  } 
 }
 
 
    private function processResults($statement) {
        $results = array();
 
        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $pojo= new PojoOrientador(); 
				
				$pojo->setCpf_pessoa($row['pessoa_CPF']);
                $pojo->setNome($row['NOME']);
                $pojo->setCpf($row['pessoa_CPF']);
                $pojo->setTelefone($row['TELEFONE']);
                $pojo->setRg($row['RG']);
                $pojo->setExpedidor($row['EXPEDIDOR']);
                $pojo->setNascimento($row['NASCIMENTO']);
                $pojo->setExpedicao($row['EXPEDICAO']);
                $pojo->setEndereco($row['ENDERECO']);
                $pojo->setCep($row['CEP']);
                $pojo->setCelular($row['CELULAR']);
                $pojo->setEmail($row['EMAIL']);
				
                $results[] = $pojo;
            }
        }
 
        return $results;
    }
 
 
} ?>
