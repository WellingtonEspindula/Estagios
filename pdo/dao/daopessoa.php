<?php
require_once  "../../admin/conexao.php";
require_once  "../../admin/geralog.php";
require_once "../../model/pojo_pessoa.php";
class DaoPessoa {
 public static $instance;
 private function __construct() {
  //
 }
 public static function getInstance() {
  if (!isset(self::$instance))
   self::$instance = new DaoPessoa();
   return self::$instance;
 }
 public function Inserir(PojoPessoa $pessoa) {
  try {
   $sql =
	"INSERT INTO pessoa (
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
	  :email)";
 $p_sql = Conexao::getInstance()->prepare($sql);
 $p_sql->bindValue(":nome", $pessoa->getNome());
 $p_sql->bindValue(":cpf", $pessoa->getCpf());
 $p_sql->bindValue(":telefone", $pessoa->getTelefone());
 $p_sql->bindValue(":rg", $pessoa->getRg());
 $p_sql->bindValue(":expedidor",$pessoa->getExpedidor());
 $p_sql->bindValue(":nascimento",$pessoa->getNascimento());
 $p_sql->bindValue(":expedicao",$pessoa->getExpedicao());
 $p_sql->bindValue(":endereco",$pessoa->getEndereco());
 $p_sql->bindValue(":cep",$pessoa->getCep());
 $p_sql->bindValue(":celular",$pessoa->getCelular());
 $p_sql->bindValue(":email",$pessoa->getEmail());
 return $p_sql->execute();
 } catch (Exenderecotion $e) {
  print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
 }
 }
 public function Editar(PojoPessoa $pessoa) {
 try {
  $sql = "UPDATE pessoa set
     nome=:nome,
     cpf=:cpf,
	 telefone=:telefone,
     rg=:rg,
     expedidor=:expedidor,
	 nascimento=:nascimento
	 expedicao=:expedicao
	 endereco=:endereco
	 cep=:cep
	 celular=:celular
	 email=:email";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":nome", $usuario->getNome());
   $p_sql->bindValue(":cpf", $pessoa->getCpf());
   $p_sql->bindValue(":telefone", $pessoa->getTelefone());
   $p_sql->bindValue(":rg", $pessoa->getRg());
   $p_sql->bindValue(":expedidor",$pessoa->getExpedidor());
   $p_sql->bindValue(":nascimento",$pessoa->getNascimento());
   $p_sql->bindValue(":expedicao",$pessoa->getExpedicao());
   $p_sql->bindValue(":endereco",$pessoa->getEndereco());
   $p_sql->bindValue(":cep",$pessoa->getCep());
   $p_sql->bindValue(":celular",$pessoa->getCelular());
   $p_sql->bindValue(":email",$pessoa->getEmail());
   return $p_sql->execute();
  } catch (Exenderecotion $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
 }
 }
 public function Deletar($cod) {
  try {
   $sql ="DELETE FROM pessoa WHERE cpf = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   return $p_sql->execute();
  } catch (Exenderecotion $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
  }
 }
 public function BuscarPorCOD($cod) {
  try {
   $sql = "SELECT * FROM pessoa WHERE cpf = :cod";
   $p_sql = Conexao::getInstance()->prepare($sql);
   $p_sql->bindValue(":cod", $cod);
   $p_sql->execute();
   return $this->populaPessoa($p_sql->fetch(PDO::FETCH_ASSOC));
  } catch (Exenderecotion $e) {
   print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
   GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());
  }
 }
 private function populaPessoa($row) {
  $pojo = new PojoPessoa;
  $pojo->setNome($row['nome']);
  $pojo->setCpf($row['cpf']);
  $pojo->setTelefone($row['telefone']);
  $pojo->setRg($row['rg']);
  $pojo->setExpedidor($row['expedidor']);
  $pojo->setNascimento($row['nascimento']);
  $pojo->setExpedicao($row['expedicao']);
  $pojo->setEndereco($row['endereco']);
  $pojo->setCep($row['cep']);
  $pojo->setCelular($row['celular']);
  $pojo->setEmail($row['email']);
  return $pojo;
 }
} ?>
