<?php
    require_once '../../model/pojo_atendimento.php';
    require_once '../../dao/daoatendimento.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoatendimento = DaoAtendimento::getInstance();
        $daoatendimento->Deletar($id);
        
        header('Location: view.php');
    }

?>