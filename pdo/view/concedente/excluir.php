<?php
    require_once '../../model/pojo_concedente.php';
    require_once '../../dao/daoconcedente.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $daoconcedente = DaoConcedente::getInstance();
        $daoconcedente->Deletar($id);
        
        header('Location: index.php');
    }

?>