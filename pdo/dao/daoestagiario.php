<?php 
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_estagiario.php"; 
require_once "../../model/pojo_pessoa.php"; 
class DaoEstagiario {
 public static $instance;
 private function __construct() {
  // 
 } 
 public static function getInstance() {
  if (!isset(self::$instance)) 
   self::$instance = new DaoEstagiario();
   return self::$instance; 
 } 
 public function Inserir(PojoEstagiario $estagiario) { 
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
	  :email);
	  ";
	
	$sql2 = "INSERT INTO estagiario (
      CURSO,
	  TURMA,
	  PESSOA_CPF)
      VALUES (
      :curso,
	  :turma,
	  :cpf_pessoa
	  )";
	

	  
 $p_sql = Conexao::getInstance()->prepare($sql); 
 
 
 $p_sql->bindValue(":nome", $estagiario->getNome());
 $p_sql->bindValue(":cpf", $estagiario->getCpf());
 $p_sql->bindValue(":telefone", $estagiario->getTelefone());
 $p_sql->bindValue(":rg", $estagiario->getRg());
 $p_sql->bindValue(":expedidor",$estagiario->getExpedidor());
 $p_sql->bindValue(":nascimento",$estagiario->getNascimento());
 $p_sql->bindValue(":expedicao",$estagiario->getExpedicao());
 $p_sql->bindValue(":endereco",$estagiario->getEndereco());
 $p_sql->bindValue(":cep",$estagiario->getCep());
 $p_sql->bindValue(":celular",$estagiario->getCelular());
 $p_sql->bindValue(":email",$estagiario->getEmail());
 
  $p_sql2 = Conexao::getInstance()->prepare($sql2); 
  $p_sql2->bindValue(":curso", $estagiario->getCurso());
  $p_sql2->bindValue(":turma", $estagiario->getTurma()); 
  $p_sql2->bindValue(":cpf_pessoa", $estagiario->getCpf());



 return $p_sql->execute() && $p_sql2->execute(); 

 } catch (Exception $e) {
  print $e->getMessage(); 
 }
 }
 public function Editar(PojoEstagiario $estagiario) {
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
   WHERE CPF=:cpf";
   
   $sql2 = "UPDATE estagiario SET 
   curso=:curso,
	  turma=:turma
   WHERE pessoa_CPF = :cpf";
   
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cpf",$estagiario->getCpf_pessoa());
   $p_sql->bindValue(":nome", $estagiario->getNome());
   $p_sql->bindValue(":telefone", $estagiario->getTelefone());
   $p_sql->bindValue(":rg", $estagiario->getRg());
   $p_sql->bindValue(":expedidor",$estagiario->getExpedidor());
   $p_sql->bindValue(":nascimento",$estagiario->getNascimento());
   $p_sql->bindValue(":expedicao",$estagiario->getExpedicao());
   $p_sql->bindValue(":endereco",$estagiario->getEndereco());
   $p_sql->bindValue(":cep",$estagiario->getCep());
   $p_sql->bindValue(":celular",$estagiario->getCelular());
   $p_sql->bindValue(":email",$estagiario->getEmail());
   
   $p_sql2 = Conexao::getInstance()->prepare($sql2); 
   $p_sql2->bindValue(":cpf",$estagiario->getCpf_pessoa());
   $p_sql2->bindValue(":curso", $estagiario->getCurso());
   $p_sql2->bindValue(":turma", $estagiario->getTurma()); 
   
   return $p_sql->execute() && $p_sql2->execute(); 
   
 
  } catch (Exception $e) {
   echo $e->getMessage();
 } 
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM estagiario WHERE pessoa_CPF = :cod"; 
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
   $sql = "SELECT * FROM estagiario 
   JOIN pessoa ON estagiario.PESSOA_CPF = pessoa.CPF
   WHERE pessoa_CPF = :cod"; 
   $p_sql = Conexao::getInstance()->prepare($sql); 
   $p_sql->bindValue(":cod", $cod); 
   $p_sql->execute(); 
   return $this->populaEstagiario($p_sql->fetch(PDO::FETCH_ASSOC)); 
  } catch (Exception $e) { 
   print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Codigo: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
  } 
 }
 
  public function Seleciona() { 
  try {
  
   $sql = "SELECT * FROM estagiario
			JOIN pessoa ON estagiario.PESSOA_CPF = pessoa.CPF;"; 
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
                $pojo= new PojoEstagiario(); 
				
				$pojo->setCurso($row['CURSO']); 
				$pojo->setTurma($row['TURMA']); 
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
                $results[] = $pojo;
            }
        }
        return $results;
    }
 private function populaEstagiario($row) {
  $pojo= new PojoEstagiario(); 
				
		$pojo->setCurso($row['CURSO']); 
		$pojo->setTurma($row['TURMA']); 
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
} ?>
