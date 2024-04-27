<?php 
$editar = filter_input(INPUT_GET, 'editar', FILTER_VALIDATE_INT);
$sheep->Leitura('banners', "WHERE id = :id", "id={$editar}");
$bannerAtualizar = Formata::Resultado($sheep);
if($bannerAtualizar){
  foreach($sheep->getResultado() as $banner);
  $banner = (object) $banner;
}

?>
    <!-- Main Content -->
    <div class="main-content">
 
      <!-- INICIO NAVEGAÇÃO --->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= URL_CAMINHO_PAINEL ?>sheep.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= URL_CAMINHO_PAINEL . FILTROS?>sheep-destaque/index&token=<?=$_SESSION['timeWT']?>">Listagem</a></li>
 
          <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
        </ol>
      </nav>
      <!-- FIM NAVEGAÇÃO --->
 
      <section class="section">
 
          <!-- INICIO TOKEN URL --->
          <?php include_once('./token.php'); ?>
     <!-- FIM TOKEN URL --->

 
        <form action="<?= URL_CAMINHO_PAINEL . FILTROS ?>sheep-destaque/filtros/atualizar&token=<?= $_SESSION['timeWT'] ?>" method="post" enctype="multipart/form-data">
 
 
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-footer text-right">
                  <a href="" class="btn btn-primary" data-toggle="modal" data-target=".ajuda"><i class="fa fa-exclamation-circle"></i> Ajuda </a>
                  </div>
 
                  <div class="card-header">
                    <h4>Atualizar</h4>
                  </div>
                  <div class="card-body">

                 
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Burcar Imagem</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Buscar Imagem</label>
                           <?php if($banner->capa){?>
                            <img src="<?= SHEEP_IMG_BANNERS . $banner->capa ?>" alt="<?= $banner->titulo_um ?>" style="width:100%; height:auto;">
                           <?php }?>
                           <input type="file" name="capa" id="image-upload" />
                        </div>
                      </div>
                    </div>
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título(Obrigatório)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_um" placeholder="Digite o título" value="<?= $banner->titulo_um  ? $banner->titulo_um  : null; ?>">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título 2(Obrigatório)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_dois" placeholder="Digite o título" value="<?= $banner->titulo_dois  ? $banner->titulo_dois  : null; ?>">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título 3(Obrigatório)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_tres" placeholder="Digite o título" value="<?= $banner->titulo_tres  ? $banner->titulo_tres  : null; ?>">
                      </div>
                    </div>
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título 4(Obrigatório)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_quatro" placeholder="Digite o título" value="<?= $banner->titulo_quatro  ? $banner->titulo_quatro  : null; ?>">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título 5(Obrigatório)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_cinco" placeholder="Digite o título" value="<?= $banner->titulo_cinco  ? $banner->titulo_cinco  : null; ?>">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título 6(Opcional)</label>
                      
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="titulo_seis" placeholder="Digite o título" value="<?= $banner->titulo_seis  ? $banner->titulo_seis  : null; ?>">
                      </div>
                    </div>
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link(Obrigatório)</label>
                      
                      <div class="col-md-7">
                     <input type="url" class="form-control" name="link" placeholder="Cole o link URL completa" value="<?= $banner->link  ? $banner->link  : null; ?>">
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Local(Obrigatório)</label>
                      
                      <div class="col-md-7">
                         <select name="local" class="form-control">
                            <option value="BannerDestaque550x604" <?= $banner->local == 'BannerDestaque550x604' ? 'selected' : null; ?> >Banner Destaque - 550x604px</option>
                            <option value="BannerCTA550x604" <?= $banner->local == 'BannerCTA550x604' ? 'selected' : null; ?> >Banner CTA - 550x604px</option>

                         </select>
                      </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $banner->id ?>">
                    <input type="hidden" name="sheep_firewall" value="<?= $_SESSION['_sheep_firewall'] ?>">
                    <input type="hidden" name="tipo" value="destaque">
                    <input type="hidden" name="tipo_cadastro" value="atualizar">
           
 
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
 
         <!-- INICIO DA JANELA DE MODAL DE TREINAMENTO  -->
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
 
    </div>