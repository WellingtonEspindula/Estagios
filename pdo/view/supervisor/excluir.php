<?php
    require_once '../../model/pojo_supervisor.php';
    require_once '../../dao/daosupervisor.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daosupervisor = DaoSupervisor::getInstance();
        $daosupervisor->Deletar($id);
        
        header('Location: view.php');
    }

?>