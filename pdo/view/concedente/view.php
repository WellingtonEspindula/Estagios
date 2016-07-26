<?php
    // Adicionar as classes básicas
    require_once '../../model/pojo_concedente.php';
    require_once '../../dao/daoconcedente.php';

    //Pegar a instância do DAO
    $daoconcedente= DaoConcedente::getInstance();
    //Selecionar todas as concedentes
    $concedentes = $daoconcedente->Seleciona();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Concedentes</title>
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
    		location.href = "concedente.php?id="+id;
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
            <th>Nome</th>
            <th>Razão</th>
            <th>CNPJ</th>
            <th>Endereço</th>
            <th>Ramo</th>
            <th>Cidade</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Representante</th>
            <th>Cargo do Representante</th>
            <th>UF</th>
            <th>RG do Representante</th>
            <th>Emissor do RG do Representante</th>
            <th>CPF do Representante</th>
            <th>Convênio</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($concedentes as $concedente):
        ?>
        <tr>
            <td><?=$concedente->getId_concedente()?></td>
            <td><?=$concedente->getNome()?></td>
            <td><?=$concedente->getRazao()?></td>
            <td><?=$concedente->getCNPJ()?></td>
            <td><?=$concedente->getEndereco()?></td>
            <td><?=$concedente->getRamo()?></td>
            <td><?=$concedente->getCidade()?></td>
            <td><?=$concedente->getEmail()?></td>
            <td><?=$concedente->getTelefone()?></td>
            <td><?=$concedente->getRepresentante()?></td>
            <td><?=$concedente->getCargo_representante()?></td>
            <td><?=$concedente->getUf()?></td>
            <td><?=$concedente->getRg_representante()?></td>
            <td><?=$concedente->getEmissor_rg_representante()?></td>
            <td><?=$concedente->getCpf_representante()?></td>
            <td><?=$concedente->getConvenio()?></td>
            <td>
                <button onclick="alterar(<?=$concedente->getId_concedente()?>)">Editar </button>
				<button onclick="excluir(<?=$concedente->getId_concedente()?>);">Remover</button>
			</td>
		</tr>
        <?php
            endforeach;
        ?>
    </tbody>
    </table>
     <a href="concedente.php" ><input type="button" name="inserir" value="Inserir"></a><br><br>
     <a href="../../index.php" ><input type="button" name="voltar" value="Voltar à página inicial"></a><br><br>
</body>
</html>