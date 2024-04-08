<?php
ob_start();
session_cache_expire(60);
session_start();
require('../sheep_core/config.php');
$sheep = new Ler();

// SAIR DO SISTEMA
$sair = filter_input(INPUT_GET, 'sair', FILTER_VALIDATE_BOOLEAN);
if($sair){
    unset($_SESSION['sheep_user']);
    header("Location: " . URL_CAMINHO_PAINEL . "index.php?sheep_saiu=true");
    exit(); 
}

// SE NÃO EXISTER UMA SESSÃO, ELE DERRUBA
if(!$_SESSION['sheep_user']){
    unset($_SESSION['sheep_user']);
    header("Location: " . URL_CAMINHO_PAINEL . "index.php?sheep_saiu=true");
    exit();
}

// SE O NIVEL FOR DIFERENTE DE 'M', ELE SAI
if($_SESSION['sheep_user']['nivel'] != 'M'){
    unset($_SESSION['sheep_user']);
    header("Location: " . URL_CAMINHO_PAINEL . "index.php?sheep_saiu=true");
    exit();
}

// SE O STATUS FOR DIFERENTE DE 'S'(ATIVO), ELE SAI
if($_SESSION['sheep_user']['status'] != 'S'){
    unset($_SESSION['sheep_user']);
    header("Location: " . URL_CAMINHO_PAINEL . "index.php?sheep_saiu=true");
    exit();
}
   

//PROTEÇÃO PARA O FORMULÁRIO 
$_SESSION['_sheep_firewall'] = (!isset($_SESSION['_sheep_firewall'])) ? hash('sha512', random_int(100, 5000)) : $_SESSION['_sheep_firewall'];

//PROTEÇÃO PARA A URL DO PAINEL DE CONTROLE
$_SESSION['timeWT'] = (!isset($_SESSION['timeWT'])) ?  time() : $_SESSION['timeWT'];

$see_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
$ms = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>