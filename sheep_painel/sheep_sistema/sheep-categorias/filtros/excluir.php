<div class="main-content">

 <!-- INICIO TOKEN URL --->
 <?php include_once('./token.php'); ?>
 <!-- FIM TOKEN URL --->

<?php 
//PROTEÇÃO PARA FORMULÁRIO COM SESSÃO DE LOGIN
require_once('sheep-filtros/valida.php');

$excluir = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if(isset($excluir)){
  
    $salvar = new Departamentos();
    $salvar->excluirDepartamento($excluir);
    if($salvar->getResultado()){
        header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-categorias/index&sucesso=true&token={$_SESSION['timeWT']}");
    }else{
        header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-categorias/index&erro=true&token={$_SESSION['timeWT']}");
    }
}
?>

</div>