<?php
	require_once "../../dao/daoestagio.php";
    require_once "../../model/pojo_estagio.php";
    
    require_once "../../dao/daoconcedente.php";
    require_once "../../model/pojo_concedente.php";	
    
    require_once "../../dao/daoorientador.php";
    require_once "../../model/pojo_orientador.php";	
    
    require_once "../../dao/daoestagiario.php";
    require_once "../../model/pojo_estagiario.php";
    
    require_once "../../dao/daoinstituicao.php";
    require_once "../../model/pojo_instituicao.php";
    
    require_once "../../dao/daosupervisor.php";
    require_once "../../model/pojo_supervisor.php";
    
    $daoestagio = DaoEstagio::getInstance();
    $alteracao = isset($_GET["id"]);
?>

<html>
    <head>
	<title>Estágios</title>
	<link rel="SHORTCUT ICON" href="../../logo.jpg">
    <link REL="STYLESHEET" TYPE="text/css" HREF="../../css.css">
    <?php include_once "../../scripts.php"; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	 <form id="formulario" method="post" action="">
	 <div align="center" id="texto">
	 <table>
	 	<?php
	 		if ($alteracao){
	 			$id = $_GET["id"];
	 			
	 			$pojo_estagio = $daoestagio->BuscarPorCOD($id);
	 		}
	 	
	 	?>
	 <tr>
	    <td>Protocolo:</td>
	    <td><input required class="integer" type="text" value="<?= $alteracao ? $pojo_estagio->getProtocolo() : '' ?>" name="protocolo" size="30" /></td>
	</tr>
	 <tr>
	    <td>Situação:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagio->getSituacao() : '' ?>" name="situacao" size="30" /></td>
	</tr>
	<tr>
	    <td>Obrigação:</td>
	    <td>
	    	<select required name="obrigacao">
	    		<option <?= ($alteracao && ($pojo_estagio->getObrigacao() == "sim")) ? "selected " : ' ' ?> value="sim">Sim</option>
	    		<option <?= ($alteracao && ($pojo_estagio->getObrigacao() == "não")) ? "selected " : ' ' ?> value="nao">Não</option>
	    	</select>
	    </td>
	</tr>
	<tr>
	    <td>Início:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_estagio->getInicio() : '' ?>" name="inicio" size="30" /></td>
	</tr>
	<tr>
	    <td>Fim:</td>
	    <td><input required class="date" type="text" value="<?= $alteracao ? $pojo_estagio->getFim() : '' ?>" name="fim" size="30" /></td>
	</tr>
	<tr>
	    <td>Horas diárias:</td>
	    <td><input required class="integer" type="text" value="<?= $alteracao ? $pojo_estagio->getHoras_diarias() : '' ?>" name="horas_diarias" size="30" /></td>
	</tr>
	<tr>
	    <td>Horas semanais:</td>
	    <td><input required class="integer" type="text" value="<?= $alteracao ? $pojo_estagio->getHoras_semanais() : '' ?>" name="horas_semanais" size="30" /></td>
	</tr>
	<tr>
	    <td>Auxílio:</td>
	    <td><input required  type="text" value="<?= $alteracao ? $pojo_estagio->getAuxilio() : '' ?>" name="auxilio" size="30" /></td>
	</tr>
	<tr>
	    <td>Área:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagio->getArea() : '' ?>" name="area" size="30" /></td>
	</tr>
	<tr>
	    <td>Turno:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagio->getTurno() : '' ?>" name="turno" size="30" /></td>
	</tr>
	<tr>
	    <td>Alimentação:</td>
	    	<td>
		    	<select required name="alimentacao">
		    		<option <?= ($alteracao && ($pojo_estagio->getAlimentacao() == "sim")) ? "selected " : ' ' ?> value="sim">Sim</option>
		    		<option <?= ($alteracao && ($pojo_estagio->getAlimentacao() == "não")) ? "selected " : ' ' ?> value="nao">Não</option>
		    	</select>
	    	</td>
	</tr>
	<tr>
	    <td>Transporte:</td>
	    	<td>
		    	<select required name="transporte">
		    		<option <?= ($alteracao && ($pojo_estagio->getTransporte() == "sim")) ? "selected " : ' ' ?> value="sim">Sim</option>
		    		<option <?= ($alteracao && ($pojo_estagio->getTransporte() == "não")) ? "selected " : ' ' ?> value="nao">Não</option>
		    	</select>
	    	</td>
	</tr>
	<tr>
	    <td>Remuneração:</td>
	    	<td>
		    	<select required name="remuneracao">
		    		<option <?= ($alteracao && ($pojo_estagio->getRemuneracao() == "sim")) ? "selected " : ' ' ?> value="sim">Sim</option>
		    		<option <?= ($alteracao && ($pojo_estagio->getRemuneracao() == "não")) ? "selected " : ' ' ?> value="nao">Não</option>
		    	</select>
	    	</td>
	</tr>
		<tr>
	    <td>Agente de Integração:</td>
	    <td><input required type="text" value="<?= $alteracao ? $pojo_estagio->getAgente_integracao() : '' ?>" name="agente_integracao" size="30" /></td>
	</tr>
		<tr>
	    <td>Carga total:</td>
	    <td><input required class="integer" type="text" value="<?= $alteracao ? $pojo_estagio->getCarga_total() : '' ?>" name="carga_total" size="30" /></td>
	</tr>
		<tr>
	    <td>Concedente:</td>
		<td>
	    	<select required name="concedente">
	    		<?php
				
				$daoconcedente = DaoConcedente::getInstance();
				$concedentes = $daoconcedente->Seleciona();
				
				foreach ($concedentes as $concedente){
					echo "<option ";
					echo ($alteracao && ($concedente->getId_concedente() == $pojo_estagio->getId_concedente())) ? "selected" : "";
					echo " value='".$concedente->getId_concedente()."'>".$concedente->getNome()."</option>";
				}
				
				?>
	    	</select>
	    </td>
	</tr>
		<tr>
	    <td>Orientador:</td>
	    <td>
	    	<select required name="orientador">
	    		<?php
				
				$daoorientador = DaoOrientador::getInstance();
				$orientadores = $daoorientador->Seleciona();
				
				foreach ($orientadores as $orientador){
					echo "<option ";
					echo ($alteracao && ($orientador->getCpf() == $pojo_estagio->getId_orientador())) ? "selected" : "";
					echo " value='".$orientador->getCpf()."'>".$orientador->getNome()."</option>";
				}
				
			?>
	    	</select>
	    </td>
	</tr>
		<tr>
	    <td>Estagiário:</td>
	    <td>
	    	<select required name="id_estagiario">
	    		<?php
				
				$daoObj= DaoEstagiario::getInstance();
				$objs = $daoObj->Seleciona();
				
				foreach ($objs as $obj){
					echo "<option ";
					echo ($alteracao && ($obj->getCpf_pessoa() == $pojo_estagio->getId_estagiario())) ? "selected" : "";
					echo " value='".$obj->getCpf_pessoa()."'>".$obj->getNome()."</option>";
				}
				
			?>
	    	</select>
	    </td>
	</tr>
		<tr>
	    <td>Instituição de ensino:</td>
	    <td>
	    	<select required name="instituicao">
	    		<?php
				
				$daoObj= DaoInstituicao::getInstance();
				$objs = $daoObj->Seleciona();
				
				foreach ($objs as $obj){
					echo "<option ";
					echo ($alteracao && ($obj->getCnpj() == $pojo_estagio->getInstituicao_de_ensino_CNPJ())) ? "selected" : "";
					echo " value='".$obj->getCnpj()."'>".$obj->getNome_instituicao()."</option>";
				}
				
			?>
	    	</select>
	    </td>
	</tr>
	</tr>
		<tr>
	    <td>Supervisor:</td>
	    <td>
	    	<select required name="supervisor">
	    		<?php
				
				$daoObj= DaoSupervisor::getInstance();
				$objs = $daoObj->Seleciona();
				
				foreach ($objs as $obj){
					echo "<option ";
					echo ($alteracao && ($obj->getCpf() == $pojo_estagio->getId_estagiario())) ? "selected" : "";
					echo " value='".$obj->getCpf()."'>".$obj->getNome()."</option>";
				}
				
			?>
	    	</select>
	    </td>
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
			$pojo_estagio = new PojoEstagio();
		}
    	
    	$protocolo = $_POST["protocolo"];
    	$pojo_estagio->setProtocolo($protocolo);
    	$situacao = $_POST["situacao"];
    	$pojo_estagio->setSituacao($situacao);
    	$obrigacao = $_POST["obrigacao"];
    	$pojo_estagio->setObrigacao($obrigacao);
    	$inicio = $_POST["inicio"];
    	$pojo_estagio->setInicio($inicio);
    	$fim = $_POST["fim"];
    	$pojo_estagio->setFim($fim);
    	$horas_diarias = $_POST["horas_diarias"];
    	$pojo_estagio->setHoras_diarias($horas_diarias);
    	$horas_semanais = $_POST["horas_semanais"];
    	$pojo_estagio->setHoras_semanais($horas_semanais);
    	$auxilio = $_POST["auxilio"];
    	$pojo_estagio->setAuxilio($auxilio);
    	$area = $_POST["area"];
    	$pojo_estagio->setArea($area);
    	$turno = $_POST["turno"];
    	$pojo_estagio->setTurno($turno);
    	$alimentacao = $_POST["alimentacao"];
    	$pojo_estagio->setAlimentacao($alimentacao);
    	$transporte = $_POST["transporte"];
    	$pojo_estagio->setTransporte($transporte);
    	$remuneracao = $_POST["remuneracao"];
    	$pojo_estagio->setRemuneracao($remuneracao);
    	$agente_integracao = $_POST["agente_integracao"];
    	$pojo_estagio->setAgente_integracao($agente_integracao);
    	$carga_total = $_POST["carga_total"];
    	$pojo_estagio->setCarga_total($carga_total);
    	$id_concedente = $_POST["concedente"];
    	$pojo_estagio->setId_concedente($id_concedente);
    	$id_orientador = $_POST["orientador"];
    	$pojo_estagio->setId_orientador($id_orientador);
    	$id_estagiario = $_POST["id_estagiario"];
    	$pojo_estagio->setId_estagiario($id_estagiario);
        $instituicao_de_ensino_CNPJ = $_POST["instituicao"];
    	$pojo_estagio->setInstituicao_de_ensino_CNPJ($instituicao_de_ensino_CNPJ);
        $supervisor = $_POST["supervisor"];
    	$pojo_estagio->setId_supervisor($supervisor);
	
		if ($alteracao){
			if ($daoestagio->Editar($pojo_estagio)){
	        	echo "Alterado com sucesso!!! :)";
	    	}
		} else{
			if ($daoestagio->Inserir($pojo_estagio)){
	        	echo "Inserido com sucesso!!! :)";
	    	}
		}
   
    	
    	echo "<script type='text/javascript'> location.href ='view.php' </script>";
  }


 ?>