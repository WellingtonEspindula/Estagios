<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_supervisor.php';
    require_once '../../dao/daosupervisor.php';

    //Pegar a instância do DAO
    $daosupervisor = DaoSupervisor::getInstance();
    //Selecionar todas os supervisores
    $supervisores = $daosupervisor->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Supervisores</title>
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
    		location.href = "supervisor.php?id="+id;
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
            <th>Cargo</th>
            <th>Formação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($supervisores as $supervisor):
        ?>
        <tr>
            <td><?=$supervisor->getCpf_pessoa()?></td>
            <td><?=$supervisor->getNome()?></td>
            <td><?=$supervisor->getTelefone()?></td>
            <td><?=$supervisor->getRg()?></td>
            <td><?=$supervisor->getExpedidor()?></td>
            <td><?=$supervisor->getNascimento()?></td>
            <td><?=$supervisor->getExpedicao()?></td>
            <td><?=$supervisor->getEndereco()?></td>
            <td><?=$supervisor->getCep()?></td>
            <td><?=$supervisor->getCelular()?></td>
            <td><?=$supervisor->getEmail()?></td>
            <td><?=$supervisor->getCargo()?></td>
            <td><?=$supervisor->getFormacao()?></td>
            <td>
                <button onclick="alterar(<?=$supervisor->getCpf_pessoa()?>)">Editar </button>
				<button onclick="excluir(<?=$supervisor->getCpf_pessoa()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="supervisor.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>