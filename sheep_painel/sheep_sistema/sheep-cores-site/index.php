<?php

$sheep->Leitura("cores", "WHERE id = 77471");
$coresSite = Formata::Resultado($sheep);
if($coresSite){
foreach($sheep->getResultado() as $cor);
$cor = (object) $cor;

}

 ?>
    <!-- Main Content -->
    <div class="main-content">
 
      <!-- INICIO NAVEGAÇÃO --->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= URL_CAMINHO_PAINEL ?>sheep.php">Inicio</a></li>
 
          <li class="breadcrumb-item active" aria-current="page">Cores do Site</li>
        </ol>
      </nav>
      <!-- FIM NAVEGAÇÃO --->
 
      <section class="section">
     <!-- INICIO TOKEN URL --->
      <?php include_once('./token.php'); ?>
      <!-- FIM TOKEN URL --->
 
        <form action="<?= URL_CAMINHO_PAINEL . FILTROS ?>sheep-cores-site/filtros/atualizar&token=<?= $_SESSION['timeWT'] ?>" method="post" enctype="multipart/form-data">
 
 
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
 
                  <div class="card-footer text-right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target=".ajuda"><i class="fa fa-exclamation-circle"></i> Ajuda </a>
                  </div>
 
                  <div class="card-header">
                    <h4>Cores do Site</h4>
                  </div>
                  <div class="card-body">
 
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Principal(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_um" placeholder="Digite o nome da sua empresa" value="<?= $cor->cor_um ? $cor->cor_um : '#ff523b'?>">
                      </div>
 
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Principal Hover(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_dois" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_dois ? $cor->cor_dois : '#f3b2e5'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fonte 1(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_tres" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_tres ? $cor->cor_tres : '#fff'?>">
                      </div>
 
                    </div>
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fonte Corpo(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_quatro" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_quatro ? $cor->cor_quatro : '#555'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fonte Corpo Leve(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_cinco" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_cinco ? $cor->cor_cinco : '#777'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Botão(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_seis" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_seis ? $cor->cor_seis : '#563434'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Botão Hover(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_sete" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_sete ? $cor->cor_sete : '#bd8e8e'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fonte do Botão(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_oito" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_oito ? $cor->cor_oito : '#000'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fundo Rodapé(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_nove" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_nove ? $cor->cor_nove : '#000'?>">
                      </div>
 
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cor Fonte Rodapé(Obrigatório)</label>
                      <div class="col-md-7">
                        <input type="color" class="form-control" name="cor_dez" placeholder="Digite o nome da sua empresa"  value="<?= $cor->cor_dez ? $cor->cor_dez : '#fff'?>">
                      </div>
 
                    </div>
 
       
                    <input type="hidden" name="sheep_firewall" value="<?= $_SESSION['_sheep_firewall'] ?>">
                    <input type="hidden" name="id" value="<?= $cor->id ?>">
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-lg btn-primary" name="sendSheep">Salvar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
 
 <!-- INICIO DA JANELA DE MODAL DE TREINAMENTO -->
    <!-- Large modal -->
    <div class="modal fade ajuda" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Fique tranquilo que vou te ajudar, veja o vídeo até o final 2x</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             
               <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ffuF8-Nebuw?rel=0" allowfullscreen></iframe>
                 </div>
                 
                 
              </div>
            </div>
          </div>
        </div>

  <!-- FIM DA JANELA DE MODAL DE TREINAMENTO -->
 <?php 

 ?>
    </div>