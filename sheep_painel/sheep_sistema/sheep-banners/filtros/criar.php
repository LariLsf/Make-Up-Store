<div class="main-content">

 <!-- INICIO TOKEN URL --->
 <?php include_once('./token.php'); ?>
 <!-- FIM TOKEN URL --->

<?php 
//PROTEÇÃO PARA FORMULÁRIO COM SESSÃO DE LOGIN
require_once('sheep-filtros/valida.php');
$criar = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
if(isset($criar['sendSheep'])){
    unset($criar['sendSheep']);
    
$criar['capa'] = $_FILES['capa']['tmp_name'] ? $_FILES['capa'] : null;

if($criar['sheep_firewall'] !=  $_SESSION['_sheep_firewall']){
header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-banners/index&erro=true&token={$_SESSION['timeWT']}");
exit();
}

$salvar = new Banners();
$salvar->criarBanner($criar);
if($salvar->getResultado()){
    $_SESSION['_sheep_firewall'] = hash('sha512', random_int(100, 5000));
    header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-banners/index&sucesso=true&token={$_SESSION['timeWT']}");
}else{
    header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "sheep-banners/index&erro=true&token={$_SESSION['timeWT']}");
}

}

?>

</div>