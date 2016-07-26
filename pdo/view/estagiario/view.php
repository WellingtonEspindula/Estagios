<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_estagiario.php';
    require_once '../../dao/daoestagiario.php';

    //Pegar a instância do DAO
    $daoestagiario = DaoEstagiario::getInstance();
    //Selecionar todas os estagiarios
    $estagiarios = $daoestagiario->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estágiarios</title>
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
    		location.href = "estagiario.php?id="+id;
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
            <th>Curso</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($estagiarios as $estagiario):
        ?>
        <tr>
            <td><?=$estagiario->getCpf_pessoa()?></td>
            <td><?=$estagiario->getNome()?></td>
            <td><?=$estagiario->getTelefone()?></td>
            <td><?=$estagiario->getRg()?></td>
            <td><?=$estagiario->getExpedidor()?></td>
            <td><?=$estagiario->getNascimento()?></td>
            <td><?=$estagiario->getExpedicao()?></td>
            <td><?=$estagiario->getEndereco()?></td>
            <td><?=$estagiario->getCep()?></td>
            <td><?=$estagiario->getCelular()?></td>
            <td><?=$estagiario->getEmail()?></td>
            <td><?=$estagiario->getCurso()?></td>
            <td><?=$estagiario->getTurma()?></td>
            <td>
                <button onclick="alterar(<?=$estagiario->getCpf_pessoa()?>)">Editar </button>
				<button onclick="excluir(<?=$estagiario->getCpf_pessoa()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="estagiario.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>