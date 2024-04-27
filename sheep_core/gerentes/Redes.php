<?php 

class Redes
{
   private array $data;
   private int $id;
   private bool $resultado; 
   private const BD = 'redes_sociais';

   public function criarRede(array $data): bool 
   {
      $this->data = $data; 
      if($this->verificaCampos($this->data)){
        return $this->resultado = false;
        exit();
      }

      $this->filtroBanco();
      return $this->salvarNoBanco();
   }

   public function atualizaRede(int $id, array $data): bool
   {
    $this->id = $id;
    $this->data = $data;

    if($this->verificaCampos($this->data)){
        return $this->resultado = false;
        exit();
      }

      $this->filtroBanco();
      return $this->atualizaNoBanco();

   }

   public function excluirRede(int $id): bool
   {
      $this->id = $id;  
      if(empty($this->id)){
        return $this->resultado = false;
        exit();
      }

      return $this->vamosExcluir();
   }

   //RETORNO 
   public function getResultado(): bool 
   {
       return $this->resultado;
   }

   // VERIFICA SE EXISTE CAMPOS VAZIOS 
   private function verificaCampos(array $data):bool 
   {
      return in_array('', $data);
   }

   //FILTRO CONTRA SQLINJECTION 
   private function filtroBanco(): void 
   {
    unset($this->data['id'], $this->data['sheep_firewall']); 

    $this->data = array_map('trim', $this->data);
    $this->data = array_map('htmlspecialchars', $this->data);
    preg_replace('/[^[:alnum:]@]/', '', $this->data);

    $this->data['icone'] = (string) $this->data['icone'];
    $this->data['nome'] = (string) $this->data['nome'];
    $this->data['link'] = (string) $this->data['link'];
    $this->data['tipo'] = (string) $this->data['tipo'];
    $this->data['tipo_cadastro'] = (string) $this->data['tipo_cadastro'];

    if($this->data['tipo_cadastro']  == 'criar'){
      $this->data['data'] = date('Y-m-d H:i:s');
      $this->data['dia'] = date('d');
      $this->data['mes'] = date('m');
      $this->data['ano'] = date('Y');
    }

   }

   //SALVAR NO BANCO
   private function salvarNoBanco(): bool 
   {
       $criar = new Criar();
       $criar->Criacao(self::BD, $this->data);
       if($criar->getResultado()){
            return $this->resultado = true;
       }
   }

   private function atualizaNoBanco(): bool
   {
    $atualiza = new Atualizar();
    $atualiza->Atualizando(self::BD, $this->data, "WHERE id = :id", "id={$this->id}");
    if($atualiza->getResultado()){
        return $this->resultado = true;

    }
   }

   private function vamosExcluir(): bool
   {
    $excluir = new Excluir();
    $excluir->Remover(self::BD, "WHERE id = :id", "id={$this->id}");
    if($excluir->getResultado()){
        return $this->resultado = true;
    }
   }
}

?>