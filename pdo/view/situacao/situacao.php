<?php
	require_once "../../dao/daosituacao.php";
    require_once "../../model/pojo_situacao.php";
    
    $daosituacao = DaoSituacao::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Situação dos Estágios</title>
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
	 			
	 			$pojo_situacao = $daosituacao->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 <tr>
	    <td>Descrição:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_situacao->getDescricao() : "" ?>" name="descricao" size="30" /></td>
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
			$pojo_situacao = new PojoSituacao();
		}
    	
    	$descricao = $_POST["descricao"];
    	$pojo_situacao->setDescricao($descricao);
	
		if ($alteracao){
			if ($daosituacao->Editar($pojo_situacao)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daosituacao->Inserir($pojo_situacao)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }

     

 ?>