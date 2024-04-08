<?php 

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

?>