<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_instituicao.php';
    require_once '../../dao/daoinstituicao.php';

    //Pegar a instância do DAO
    $daoinstituicao = DaoInstituicao::getInstance();
    //Selecionar todas as instituicoes
    $instituicoes = $daoinstituicao->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Instituição de ensino</title>
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
    		location.href = "instituicao_de_ensino.php?id="+id;
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
            <th>CNPJ</th>
            <th>Endereço</th>
            <th>Representante Legal</th>
            <th>CEP</th>
            <th>Cargo do Representante Legal</th>
            <th>Nome da Instituição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($instituicoes as $instituicao):
        ?>
        <tr>
            <td><?=$instituicao->getCnpj()?></td>
            <td><?=$instituicao->getEndereco()?></td>
            <td><?=$instituicao->getRepresentante_legal()?></td>
            <td><?=$instituicao->getCep()?></td>
            <td><?=$instituicao->getCargo_representante()?></td>
            <td><?=$instituicao->getNome_instituicao()?></td>
            <td>
                <button onclick="alterar(<?=$instituicao->getCnpj()?>)">Editar </button>
				<button onclick="excluir(<?=$instituicao->getCnpj()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
    <a href="instituicao_de_ensino.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
    <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>