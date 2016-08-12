<?php
	require_once "../../dao/daoestagio.php";
    require_once "../../model/pojo_estagio.php";
    
	require_once "../../dao/daosituacao.php";
    require_once "../../model/pojo_situacao.php";
    
	require_once "../../dao/daoatendimento.php";
    require_once "../../model/pojo_atendimento.php";
    
    require_once "../../tools.php";
    $daoatendimento = DaoAtendimento::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Atendimentos</title>
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
	 			
	 			$pojo_atendimento = $daoatendimento->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 <tr>
	    <td>Solicitação:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_atendimento->getSolicitacao() : "" ?>" name="solicitacao" size="30" /></td>
	</tr>
	<tr>
	    <td>Canal:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_atendimento->getCanal() : "" ?>" name="canal" size="30" /></td>
	</tr>
	<tr>
	    <td>Observação:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_atendimento->getObservacao() : "" ?>" name="observacao" size="30" /></td>
	</tr>
	<tr>
	    <td>Data:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_atendimento->getData() : "" ?>" name="data" size="30" /></td>
	</tr>
	<tr>
	    <td>Situação:</td>
	    <td>
	    	<select name="id_situacao">
	    		<?php
				
				$daoObj= DaoSituacao::getInstance();
				$objs = $daoObj->Seleciona();
				
				foreach ($objs as $obj){
					echo "<option required ";
					echo ($alteracao && ($obj->getId_situacao() == $pojo_atendimento->getId_situacao())) ? "selected" : "";
					echo " value='".$obj->getId_situacao()."'>".$obj->getDescricao()."</option>";
				}
				
			?>
	    	</select>
	    </td>
	</tr>
	<tr>
	    <td>Estágio:</td>
	    <td>
	    	<select name="id_estagio">
	    		<?php
				
				$daoObj= DaoEstagio::getInstance();
				$objs = $daoObj->Seleciona();
				
				foreach ($objs as $obj){
					echo "<option required ";
					echo ($alteracao && ($obj->getId_estagio() == $pojo_atendimento->getId_estagio())) ? "selected" : "";
					echo " value='".$obj->getId_estagio()."'>". getStringEstagio($obj->getId_estagio())."</option>";
				}
				
			?>
	    	</select>
	    </td>
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
			$pojo_atendimento = new PojoAtendimento();
		}
    	
    	$solicitacao = $_POST["solicitacao"];
    	$pojo_atendimento->setSolicitacao($solicitacao);
    	$canal = $_POST["canal"];
    	$pojo_atendimento->setCanal($canal);
    	$observacao = $_POST["observacao"];
    	$pojo_atendimento->setObservacao($observacao);
    	$data = $_POST["data"];
    	$pojo_atendimento->setData($data);
    	$id_situacao = $_POST["id_situacao"];
    	$pojo_atendimento->setId_situacao($id_situacao);
    	$id_estagio = $_POST["id_estagio"];
    	$pojo_atendimento->setId_estagio($id_estagio);
	
		if ($alteracao){
			if ($daoatendimento->Editar($pojo_atendimento)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoatendimento->Inserir($pojo_atendimento)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='index.php' </script>";
  }

    

 ?>