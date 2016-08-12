<?php
	require_once "../../dao/daoinstituicao.php";
    require_once "../../model/pojo_instituicao.php";
    
    $daoinstituicao = DaoInstituicao::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Instituição de ensino</title>
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
	 			
	 			$pojo_instituicao = $daoinstituicao->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 <tr>
	 	<?php
	 		if (!$alteracao){
	 	?>
	    	<td>CNPJ:</td>
	    	<td><input class="cnpj" type="text" name="cnpj" size="30" /></td>
	    	</tr>
	    <?php } ?>
	<tr>
	    <td>Endereço:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_instituicao->getEndereco() : "" ?>" name="endereco" size="30" /></td>
	</tr>
	<tr>
	    <td>Representante Legal:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_instituicao->getRepresentante_legal() : "" ?>" name="representante_legal" size="30" /></td>
	</tr>
	<tr>
	    <td>Cep:</td>
	    <td><input class="cep" required type="text" value="<?= $alteracao ? $pojo_instituicao->getCep() : "" ?>" name="cep" size="30" /></td>
	</tr>
	<tr>
	    <td>Cargo do Representante Legal:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_instituicao->getCargo_representante() : "" ?>" name="cargo_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>Nome da Instituição de Ensino:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_instituicao->getNome_instituicao() : "" ?>" name="nome_instituicao" size="30" /></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input name="formulario" type="submit" value="enviar"/></td>
	<a href="index.php" ><input type="button" name="cancelar" value="Cancelar e voltar à página anterior"></a><br><br>
	</div>
	</tr>
	 </table>
	</form>
	<footer align="center">
      <p>Desenvolvido por: Mateus Arenhardt de Souza</p>
      <p>Contato: <a href="mailto:mateus.are@hotmail.com"> mateus.are@hotmail.com</a>.</p>
     </footer>
	</body>
	</html>

<?php

	  if (isset($_POST["formulario"])) {
		if (!$alteracao){
			$pojo_instituicao = new PojoInstituicao();
			
			$cnpj = $_POST["cnpj"];
    		$pojo_instituicao->setCnpj($cnpj);
		}
    	
    	$endereco = $_POST["endereco"];
    	$pojo_instituicao->setEndereco($endereco);
    	$representante_legal = $_POST["representante_legal"];
    	$pojo_instituicao->setRepresentante_legal($representante_legal);
    	$cep = $_POST["cep"];
    	$pojo_instituicao->setCep($cep);
    	$cargo_representante = $_POST["cargo_representante"];
    	$pojo_instituicao->setCargo_representante($cargo_representante);
    	$nome_instituicao = $_POST["nome_instituicao"];
    	$pojo_instituicao->setNome_instituicao($nome_instituicao);
	
		if ($alteracao){
			if ($daoinstituicao->Editar($pojo_instituicao)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoinstituicao->Inserir($pojo_instituicao)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }

    

 ?>