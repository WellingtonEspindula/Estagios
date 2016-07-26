<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_orientador.php';
    require_once '../../dao/daoorientador.php';

    //Pegar a instância do DAO
    $daoorientador = DaoOrientador::getInstance();
    //Selecionar todas os orientadores
    $orientadores = $daoorientador->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orientadores</title>
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
    		location.href = "orientador.php?id="+id;
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
            <th>CPF</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>RG</th>
            <th>Expedidor do RG</th>
            <th>Data de Nascimento</th>
            <th>Data de Expedição do RG</th>
            <th>Endereço</th>
            <th>CEP</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($orientadores as $orientador):
        ?>
        <tr>
            <td><?=$orientador->getCpf_pessoa()?></td>
            <td><?=$orientador->getNome()?></td>
            <td><?=$orientador->getTelefone()?></td>
            <td><?=$orientador->getRg()?></td>
            <td><?=$orientador->getExpedidor()?></td>
            <td><?=$orientador->getNascimento()?></td>
            <td><?=$orientador->getExpedicao()?></td>
            <td><?=$orientador->getEndereco()?></td>
            <td><?=$orientador->getCep()?></td>
            <td><?=$orientador->getCelular()?></td>
            <td><?=$orientador->getEmail()?></td>
            <td>
                <button onclick="alterar(<?=$orientador->getCpf_pessoa()?>)">Editar </button>
				<button onclick="excluir(<?=$orientador->getCpf_pessoa()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="orientador.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>