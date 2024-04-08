<?php

/*** CAMADA PRINCIPAL ***/
session_start();
ob_start();
require('./sheep_core/config.php');


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make-up</title>
    <link rel="stylesheet" href="<?=CAMINHO_TEMAS?>/assets/css/style.css">

 <?php
        //Inicia a leitura geral
        $sheep = new Ler();

        $Link = new Link;
        $Link->getTags();

       
        
?>
   
</head>
<body>



<?php

if(!require_once($Link->getPatch())):
   echo 'Erro ao incluir arquivo de navegação!';
endif;
?>

    
 <!-- Plugins JS File -->
   
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="<?=CAMINHO_TEMAS?>/assets/js/login.js"></script>

   </body>

   </html>
<?php
ob_end_flush();
?>