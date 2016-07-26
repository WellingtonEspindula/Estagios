<?php
    require_once '../../model/pojo_situacao.php';
    require_once '../../dao/daosituacao.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daosituacao = DaoSituacao::getInstance();
        $daosituacao->Deletar($id);
        
        header('Location: view.php');
    }

?>