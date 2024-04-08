<?php require_once('header.php')?>

<!--INICIO CARRINHO DE COMPRAS-->
<div class="corpo-categorias carrinho-compras">
                        <!--INICIO TABELA CARRINHO-->
                         <table>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>                                                      

                <!--INICIO ITEM TABELA DO CARRINHO-->            
                            <tr>
                                <td>
                                    <div class="info-carrinho">
                                        <img src="<?=CAMINHO_TEMAS?>/assets/img/labios/batomchanel-1.jpg" alt="">

                                        <div>
                                            <p>Batom Chanel Red</p>
                                            <small>Valor: R$ 349,90</small>
                                            <br>
                                            <a href="" title="">Remover</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="number" name="" id="" value="1">
                                    </form>
                                </td>
                                <td>R$: 349,90</td>
                            </tr>
                <!--FIM ITEM TABELA DO CARRINHO-->         
 
                <!--INICIO ITEM TABELA DO CARRINHO-->            
                 <tr>
                    <td>
                        <div class="info-carrinho">
                            <img src="<?=CAMINHO_TEMAS?>/assets/img/rosto/basechanel-1.jpg" alt="">

                            <div>
                                <p>Base Chanel</p>
                                <small>Valor: R$ 499,90</small>
                                <br>
                                <a href="" title="">Remover</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="number" name="" id="" value="1">
                        </form>
                    </td>
                    <td>R$: 499,90</td>
                </tr>
                <!--FIM ITEM TABELA DO CARRINHO-->                  
  
                 <!--INICIO ITEM TABELA DO CARRINHO-->            
                    <tr>
                        <td>
                            <div class="info-carrinho">
                                <img src="<?=CAMINHO_TEMAS?>/assets/img/olhos/delineadorguerlain-1.jpg" alt="">

                                <div>
                                    <p>Delineador Guerlain Black</p>
                                    <small>Valor: R$ 299,90</small>
                                    <br>
                                    <a href="" title="">Remover</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="number" name="" id="" value="1">
                            </form>
                        </td>
                        <td>R$: 299,90</td>
                    </tr>
                <!--FIM ITEM TABELA DO CARRINHO-->   
                         </table>       
                <!--FIM TABELA CARRINHO-->
 
                <!--INICIO VALOR TOTAL DO PRODUTO NO CARRINHO-->       
                    <div class="valor-total">
                        <table>

                            <tr>
                                <td>Sub-Total</td>
                                <td>R$: 1149,70</td>
                            </tr>

                            <tr>
                                <td>Frete</td>
                                <td>R$: 100,00</td>
                            </tr>

                            <tr>
                                <td>Total</td>
                                <td>R$: 1249,70</td>
                            </tr>

                        </table>
                    </div>    
                <!--FIM NVALOR TOTAL DO PRODUTO NO CARRINHO-->       


                    </div>
               <!--FIM CARRINHO DE COMPRAS-->

<?php require_once('footer.php')?>