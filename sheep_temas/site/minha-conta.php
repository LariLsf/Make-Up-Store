<?php require_once('header.php')?>

<!--INICIO MINHA CONTA-->
                
<div class="minha-conta">
                    <div class="container">
                        <div class="linha">                            
                        
                            <div class="col-1">
                               
                                <img src="<?=CAMINHO_TEMAS?>/assets/img/banner-1.png" alt="" width="100%">

                            </div>

                            <div class="col-2">
                                <div class="formulario">

                                    <div class="botao-form">
                                       <span onclick="Entrar()">Entrar</span>
                                       <span onclick="Cadastro()">Cadastro</span>
                                       <hr id="Indicador">                                       
                                    </div>
                                    
                                    <form action="" method="post" id="EntrarPainel">
                                        <input type="email" name="email" id="" placeholder="E-mail de acesso">
                                        <input type="password" name="senha" id="" placeholder="Digite sua senha">
                                        <button type="submit" name="senEntrar" class="botao">Entrar</button>
                                        <a href="" title="">Esqueceu sua senha?</a>
                                    </form>

                                    <form action="" method="post" id="CadastroSite">
                                        <input type="text" name="nome" id="" placeholder="Nome completo">
                                        <input type="email" name="email" id="" placeholder="E-mail de acesso">
                                        <input type="password" name="senha" id="" placeholder="Digite sua senha">
                                        <button type="submit" name="sendCad" class="botao">Cadastre-se</button>
                                    </form>

                                </div>
                           
                            </div>
                       
                        </div>
                   
                    </div>
               
                </div>

                <!--FIM MINHA CONTA-->

<?php require_once('footer.php')?>