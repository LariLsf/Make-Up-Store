 <script>
//FAZ A LEITURA DO DOCUMENTO SHEEP PHP 
$(document).ready(function() {
   

<?php 

//Responsável por filtrar o que passa na uri sheep php 
$shee_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
//INSERIDO COM SUCESSO -  SHEEP PHP 
if (strrpos($shee_uri,  'sucesso')){ ?>
        
//Abre o modal sucesso
$('#sucesso').modal('show');

//FECHA SHEEP o modal em 3 segundos
setTimeout(function() {
      $('#sucesso').modal('hide');
    }, 3000); // 3000 = 3 segundos
    
<?php }; ?> 
    
    
    <?php 



//ERRO NO SISTEMA -  SHEEP PHP 
if (strrpos($shee_uri,  'erro')){ ?>	
        
//Abre o modal sucesso
$('#erro').modal('show');

//FECHA SHEEP o modal em 3 segundos
setTimeout(function() {
      $('#erro').modal('hide');
    }, 3000); // 3000 = 3 segundos
    
<?php }; ?>
    
  
    
    <?php 

//VERIFICA SE JA EXISTE O CONTEUDO SHEEP PHP 
if (strrpos($shee_uri,  'erroTemConteudo')){ ?>	
        
//Abre o modal sucesso
$('#erroTemConteudo').modal('show');

//FECHA SHEEP o modal em 3 segundos
setTimeout(function() {
      $('#erroTemConteudo').modal('hide');
    }, 3000); // 3000 = 3 segundos
    
<?php }; ?> 
    
    
    <?php 

//DELETAR -  SHEEP PHP 
if (strrpos($shee_uri,  'delete')){ ?>	
        
//Abre o modal sucesso
$('#delete').modal('show');

//FECHA SHEEP o modal em 3 segundos
setTimeout(function() {
      $('#delete').modal('hide');
    }, 3000); // 3000 = 3 segundos
    
<?php }; ?> 
    
    
    
    <?php 


//VERIFICA SE JA É TENTATIVA DE INVASÃO -  SHEEP PHP
if (strrpos($shee_uri,  'sheep_firewall')){ ?>	
        
//Abre o modal sucesso
$('#sheep_firewall').modal('show');

//FECHA SHEEP o modal em 3 segundos
setTimeout(function() {
      $('#webtec-firewall').modal('hide');
    }, 5000); // 3000 = 3 segundos
    
<?php }; ?> 
    
    <?php 


//VERIFICA E FAZ IMPRESSÃO - SHEEP PHP 
if (strrpos($shee_uri,  'imprimir')){ ?>	
        
//Abre o modal sucesso
window.open();

    
<?php }; ?> 
  
});


</script>