<?php
	require_once "../../dao/daoestagiario.php";
    require_once "../../model/pojo_estagiario.php";
	require_once "../../dao/daoconcedente.php";
	require_once "../../model/pojo_concedente.php";
    
    $daoestagiario = DaoEstagiario::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Estagiários</title>
	<link rel="SHORTCUT ICON" href="../../logo.jpg">
	<?php include_once "../../scripts.php"; ?>
    <link REL="STYLESHEET" TYPE="text/css" HREF="../../css.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<header align ="center">
	  <img align="left" src="../../logo.jpg" height="50" width="50">
	  <h2>Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul - <i>Campus</i> Osório</h2>
	  <h2>Sistema de Gerenciamento de Estágios</h2>
    </header>
	 <form id="formulario" method="post" action="">
	 <div align ="center"id="texto">
	 <table>
	 	<?php
	 		if ($alteracao){
	 			$id = $_GET["id"];
	 			
	 			$pojo_estagiario = $daoestagiario->BuscarPorCOD($id);
	 		}
	 	
	 	?>
 	<?php
 		if (!$alteracao){
 	?>
 		<tr>
    	<td>CPF:</td>
    	<td><input class="cpf" required type="text" name="cpf" size="30" /></td>
    	</tr>
    <?php } ?>
	 <tr>
	    <td>Nome:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagiario->getNome() : "" ?>" name="nome" size="30" /></td>
	</tr>
	<tr>
	    <td>Telefone:</td>
	    <td><input class="telefone" required type="text" value="<?= $alteracao ? $pojo_estagiario->getTelefone() : "" ?>" name="telefone" size="30" /></td>
	</tr>
	<tr>
	    <td>RG:</td>
	    <td><input class="rg" required type="text" value="<?= $alteracao ? $pojo_estagiario->getRg() : "" ?>" name="rg" size="30" /></td>
	</tr>
	<tr>
	    <td>Expedidor do RG:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagiario->getExpedidor() : "" ?>" name="expedidor" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Nascimento:</td>
	    <td><input class="date" required type="text" value="<?= $alteracao ? $pojo_estagiario->getNascimento() : "" ?>" name="nascimento" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Expedição:</td>
	    <td><input class="date" required type="text" value="<?= $alteracao ? $pojo_estagiario->getExpedicao() : "" ?>" name="expedicao" size="30" /></td>
	</tr>
	<tr>
	    <td>Endereço:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagiario->getEndereco() : "" ?>" name="endereco" size="30" /></td>
	</tr>
	<tr>
	    <td>CEP:</td>
	    <td><input class="cep" required type="text" value="<?= $alteracao ? $pojo_estagiario->getCep() : "" ?>" name="cep" size="30" /></td>
	</tr>
	<tr>
	    <td>Celular:</td>
	    <td><input class="telefone" required type="text" value="<?= $alteracao ? $pojo_estagiario->getCelular() : "" ?>" name="celular" size="30" /></td>
	</tr>
	<tr>
	    <td>Email</td>
	    <td><input class="email" required type="text" value="<?= $alteracao ? $pojo_estagiario->getEmail() : "" ?>" name="email" size="30" /></td>
	</tr>
	<tr>
	    <td>Curso:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagiario->getCurso() : "" ?>" name="curso" size="30" /></td>
	</tr>
	<tr>
	    <td>Turma:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagiario->getTurma() : "" ?>" name="turma" size="30" /></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input name="formulario" type="submit" value="enviar"/></td>
	<a href="index.php" ><input type="button" name="cancelar" value="Cancelar e voltar à página anterior"></a><br><br>
	</div>
	</tr>
	 </table>
	</form>
	<footer align ="center">
      <p>Desenvolvido por: Mateus Arenhardt de Souza</p>
      <p>Contato: <a href="mailto:mateus.are@hotmail.com"> mateus.are@hotmail.com</a>.</p>
     </footer>
	</body>
	</html>

<?php

	  if (isset($_POST["formulario"])) {
		if (!$alteracao){
			$pojo_estagiario = new PojoEstagiario();
			$cpf = $_POST["cpf"];
    		$pojo_estagiario->setCpf($cpf);
		}
    	
    	$nome = $_POST["nome"];
    	$pojo_estagiario->setNome($nome);
    	$telefone = $_POST["telefone"];
    	$pojo_estagiario->setTelefone($telefone);
    	$rg = $_POST["rg"];
    	$pojo_estagiario->setRg($rg);
    	$expedidor = $_POST["expedidor"];
    	$pojo_estagiario->setExpedidor($expedidor);
    	$nascimento = $_POST["nascimento"];
    	$pojo_estagiario->setNascimento($nascimento);
    	$expedicao = $_POST["expedicao"];
    	$pojo_estagiario->setExpedicao($expedicao);
    	$endereco = $_POST["endereco"];
    	$pojo_estagiario->setEndereco($endereco);
    	$cep = $_POST["cep"];
    	$pojo_estagiario->setCep($cep);
    	$celular = $_POST["celular"];
    	$pojo_estagiario->setCelular($celular);
    	$email = $_POST["email"];
    	$pojo_estagiario->setEmail($email);
    	$curso = $_POST["curso"];
    	$pojo_estagiario->setCurso($curso);
    	$turma = $_POST["turma"];
    	$pojo_estagiario->setTurma($turma);
	
		if ($alteracao){
			if ($daoestagiario->Editar($pojo_estagiario)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoestagiario->Inserir($pojo_estagiario)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }

     

 ?>