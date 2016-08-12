<?php
	require_once "../../dao/daosupervisor.php";
    require_once "../../model/pojo_supervisor.php";
    
    $daosupervisor = DaoSupervisor::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Supervisores</title>
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
	 			
	 			$pojo_supervisor = $daosupervisor->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 	<?php
	 		if (!$alteracao){
	 	?>
	 		<tr>
	    	<td>CPF:</td>
	    	<td><input type="text" class="cpfBR" name="cpf" size="30" /></td>
	    	</tr>
	    <?php } ?>
	 <tr>
	    <td>Nome:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_supervisor->getNome() : "" ?>" name="nome" size="30" /></td>
	</tr>
	<tr>
	    <td>Telefone:</td>
	    <td><input required class="telefone" type="text" value="<?= $alteracao ? $pojo_supervisor->getTelefone() : "" ?>" name="telefone" size="30" /></td>
	</tr>
	<tr>
	    <td>RG:</td>
	    <td><input required class="rg" type="text" value="<?= $alteracao ? $pojo_supervisor->getRg() : "" ?>" name="rg" size="30" /></td>
	</tr>
	<tr>
	    <td>Expedidor do RG:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_supervisor->getExpedidor() : "" ?>" name="expedidor" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Nascimento:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_supervisor->getNascimento() : "" ?>" name="nascimento" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Expedição:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_supervisor->getExpedicao() : "" ?>" name="expedicao" size="30" /></td>
	</tr>
	<tr>
	    <td>Endereço:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_supervisor->getEndereco() : "" ?>" name="endereco" size="30" /></td>
	</tr>
	<tr>
	    <td>CEP:</td>
	    <td><input required class="cep" type="text" value="<?= $alteracao ? $pojo_supervisor->getCep() : "" ?>" name="cep" size="30" /></td>
	</tr>
	<tr>
	    <td>Celular:</td>
	    <td><input required class="telefone" type="text" value="<?= $alteracao ? $pojo_supervisor->getCelular() : "" ?>" name="celular" size="30" /></td>
	</tr>
	<tr>
	    <td>Email</td>
	    <td><input required class="email" type="text" value="<?= $alteracao ? $pojo_supervisor->getEmail() : "" ?>" name="email" size="30" /></td>
	</tr>
	<tr>
	    <td>Cargo:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_supervisor->getCargo() : "" ?>" name="cargo" size="30" /></td>
	</tr>
	<tr>
	    <td>Formação:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_supervisor->getFormacao() : "" ?>" name="formacao" size="30" /></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input name="formulario" type="submit" value="enviar"/></td>
	<a href="index.php" ><input type="button" name="cancelar" value="Cancelar e voltar à página anterior"></a><br><br>
	</div>
	</tr>
	 </table>
	</form>
	<footer>
      <p>Desenvolvido por: Mateus Arenhardt de Souza</p>
      <p>Contato: <a href="mailto:mateus.are@hotmail.com"> mateus.are@hotmail.com</a>.</p>
     </footer>
	</body>
	</html>

<?php

	  if (isset($_POST["formulario"])) {
		if (!$alteracao){
			$pojo_supervisor = new PojoSupervisor();
			$cpf = $_POST["cpf"];
    		$pojo_supervisor->setCpf($cpf);
		}
    	$nome = $_POST["nome"];
    	$pojo_supervisor->setNome($nome);
    	$telefone = $_POST["telefone"];
    	$pojo_supervisor->setTelefone($telefone);
    	$rg = $_POST["rg"];
    	$pojo_supervisor->setRg($rg);
    	$expedidor = $_POST["expedidor"];
    	$pojo_supervisor->setExpedidor($expedidor);
    	$nascimento = $_POST["nascimento"];
    	$pojo_supervisor->setNascimento($nascimento);
    	$expedicao = $_POST["expedicao"];
    	$pojo_supervisor->setExpedicao($expedicao);
    	$endereco = $_POST["endereco"];
    	$pojo_supervisor->setEndereco($endereco);
    	$cep = $_POST["cep"];
    	$pojo_supervisor->setCep($cep);
    	$celular = $_POST["celular"];
    	$pojo_supervisor->setCelular($celular);
    	$email = $_POST["email"];
    	$pojo_supervisor->setEmail($email);
    	$cargo = $_POST["cargo"];
    	$pojo_supervisor->setCargo($cargo);
    	$formacao = $_POST["formacao"];
    	$pojo_supervisor->setFormacao($formacao);
	
		if ($alteracao){
			if ($daosupervisor->Editar($pojo_supervisor)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daosupervisor->Inserir($pojo_supervisor)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }


 ?>