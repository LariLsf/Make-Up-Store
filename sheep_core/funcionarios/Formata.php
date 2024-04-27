
<?php
 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';  
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

class Formata {

   private static $Data;
    private static $Format;

    /**
     * <b>Verifica E-mail:</b> Executa validação de formato de e-mail. Se for um email válido retorna true, ou retorna false.
     * @param STRING $Email = Uma conta de e-mail
     * @return BOOL = True para um email válido, ou false
     */
    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$Format, self::$Data)):
            return true;
        else:
            return false;
        endif;
    }

 

    //novo conversor de url para 
    public static function Name(string $name): string {
     $format = [
         'search' => 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª',
         'replace' => 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 '
     ];

     $data = strtr(mb_convert_encoding($name, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($format['search'], 'ISO-8859-1', 'UTF-8'), $format['replace']);
     $data = strip_tags(trim($data));
     $data = str_replace(' ', '-', $data);
     $data = preg_replace('/-+/', '-', $data);

     return strtolower(mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1'));
 }


  //novo conversor de url para 
  public static function URL(string $name): string {
    $format = [
        'search' => 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª',
        'replace' => 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 '
    ];

    $data = strtr(mb_convert_encoding($name, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($format['search'], 'ISO-8859-1', 'UTF-8'), $format['replace']);
    $data = strip_tags(trim($data));
    $data = str_replace(' ', '-', $data);
    $data = preg_replace('/-+/', '-', $data);

    return strtolower(mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1'));
}

 

     /**
     * <b>CADASTRA GALERIA DE FOTOS </b> 
     * @param STRING $bancoLeitura = BANCO DE DADOS QUE TEM QUE TER UMA URL DEFINIDA PARA ADICIONAR O NOME NO ARQUIVO 
     * ESSE MESMO BANCO DE DADOS É QUE A GLERIA VAI TER LIGAÇÃO 
     * ID - ID_PRODUTO - IMAGEM - TIPO - DATA 
     * @return STRING = $pastaImagens = NOME DA PASTA ONDE VAI SER ARMAZENADA AS IMAGENS 
     * @return STRING = $imagens = ARRAY COM AS IMAGENS NO INPUT SEMPRE ADICIONE O NOME DO CAMPO NAME COM [] VEJA UM EXEMPLO name="fotos[]"
     * @return STRING = $id = INT ESSE É O ID QUE LIGA A GALERIA A QUALQUER BANCO DE DDOS NO NOSSO EXEMPLO PRODUTOS 
     * @return STRING = $tipo = ESSE É O TIPO DA GALERIA FILTRANDO ELA E O ID - PARA EVITAR APAGAR UM ID DIFERENTE DESTE POR TER VARIOS ID PARECIDOS
     * EXEMPLO DE USO =   Formata::galeriaImagens('produto', '../img-produtos/', $_FILES['fotos'], $atualizarProduto['id'], $atualizarProduto['tipo']);
     */
 public static function galeriaImagens(string $bancoLeitura, string $pastaImagens, array $imagens, int $id, string $tipo) {
    
     $nomeImagem = new Ler();
     $nomeImagem->Leitura($bancoLeitura, "WHERE id  = :id", "id={$id}");
     if (!$nomeImagem->getResultado()):
         return false;
     else:
         $nomeImagem = $nomeImagem->getResultado()[0]['url'];
         $gbFiles = array();
         $gbCount = count($imagens['tmp_name']);
         $gbKeys = array_keys($imagens);

         for ($gb = 0; $gb < $gbCount; $gb++):
             foreach ($gbKeys as $Keys):
                 $gbFiles[$gb][$Keys] = $imagens[$Keys][$gb];
             endforeach;
         endfor;

         $gbSend = new Uploads($pastaImagens);
         $i = 0;
         $u = 0;

         foreach ($gbFiles as $gbUpload):
             $i++;
             $imgName = "{$nomeImagem}-larissa-ferreira-{$id}-" . (substr(md5(time() + $i), 0, 5)).'-'.date('h').date('s').'-ano-'.date('Y').'-';
             $gbSend->Image($gbUpload, $imgName);

             if ($gbSend->getResult()):
                 $gbImage = $gbSend->getResult();
                 $gbCreate = 
                 [
                 'id_produto' => $id, 
                 "imagem" => $gbImage, 
                 "tipo" => $tipo, 
                 "data" => date('Y-m-d H:i:s')
                 ];
                 $EnviaGaleriaBd = new Criar();
                 $EnviaGaleriaBd->Criacao('galeria_produto', $gbCreate);
                 $u++;
             endif;
         endforeach;

         if ($u > 1):
            return true;
         endif;

     endif;
 }


 /**
     * <b>REMOVER IMAGEM DA PASTA IMAGENS E DO BANCO DE DADOS DA GALERIA DE FOTOS </b> 
     *
     * @return STRING = $pastaImagem = CAMINHO DA PASTA ONDE VAI SER DELETDA A FOTO
     * @return STRING = $id = INT ID DA FOTO
     * @return STRING = $tipo = ESSE É O TIPO DA GALERIA FILTRANDO ELA E O ID - PARA EVITAR APAGAR UM ID DIFERENTE DESTE POR TER VARIOS ID PARECIDOS
     * EXEMPLO DE USO = Formata::removeImagemGaleria($id, '../img-produtos/', 'produto');
     */
 public static function removeImagemGaleria(int $id, string $pastaImagem, string $tipo = null){
     //remove a imagem da pasta imagens
    $lerGB = new Ler();
    $lerGB->Leitura("galeria_produto", "WHERE id = :id", "id={$id}");
    if ($lerGB->getResultado()):
        $imagem = $pastaImagem . $lerGB->getResultado()[0]['imagem'];
        if (file_exists($imagem) && !is_dir($imagem)):
            unlink($imagem);
        endif;
    endif;

    
     $removerImagemDaGaleria = new Excluir();
     $removerImagemDaGaleria->Remover("galeria_produto", "WHERE id = :id", "id={$id}");
     if($removerImagemDaGaleria->getResultado()){
     return true; 
     }  
 
}

/**
     *
     * 
     * 
     */
    public static function Comprimento(){
     $horaAtual = date('H');
                     
                     if(
                             $horaAtual == 1 
                             || $horaAtual == 2
                             || $horaAtual == 3
                             || $horaAtual == 4
                             || $horaAtual == 5
                             || $horaAtual == 6
                             || $horaAtual == 7
                             || $horaAtual == 8
                             || $horaAtual == 9
                             || $horaAtual == 10
                             || $horaAtual == 11
                             || $horaAtual == 12
                             
                      ):
                          return  $ComprimentoWebtec = '<b>Bom dia </b>';
                     elseif(
                             $horaAtual == 13
                             || $horaAtual == 14
                             || $horaAtual == 15
                             || $horaAtual == 16
                             || $horaAtual == 17
                             || $horaAtual == 18
                             
                             ):
                          return  $ComprimentoWebtec = '<b> Boa tarde </b>';
                      elseif(
                              $horaAtual == 19
                              || $horaAtual == 20
                              || $horaAtual == 21
                              || $horaAtual == 22
                              || $horaAtual == 23
                              || $horaAtual == 24
                              || $horaAtual == 00
                         
                              ):
                          return  $ComprimentoWebtec = '<b> Boa noite </b>';
                     endif;
 }




    /**
     * <b>Tranforma Data:</b> Transforma uma data no formato DD/MM/YY em uma data no formato TIMESTAMP!
     * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
     * @return STRING = $Data = Data no formato timestamp!
     */
    public static function Data($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    public static function LimitaTextos($String, $Limite, $Pointer = null) {
        self::$Data = strip_tags(trim($String));
        self::$Format = (int) $Limite;

        $ArrWords = explode(' ', self::$Data);
        $NumWords = count($ArrWords);
        $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format));

        $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer );
        $Result = ( self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data );
        return $Result;
    }
    
   
    // resulme a leitura e evita abrir um novo objeto
    public static function Resultado($resultado){
    
     return (!empty($resultado->getResultado() ? $resultado->getResultado() : null));
    }


        
    /**
     *
     * 
     * CONVERTE O MÊS EM ESCRITA 
     * 
     */
    public static function Mes($mes){
        $MenoWDois = date($mes); // exempo do mes date('m');
              
              if($MenoWDois == 1):
               return $MenoWDois = "Janeiro";
               elseif($MenoWDois == 2):
               return $MenoWDois = 'Fevereiro';
               elseif($MenoWDois == 3):
               return $MenoWDois = 'Março';
               elseif($MenoWDois == 4):
               return $MenoWDois = 'Abril';
               elseif($MenoWDois == 5):
               return $MenoWDois = 'Maio';
               elseif($MenoWDois == 6):
               return $MenoWDois = 'Junho';
               elseif($MenoWDois == 7):
               return $MenoWDois = 'Julho';
               elseif($MenoWDois == 8):
               return $MenoWDois = 'Agosto';
               elseif($MenoWDois == 9):
               return $MenoWDois = 'Setembro';
               elseif($MenoWDois == 10):
               return $MenoWDois = 'Outubro';
               elseif($MenoWDois == 11):
               return $MenoWDois = 'Novembro';
               elseif($MenoWDois == 12):
               return $MenoWDois = 'Dezembro';
              endif;
    }



    
    
    /**
     PARA GERAR QUANTO TEMPO A EMPRESA   
    **/
    public static function EmpresaSheep() {
        $empresaCriada = 2021;
        $dataAtual = date('Y');

        $subtrai = $dataAtual - $empresaCriada;

        
        return "Sheep PHP {$subtrai} ano(s), com vocês!";
    }

   
    /**
     *
     * MOSTRA O DIA DA SEMANA DE ACORDO COM A DATA 
     */
    public static function DiaDaSemana($data){
     $diasemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
     //$data = date('Y-m-d');
     $diasemana_numero = date('w', strtotime($data));
     // outra maneira $diasemana_numero = date('w', time());
     return $diasemana[$diasemana_numero];  
     
     
     
 }


     /**
     * <b>Tranforma URL:</b> Gera caracteres aleatorios com o valor apontado
     * @param STRING $Name = Uma string qualquer
     * @return STRING = $Data = Uma URL amigável válida 
     */
    public static function GerarSimbolos($size) 
{
    $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

    $key = '';
    for ($i = 0; $i < ($size+10); $i++) 
    {
        $key .= $keys[array_rand($keys)];
    }

    return substr($key, 0, $size);
}
 
    
    

/**
 * ENVIO DE E-MAIL UNIVERSAL PAINEL DE CONTROLE 
 * @param STRING = $assunto = ASSUNTO DA MENSAGEM 
 * @param STRING = $mensagem = MENSAGEM DO EMAIL
 * @param STRING = $pastaPainel = CAMINHO DA PASTA DO PAINEL EXEMPLO sheep-usuarios
 * @param STRING = $email = EMAIL DO CLIENTE
 * @param STRING = $cliente = NOME DO CLIENTE 
 * COMO USAR: Formata::EnviaEmail(string $assunto, string $mensagem, string 'sheep-usuarios', string $email, string $cliente);
 * 
 */

 public static function EnviaEmail(string $assunto, string $mensagem, string $pastaPainel, string $email, string $cliente)
 {
        //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //CONFIGURAÇÕES DO PHPMAILLER
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();   
    $mail->setLanguage('br');                                         //Send using SMTP
    $mail->isHTML(true); 
    $mail->SMTPAuth   = true; 
    $mail->SMTPSecure = EMAIL_PHPMAILER_SECURE;  
    $mail->CharSet = EMAIL_PHPMAILER_CHARSET;  

    
    //CONFIGURAÇÕES DO SERVIDOR
    $mail->Host       = EMAIL_PHPMAILER_HOST;                     //Set the SMTP server to send through                        //Enable SMTP authentication
    $mail->Username   = EMAIL_PHPMAILER_USERNAME;                     //SMTP username
    $mail->Password   = EMAIL_PHPMAILER_PASS;                               //SMTP password
    $mail->Port       = EMAIL_PHPMAILER_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL_PHPMAILER_QUEM_ENVIA, EMAIL_PHPMAILER_QUEM_ENVIA_NOME);
    $mail->addAddress($email, $cliente);     //Add a recipient
    $mail->addReplyTo(EMAIL_PHPMAILER_QUEM_ENVIA, EMAIL_PHPMAILER_QUEM_ENVIA_NOME);
    ///$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $home = SITENAME;
    $emailHome = EMAIL;
    $dataAtual = date('d/m/Y');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $assunto;
    $mail->msgHTML("{$mensagem}"
    ."<p>Qualquer Dúvida Estamos a Disposição</p>"
    ."<p>{$home} nosso email: {$emailHome} Enviado dia {$dataAtual}</p>");
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'MENSAGEM ENVIADA COM SUCESSO!';
    header("Location: " . URL_CAMINHO_PAINEL . FILTROS . "{$pastaPainel}/index?sucesso=true&token=" . $_SESSION['timeWT']);
} catch (Exception $e) {
    echo "Ocorreu um erro: {$mail->ErrorInfo}";
}
 } 


 /**
  * @param STRING $bd = TABELA DO DO BANCO DE DADOS 
  * @param  $imagem = IMAGEM QUE VEM DA NOSSA CLASSE EXEMPLO $this->data['capa']
  * @param INT $id = ID DO BANCO DE DADOS LIGADO A ESTA IMAGEM 
  * @param STRING $pastaImg =  PASTA ONDE SERÁ ARMAZENDA A IMAGEM 
  * @param STRING $nomeImg =  NOME PARA ADICIONAR NA URL DA IMAGEM $this->data['nome']
  * @param $nomeFotoBd =  NOME DA FOTO NO BANCO DE DADOS EXEMPLO: $capa = 'capa';
  * COMO USAR = Formata::AtualizaImagemUnica('BANCO DE DADOS', $this->data['capa'], $this->id, SHEEP_IMG, $this->data['nome'],  $capa);
  */
 public static function AtualizaImagemUnica(string $bd, $imagem, int $id, string $pastaImg, string $nomeImg,  $nomeFotoBd = null)
 {

    if (isset($imagem)) {
      $lerFoto = new Ler();
      $lerFoto->Leitura($bd, "WHERE id = :id", "id={$id}");
      if ($lerFoto->getResultado()) {
        $foto = $pastaImg . $lerFoto->getResultado()[0]['logo'];
        if (file_exists($foto) && !is_dir($foto)) {
          unlink($foto);
        }

        $enviaFoto = new Uploads($pastaImg);
        $urlFoto = Formata::Name($nomeImg) .'-'. Formata::Name($_SERVER['REMOTE_ADDR']) . md5(date('H:i:s')) . time();
        $enviaFoto->Image($imagem, $urlFoto);
      }
    }

      if (isset($enviaFoto) && $enviaFoto->getResult()) {
        if (isset($imagem)) {
            $imagem = $enviaFoto->getResult();
        } else {
          unset($imagem);
        }
      } else {
        unset($imagem);
      }
 }

    

}



