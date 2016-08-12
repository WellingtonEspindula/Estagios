<?php
    require_once '../../model/pojo_orientador.php';
    require_once '../../dao/daoorientador.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoorientador = DaoOrientador::getInstance();
        $daoorientador->Deletar($id);
        
        header('Location: index.php');
    }

?>