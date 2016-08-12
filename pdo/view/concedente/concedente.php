<?php
	require_once "../../dao/daoconcedente.php";
    require_once "../../model/pojo_concedente.php";
    
    $daoconcedente = DaoConcedente::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Concedentes</title>
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
	 			
	 			$pojo_concedente = $daoconcedente->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 <tr>
	    <td>Nome:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getNome() : "" ?>" name="nome" size="30" /></td>
	</tr>
	<tr>
	    <td>Razão:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getRazao() : "" ?>" name="razao" size="30" /></td>
	</tr>
	<tr>
	    <td>CNPJ:</td>
	    <td><input class="cnpj" required type="text" value="<?= $alteracao ? $pojo_concedente->getCnpj() : "" ?>" name="cnpj" size="30" /></td>
	</tr>
	<tr>
	    <td>Endereço:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getEndereco() : "" ?>" name="endereco" size="30" /></td>
	</tr>
	<tr>
	    <td>Ramo:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getRamo() : "" ?>" name="ramo" size="30" /></td>
	</tr>
	<tr>
	    <td>Cidade:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getCidade() : "" ?>" name="cidade" size="30" /></td>
	</tr>
	<tr>
	    <td>Email:</td>
	    <td><input class="email" required type="text" value="<?= $alteracao ? $pojo_concedente->getEmail() : "" ?>" name="email" size="30" /></td>
	</tr>
	<tr>
	    <td>Telefone:</td>
	    <td><input class="telefone" required type="text" value="<?= $alteracao ? $pojo_concedente->getTelefone() : "" ?>" name="telefone" size="30" /></td>
	</tr>
	<tr>
	    <td>Representante:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getRepresentante() : "" ?>" name="representante" size="30" /></td>
	</tr>
	<tr>
	    <td>Cargo do Representante:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getCargo_representante() : "" ?>" name="cargo_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>UF:</td>
	    <td><input class="uf" required type="text" value="<?= $alteracao ? $pojo_concedente->getUf() : "" ?>" name="uf" size="30" /></td>
	</tr>
	<tr>
	    <td>RG do Representante:</td>
	    <td><input class="rg" required type="text" value="<?= $alteracao ? $pojo_concedente->getRg_representante() : "" ?>" name="rg_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>Emissor do RG do Representante:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_concedente->getEmissor_rg_representante() : "" ?>" name="emissor_rg_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>Data de Expedição do RG do Representante:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_concedente->getExpedicao_rg_representante() : "" ?>" name="expedicao_rg_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>CPF do Representante:</td>
	    <td><input class="cpf" required type="text" value="<?= $alteracao ? $pojo_concedente->getCpf_representante() : "" ?>" name="cpf_representante" size="30" /></td>
	</tr>
	<tr>
	    <td>Convênio:</td>
	    <td><input class="integer" required type="text" value="<?= $alteracao ? $pojo_concedente->getConvenio() : "" ?>" name="convenio" size="30" /></td>
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
			$pojo_concedente = new PojoConcedente();
		}
    	
    	$nome = $_POST["nome"];
    	$pojo_concedente->setNome($nome);
    	$razao = $_POST["razao"];
    	$pojo_concedente->setRazao($razao);
    	$cnpj = $_POST["cnpj"];
    	$pojo_concedente->setCnpj($cnpj);
    	$endereco = $_POST["endereco"];
    	$pojo_concedente->setEndereco($endereco);
    	$ramo = $_POST["ramo"];
    	$pojo_concedente->setRamo($ramo);
    	$cidade = $_POST["cidade"];
    	$pojo_concedente->setCidade($cidade);
    	$email = $_POST["email"];
    	$pojo_concedente->setEmail($email);
    	$telefone = $_POST["telefone"];
    	$pojo_concedente->setTelefone($telefone);
    	$representante = $_POST["representante"];
    	$pojo_concedente->setRepresentante($representante);
    	$cargo_representante = $_POST["cargo_representante"];
    	$pojo_concedente->setCargo_representante($cargo_representante);
    	$uf = $_POST["uf"];
    	$pojo_concedente->setUf($uf);
    	$rg_representante = $_POST["rg_representante"];
    	$pojo_concedente->setRg_representante($rg_representante);
    	$emissor_rg_representante = $_POST["emissor_rg_representante"];
    	$pojo_concedente->setEmissor_rg_representante($emissor_rg_representante);
    	$expedicao_rg_representante = $_POST["expedicao_rg_representante"];
    	$pojo_concedente->setExpedicao_rg_representante($expedicao_rg_representante);
    	$cpf_representante = $_POST["cpf_representante"];
    	$pojo_concedente->setCpf_representante($cpf_representante);
	    $convenio = $_POST["convenio"];
    	$pojo_concedente->setConvenio($convenio);
	
		if ($alteracao){
			if ($daoconcedente->Editar($pojo_concedente)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoconcedente->Inserir($pojo_concedente)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }

     

 ?>