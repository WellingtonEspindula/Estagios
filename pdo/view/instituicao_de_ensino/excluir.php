<?php
    require_once '../../model/pojo_instituicao.php';
    require_once '../../dao/daoinstituicao.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoinstituicao = DaoInstituicao::getInstance();
        $daoinstituicao->Deletar($id);
        
        header('Location: view.php');
    }

?>