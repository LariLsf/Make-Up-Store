
<!-- MAIN CONTENT -->
<div class="main-content">
<!--INICIO MENSAGEN DE RETORNO --->
<?php include_once 'token.php'; ?>
<!--FIM MENSAGEN DE RETORNO --->    

<?php 

// PROTEÇÃO PARA USUARIO LOGADO
require_once('sheep-filtros/valida.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if(isset($id)){

$salvar= new Usuarios();
$salvar->excluirUsuario($id);
if($salvar->getResultado()){
    header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-usuarios/index&sucesso=true&token={$_SESSION['timeWT']}");
} else{
    header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-usuarios/index&erro=true&token={$_SESSION['timeWT']}");    
}   

}

?>

</div>