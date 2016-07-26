<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_atendimento.php';
    require_once '../../dao/daoatendimento.php';
    require_once "../../tools.php";

    //Pegar a instância do DAO
    $daoatendimento = DaoAtendimento::getInstance();
    //Selecionar todos atendimentos
    $atendimentos = $daoatendimento->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Atendimentos</title>
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
    	function inserir(){
    		location.href = "atendimento.php?";
    	}
        function alterar(id){
    		location.href = "atendimento.php?id="+id;
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
            <th>Solicitação</th>
            <th>Canal</th>
            <th>Observação</th>
            <th>Data</th>
            <th>Situação</th>
            <th>Estágio</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($atendimentos as $atendimento):
        ?>
        <tr>
            <td><?=$atendimento->getId_situacao()?></td>
            <td><?=$atendimento->getSolicitacao()?></td>
            <td><?=$atendimento->getCanal()?></td>
            <td><?=$atendimento->getObservacao()?></td>
            <td><?=$atendimento->getData()?></td>
            <td><?= getStringSituacao($atendimento->getId_situacao()) ?></td>
            <td><?= getStringEstagio($atendimento->getId_estagio()) ?></td>
            <td>
                <button onclick="alterar(<?=$atendimento->getId_atendimento()?>)">Editar </button>
				<button onclick="excluir(<?=$atendimento->getId_atendimento()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
     <a href="atendimento.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
     <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>