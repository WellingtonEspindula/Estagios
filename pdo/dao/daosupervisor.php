<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_supervisor.php"; 
class DaoSupervisor {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoSupervisor();
   return self::$instance; 
 } 
 public function Inserir(PojoSupervisor $supervisor) { 
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
   $sql2 = 
	"INSERT INTO supervisor (
      CARGO,
	  FORMACAO,
	  pessoa_CPF)
      VALUES (
      :cargo,
	  :formacao,
	  :cpf_pessoa)";
 $p_sql = Conexao::getInstance()->prepare($sql); 
 $p_sql2 = Conexao::getInstance()->prepare($sql2);
 $p_sql->bindValue(":nome", $supervisor->getNome());
 $p_sql->bindValue(":cpf", $supervisor->getCpf());
 $p_sql->bindValue(":telefone", $supervisor->getTelefone());
 $p_sql->bindValue(":rg", $supervisor->getRg());
 $p_sql->bindValue(":expedidor",$supervisor->getExpedidor());
 $p_sql->bindValue(":nascimento",$supervisor->getNascimento());
 $p_sql->bindValue(":expedicao",$supervisor->getExpedicao());
 $p_sql->bindValue(":endereco",$supervisor->getEndereco());
 $p_sql->bindValue(":cep",$supervisor->getCep());
 $p_sql->bindValue(":celular",$supervisor->getCelular());
 $p_sql->bindValue(":email",$supervisor->getEmail());
 $p_sql2->bindValue(":cargo", $supervisor->getCargo());
 $p_sql2->bindValue(":formacao", $supervisor->getFormacao()); 
 $p_sql2->bindValue(":cpf_pessoa",$supervisor->getCpf());
 return $p_sql->execute() && $p_sql2->execute(); 
 } catch (Exception $e) {
  print $e->getMessage(); 
 }
 }
 public function Editar(PojoSupervisor $supervisor) {
 try { 
  $sql = "UPDATE pessoa set 
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
	    WHERE CPF=:cpf";
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":nome", $supervisor->getNome());
   $p_sql->bindValue(":cpf", $supervisor->getCpf());
   $p_sql->bindValue(":telefone", $supervisor->getTelefone());
   $p_sql->bindValue(":rg", $supervisor->getRg());
   $p_sql->bindValue(":expedidor",$supervisor->getExpedidor());
   $p_sql->bindValue(":nascimento",$supervisor->getNascimento());
   $p_sql->bindValue(":expedicao",$supervisor->getExpedicao());
   $p_sql->bindValue(":endereco",$supervisor->getEndereco());
   $p_sql->bindValue(":cep",$supervisor->getCep());
   $p_sql->bindValue(":celular",$supervisor->getCelular());
   $p_sql->bindValue(":email",$supervisor->getEmail());
	    
  $sql2 = "UPDATE supervisor set 
     cargo=:cargo, 
	    formacao=:formacao 
	    WHERE pessoa_CPF=:cpf ";
   $p_sql2 = Conexao::getInstance()->prepare($sql2); 
   $p_sql2->bindValue(":cargo", $supervisor->getCargo());
   $p_sql2->bindValue(":formacao", $supervisor->getFormacao()); 
   $p_sql2->bindValue(":cpf", $supervisor->getCpf());
   return $p_sql->execute() && $p_sql2->execute(); 
  } catch (Exception $e) {
   print $e->getMessage();
 } 
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM supervisor WHERE pessoa_CPF = :cod"; 
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
   $sql = "SELECT * FROM supervisor s JOIN pessoa p ON s.pessoa_CPF = p.CPF WHERE pessoa_CPF = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaSupervisor($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print $e->getMessage(); 
  } 
 }
 private function populaSupervisor($row) {
  $pojo= new Pojosupervisor; 
  $pojo->setNome($row['NOME']);
  $pojo->setCpf($row['CPF']);
  $pojo->setTelefone($row['TELEFONE']);
  $pojo->setRg($row['RG']);
  $pojo->setExpedidor($row['EXPEDIDOR']);
  $pojo->setNascimento($row['NASCIMENTO']);
  $pojo->setExpedicao($row['EXPEDICAO']);
  $pojo->setEndereco($row['ENDERECO']);
  $pojo->setCep($row['CEP']);
  $pojo->setCelular($row['CELULAR']);
  $pojo->setEmail($row['EMAIL']);
  $pojo->setCargo($row['CARGO']); 
  $pojo->setFormacao($row['FORMACAO']); 
  return $pojo; 
 }
 
 public function Seleciona() { 
  try {
  
   $sql = "SELECT * FROM supervisor
			JOIN pessoa ON supervisor.pessoa_CPF = pessoa.CPF;"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->execute(); 
   return $this->processResults($p_sql); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
 
    private function processResults($statement) {
        $results = array();
 
        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $pojo= new PojoSupervisor(); 
				
				$pojo->setCpf_pessoa($row['pessoa_CPF']);
                $pojo->setNome($row['NOME']);
                $pojo->setCpf($row['CPF']);
                $pojo->setTelefone($row['TELEFONE']);
                $pojo->setRg($row['RG']);
                $pojo->setExpedidor($row['EXPEDIDOR']);
                $pojo->setNascimento($row['NASCIMENTO']);
                $pojo->setExpedicao($row['EXPEDICAO']);
                $pojo->setEndereco($row['ENDERECO']);
                $pojo->setCep($row['CEP']);
                $pojo->setCelular($row['CELULAR']);
                $pojo->setEmail($row['EMAIL']);
				$pojo->setFormacao($row['FORMACAO']);
                $pojo->setCargo($row['CARGO']);
				
                $results[] = $pojo;
            }
        }
 
        return $results;
    }
}	
 ?>
