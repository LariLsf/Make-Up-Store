<?php 

class Cores
{
    private int $id; 
    private array $data; 
    private bool $resultado; 
    private const BD = 'cores';

    public function atualizaCores(int $id, array $data): bool 
    {
        $this->id = $id;
        $this->data = $data;
        if($this->verificaCamposVazios($this->data)){
            return $this->resultado = false;
         exit();
        }

        $this->filtroBanco();
        return $this->salvaBanco();
    }

    public function getResultado(): bool 
    {
        return $this->resultado;
    }

    private function verificaCamposVazios(array $data): bool 
    {
        return in_array('', $data);
    }

    private function filtroBanco(): void 
    {
        unset($this->data['id'], $this->data['sheep_firewall']);
        $this->data = array_map('trim', $this->data);
        $this->data = array_map('htmlspecialchars', $this->data);
        preg_replace('/[^[:alnum:]@]/', '', $this->data);

        $this->data['cor_um'] = (string) $this->data['cor_um'];
        $this->data['cor_dois'] = (string) $this->data['cor_dois'];
        $this->data['cor_tres'] = (string) $this->data['cor_tres'];
        $this->data['cor_quatro'] = (string) $this->data['cor_quatro'];
        $this->data['cor_cinco'] = (string) $this->data['cor_cinco'];
        $this->data['cor_seis'] = (string) $this->data['cor_seis'];
        $this->data['cor_sete'] = (string) $this->data['cor_sete'];
        $this->data['cor_oito'] = (string) $this->data['cor_oito'];
        $this->data['cor_nove'] = (string) $this->data['cor_nove'];
        $this->data['cor_dez'] = (string) $this->data['cor_dez'];
       
    }

    private function salvaBanco(): bool 
    {
        $salvar = new Atualizar();
        $salvar->Atualizando(self::BD, $this->data, "WHERE id = :id", "id={$this->id}");
        if($salvar->getResultado()){
         return $this->resultado = true;
        }
    }
}

?>