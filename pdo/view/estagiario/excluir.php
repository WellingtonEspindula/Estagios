<?php
    require_once '../../model/pojo_estagiario.php';
    require_once '../../dao/daoestagiario.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoestagiario = DaoEstagiario::getInstance();
        $daoestagiario->Deletar($id);
        
        header('Location: index.php');
    }

?>