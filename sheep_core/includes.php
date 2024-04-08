<?php
/*************************************************************************************
*CONFIGURAÇÕES FRAMEWORK SEEP PHP 
 * ************************************************************************************
*/

//PASTA GERAL DE IMAGENS E ARQUIVOS CAMINHO DO PAINEL A MODELOS######################
define('SHEEP_IMG', './sheep-imagens/');
//CAMINHO PASTA IMAGEM PARA TEMAS 
define('SHEEP_IMG_URL', '/sheep_painel/sheep-imagens/');

//PASTA GERAL DE USUÁRIOS
define('SHEEP_IMG_USUARIOS', '../fotos-usuarios/');

define('SHEEP_IMG_LOGO', '../../../sheep_temas/sheep-imagens-logo/');

//IMAGENS PARA O LAYUT EXTERNO GERAL DE IMAGENS E ARQUIVOS CAMINHO DO PAINEL A MODELOS######################
define('SHEEP_IMG_PAINEL', './sheep_temas/sheep-imagens/');

//PASTA GERAL DE vídeos CAMINHO DO PAINEL A MODELOS######################
define('SHEEP_AUDIO', '../../../sheep_temas/sheep-midias/');

//AQUI IREI ADICIONAR VERSÃO E MODELO######################
define('SHEEP_VERSAO','Versão: [ 3.0.0 ] - <b>Atualizado dia: 13/11/2023</b>');

//AQUI TEXTO DA VERSÃO VERSÃO E MODELO######################
define('sheep','<center><h2>Atenção!</h2></center><br>'
        . 'Este código de fonte é registrado e todos os direitos são reservados a empresa:<br> '
        . '<b>Maykon Silveira</b><br>'
        . '<p>Framework maykonsilveira.com.br e o código de fonte são patenteados. </p>');

/**********************************************************************
 * ********************************************************************
 * AUTO LOAD DO SITE 
 * ********************************************************************
 * ********************************************************************
*/
function sheep_classes($sheepClasses) {

    $sheepDiretorio = ['diretor', 'funcionarios',  'gerentes_operacionais', 'gerentes'];
    $sheepFiscaliza = null;

    foreach ($sheepDiretorio as $sheepNomeDiretorio):
        if (!$sheepFiscaliza && file_exists(__DIR__ . '/' ."{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php") && !is_dir(__DIR__  . '/' . "{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php")):
            include_once (__DIR__  . '/' . "{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php");
            $sheepFiscaliza = true;
        endif;
    endforeach;

    if (!$sheepFiscaliza):
        echo "Não foi possível incluir {$sheepClasses}.php";
        exit();
    endif;
}

spl_autoload_register("sheep_classes");




/**********************************************************************
 * ********************************************************************
 * DADOS DO SITE 
 * ********************************************************************
*/

 

 define('SITENAME', 'NOME DO SITE');
 define('SITEDESC', 'SITE MAYKONSILVEIRA.COM.BR');
 define('FONE', '');
 define('CNPJ', '');
 define('CELULAR', '');
 define('EMAIL', '');
 define('ENDERECO', '');
 define('NUMERO', '');
 define('CEP', '');
 define('CIDADE', '');
 define('ESTADO', '');
 define('CORREIOS_TOKEN', '123');
 
 
 
 
 
/**********************************************************************
 * ********************************************************************
 * PHPMAILER E SEND GRIND 
 * ********************************************************************
*/



define('EMAIL_PHPMAILER_SECURE', 'tls');
define('EMAIL_PHPMAILER_CHARSET', 'utf-8');
define('EMAIL_PHPMAILER_HOST', '');
define('EMAIL_PHPMAILER_USERNAME', '');
define('EMAIL_PHPMAILER_PASS', '');
define('EMAIL_PHPMAILER_PORT', '');
define('EMAIL_PHPMAILER_QUEM_ENVIA', EMAIL);
define('EMAIL_PHPMAILER_QUEM_ENVIA_NOME', SITENAME);
define('GOOGLE_TITULO', 'titulo do google');
define('GOOGLE_DESC', 'Descrição do google');
define('GOOGLE_TAGS', 'Descrição do google aqui');
define('RODAPE', 'Corporation dsdsd');
define('GOOGLE_VERIFY', 'verificador do google');



// Verifica se e http ou https ###############
if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
    //if( isset(filter_input(INPUT_SERVER, 'HTTPS', FILTER_SANITIZE_STRIPPED)) && filter_input(INPUT_SERVER, 'HTTPS', FILTER_SANITIZE_STRIPPED) == 'on' ) {
         $https = 'https://';
        
    }else{
         $https = 'http://';
    }
    
    // DEFINE A URL DO SITE ######
    define('HOME', $https. SHEEP_URL); 	
    define('PASTA_DO_PAINEL', '/sheep_painel/'); 	
    define('PASTA_DO_PAINEL_CLIENTE', '/cliente/'); 	
    define('URL_CAMINHO_PAINEL', HOME.'/'.PASTA_DO_PAINEL); 	
    define('URL_CAMINHO_PAINEL_CLIENTE', HOME.'/'.PASTA_DO_PAINEL_CLIENTE); 	
    define('SHEEP_LAYOUT', 'site');

    //LOGO DO SITE PARA TEMAS 
    define('SITELOGO', HOME . SHEEP_IMG_URL);
    define('FAVICON', HOME . SHEEP_IMG_URL);
    
    
    // PASTA DO MODELO E CHAMADAS 
    //INCLUDE_PATCH = CAMINHO_TEMAS;
    //REQUIRE_PATH = SOLICITAR_TEMAS;
    define('CAMINHO_TEMAS', HOME . '/' . 'sheep_temas' . '/' . SHEEP_LAYOUT);
    define('SOLICITAR_TEMAS', 'sheep_temas' . '/' . SHEEP_LAYOUT);
    define('MODELO', 'sheep_temas' . '/' . SHEEP_LAYOUT);
    

//CONTROLE DE URLS SHEEP PHP 
define('FILTROS','sheep.php?m=');

//ICONE DO SITE SHEEP PHP
define('SHEEP_ICONE', 'assets/img/logo/icone.png');

// LOGO DO PAINEL SHEEP PHP 
define('SHEEP_LOGO', 'assets/img/logo/LOGO-SHEEP-PHP-MAYKON-SILVEIRA2.png');

// TITULO PAINEL SHEEP PHP 
define('SHEEP_TITULO_PAINEL', 'Painel de Controle Sheep PHP - MaykonSilveira.com.br');

// RODAPE TEXTO PAINEL SHEEP PHP 
define('SHEEP_RODAPE_PAINEL', '<a href="https://maykonsilveira.com.br/" title="EAD MaykonSilveira.com.br">Todos os Direitos Reservados a EAD MaykonSilveira.com.br SHEEP PHP</a>');



/**
 * AQUI VERIFICA SE O IP TEM LINCEÇA PARA USAR ESTE SISTEMA 
 *  
*/  

?>