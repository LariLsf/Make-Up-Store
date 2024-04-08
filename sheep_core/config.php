<?php
/*************************************************************************************
 * ***********************************************************************************
*CONFIGURAÇÕES FRAMEWORK SEEP PHP 
 * ************************************************************************************
*/

 // Determina o padrão de datas
date_default_timezone_set('America/Sao_Paulo');

//configurações do banco de dados
define('SHEEP_URL', 'localhost/make-up-store');//ou dominio
define('SHEEP_HOST','localhost');
define('SHEEP_USER','root');
define('SHEEP_SENHA','');
define('SHEEP_BD','make-up-store-bd');
/**
 * para PostgreSQL 'SHEEP_TIPO_BANCO','pgsql'
 * para SQLite 'SHEEP_TIPO_BANCO','sqlite'
 * para MySQL 'SHEEP_TIPO_BANCO','mysql'
 */
define('SHEEP_TIPO_BANCO','mysql'); // MUITO IMPORTANTE

require_once('includes.php');


?>

