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
	</div>
	</tr>
	 </table>
	</form>
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
   
    	
    	echo "<script type='text/javascript'> location.href ='view.php' </script>";
  }

     

 ?>