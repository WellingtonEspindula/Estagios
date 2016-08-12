<?php
    require_once '../../model/pojo_estagio.php';
    require_once '../../dao/daoestagio.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoestagio = DaoEstagio::getInstance();
        $daoestagio->Deletar($id);
        
        header('Location: index.php');
    }

?>