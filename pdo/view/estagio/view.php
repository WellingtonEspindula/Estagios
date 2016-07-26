<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_estagio.php';
    require_once '../../dao/daoestagio.php';
    
    require_once '../../tools.php';

    //Pegar a instância do DAO
    $daoestagio = DaoEstagio::getInstance();
    //Selecionar todas as estagios
    $estagios = $daoestagio->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estágios</title>
    <meta charset="utf-8">
    <link rel="SHORTCUT ICON" href="../../logo.jpg">
    <link REL="STYLESHEET" TYPE="text/css" HREF="../../css.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <script type="text/javascript">
       
    	function alterar(id){
    		location.href = "estagio.php?id="+id;
    	}
    
    	function excluir(id){
    		var asc = confirm("Você tem certeza que deseja excluir esse item?");
    	    if (asc) {
    	       	 location.href = "excluir.php?id="+id;
    	    } else {
    	        alert("Você cancelou a operação!");
    	    }
    	}
    </script>
</head>    
<body>
    <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Código</th>
            <th>Protocolo</th>
            <th>Situação</th>
            <th>Obrigação</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Horas diárias</th>
            <th>Horas Semanais</th>
            <th>Auxílio</th>
            <th>Área</th>
            <th>Turno</th>
            <th>Alimentação</th>
            <th>Transporte</th>
            <th>Remuneração</th>
            <th>Agente Integração</th>
            <th>Carga Total</th>
            <th>Concedente</th>
            <th>Orientador</th></th>
            <th>Estagiário</th>
            <th>Instituição de ensino</th>
            <th>Supervisor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($estagios as $estagio):
        ?>
        <tr>
            <td><?=$estagio->getId_estagio()?></td>
            <td><?=$estagio->getProtocolo()?></td>
            <td><?=$estagio->getSituacao()?></td>
            <td><?=$estagio->getObrigacao()?></td>
            <td><?=$estagio->getInicio()?></td>
            <td><?=$estagio->getFim()?></td>
            <td><?=$estagio->getHoras_diarias()?></td>
            <td><?=$estagio->getHoras_semanais()?></td>
            <td><?=$estagio->getAuxilio()?></td>
            <td><?=$estagio->getArea()?></td>
            <td><?=$estagio->getTurno()?></td>
            <td><?=$estagio->getAlimentacao()?></td>
            <td><?=$estagio->getTransporte()?></td>
            <td><?=$estagio->getRemuneracao()?></td>
            <td><?=$estagio->getAgente_integracao()?></td>
            <td><?=$estagio->getCarga_total()?></td>
            <td><?= getStringConcedente($estagio->getId_concedente()) ?></td>
            <td><?= getStringOrientador($estagio->getId_orientador()) ?></td>
            <td><?= getStringEstagiario($estagio->getId_estagiario()) ?></td>
            <td><?= getStringInstituicao($estagio->getInstituicao_de_ensino_CNPJ()) ?></td>
            <td><?= getStringSupervisor($estagio->getId_supervisor()) ?></td>
            <td>
                <button onclick="alterar(<?=$estagio->getId_estagio()?>)">Editar </button>
				<button onclick="excluir(<?=$estagio->getId_estagio()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="estagio.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>