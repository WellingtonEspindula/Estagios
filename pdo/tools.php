  <?php
  require_once "dao/daoestagio.php";
  require_once "model/pojo_estagio.php";
  
  require_once "dao/daoestagiario.php";
  require_once "model/pojo_estagiario.php";  
  
  require_once "dao/daosituacao.php";
  require_once "model/pojo_situacao.php";
  
  require_once "dao/daoorientador.php";
  require_once "model/pojo_orientador.php";
  
  require_once "dao/daosupervisor.php";
  require_once "model/pojo_supervisor.php";
  
  
  require_once "dao/daoinstituicao.php";
  require_once "model/pojo_instituicao.php";
  
  require_once "dao/daoconcedente.php";
  require_once "model/pojo_concedente.php";
  
  
  function getStringEstagiario($id)
  {
    $daoObj = DaoEstagiario::getInstance();
    return $daoObj->BuscarPorCOD($id)->getNome();
  }  
  
  function getStringOrientador($id)
  {
    $daoObj = DaoOrientador::getInstance();
    return $daoObj->BuscarPorCOD($id)->getNome();
  }
  
  function getStringSupervisor($id)
  {
    $daoObj = DaoSupervisor::getInstance();
    return $daoObj->BuscarPorCOD($id)->getNome();
  }
  function getStringSituacao($id)
  {
    $daoObj = DaoSituacao::getInstance();
    return $daoObj->BuscarPorCOD($id)->getDescricao();
  }
  
  function getStringInstituicao($id)
  {
    $daoObj = DaoInstituicao::getInstance();
    return $daoObj->BuscarPorCOD($id)->getNome_instituicao();
  }  
  
  function getStringConcedente($id)
  {
    $daoObj = DaoConcedente::getInstance();
    return $daoObj->BuscarPorCOD($id)->getNome();
  }
  
  function getStringEstagio($id){
    $daoObj = DaoEstagio::getInstance();
    return getStringEstagiario($daoObj->BuscarPorCOD($id)->getId_estagiario());
    
  }  

?>