<?php
	require_once "../../dao/daoorientador.php";
    require_once "../../model/pojo_orientador.php";
    
    $daoorientador = DaoOrientador::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Orientadores</title>
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
	 <div align="center" id="texto">
	 <table>
	 	<?php
	 		if ($alteracao){
	 			$id = $_GET["id"];
	 			
	 			$pojo_orientador = $daoorientador->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 	<?php
	 		if (!$alteracao){
	 	?>
	 		<tr>
	    	<td>CPF:</td>
	    	<td><input required type="text" name="cpf" size="30" /></td>
	    	</tr>
	    <?php } ?>
	 <tr>
	    <td>Nome:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_orientador->getNome() : "" ?>" name="nome" size="30" /></td>
	</tr>
	<tr>
	    <td>Telefone:</td>
	    <td><input class="telefone" required type="text" value="<?= $alteracao ? $pojo_orientador->getTelefone() : "" ?>" name="telefone" size="30" /></td>
	</tr>
	<tr>
	    <td>RG:</td>
	    <td><input class="rg" required type="text" value="<?= $alteracao ? $pojo_orientador->getRg() : "" ?>" name="rg" size="30" /></td>
	</tr>
	<tr>
	    <td>Expedidor do RG:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_orientador->getExpedidor() : "" ?>" name="expedidor" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Nascimento:</td>
	    <td><input class="date" required type="text" value="<?= $alteracao ? $pojo_orientador->getNascimento() : "" ?>" name="nascimento" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Expedição:</td>
	    <td><input class="date" required type="text" value="<?= $alteracao ? $pojo_orientador->getExpedicao() : "" ?>" name="expedicao" size="30" /></td>
	</tr>
	<tr>
	    <td>Endereço:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_orientador->getEndereco() : "" ?>" name="endereco" size="30" /></td>
	</tr>
	<tr>
	    <td>CEP:</td>
	    <td><input class="cep" required type="text" value="<?= $alteracao ? $pojo_orientador->getCep() : "" ?>" name="cep" size="30" /></td>
	</tr>
	<tr>
	    <td>Celular:</td>
	    <td><input class="telefone" required type="text" value="<?= $alteracao ? $pojo_orientador->getCelular() : "" ?>" name="celular" size="30" /></td>
	</tr>
	<tr>
	    <td>Email</td>
	    <td><input class="email" required type="text" value="<?= $alteracao ? $pojo_orientador->getEmail() : "" ?>" name="email" size="30" /></td>
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
			$pojo_orientador = new PojoOrientador();
			$cpf = $_POST["cpf"]+"";
    		$pojo_orientador->setCpf($cpf);
		}
    	
    	$nome = $_POST["nome"];
    	$pojo_orientador->setNome($nome);
    	$telefone = $_POST["telefone"];
    	$pojo_orientador->setTelefone($telefone);
    	$rg = $_POST["rg"];
    	$pojo_orientador->setRg($rg);
    	$expedidor = $_POST["expedidor"];
    	$pojo_orientador->setExpedidor($expedidor);
    	$nascimento = $_POST["nascimento"];
    	$pojo_orientador->setNascimento($nascimento);
    	$expedicao = $_POST["expedicao"];
    	$pojo_orientador->setExpedicao($expedicao);
    	$endereco = $_POST["endereco"];
    	$pojo_orientador->setEndereco($endereco);
    	$cep = $_POST["cep"];
    	$pojo_orientador->setCep($cep);
    	$celular = $_POST["celular"];
    	$pojo_orientador->setCelular($celular);
    	$email = $_POST["email"];
    	$pojo_orientador->setEmail($email);
	
		if ($alteracao){
			if ($daoorientador->Editar($pojo_orientador)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoorientador->Inserir($pojo_orientador)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }


 ?>