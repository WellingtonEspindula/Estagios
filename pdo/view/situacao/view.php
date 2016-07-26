<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_situacao.php';
    require_once '../../dao/daosituacao.php';

    //Pegar a instância do DAO
    $daosituacao = DaoSituacao::getInstance();
    //Selecionar todas as situaçoes
    $situacoes = $daosituacao->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Situação</title>
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
    		location.href = "situacao.php?id="+id;
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
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($situacoes as $situacao):
        ?>
        <tr>
            <td><?=$situacao->getId_situacao()?></td>
            <td><?=$situacao->getDescricao()?></td>
            <td>
                <button onclick="alterar(<?=$situacao->getId_situacao()?>)">Editar </button>
				<button onclick="excluir(<?=$situacao->getId_situacao()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="situacao.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>