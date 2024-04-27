<?php 

class Entrar 
{

    private string $email;
    private string $senha;
    private ?array $resultado = null;// PODE RESTAR O VALOR NULL
    private const BD = 'usuarios';

    public function acessarPainel(string $email, string $senha): ?array
    {
       $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
       $this->senha = trim($senha);

       if(!Formata::Email($this->email)){
        return $this->resultado = false;
        exit();
       }

       return $this->verificaUsuario();
    }

    /**
     * @return array|null
     */
    public function getResultado(): ?array
    {
        return $this->resultado;
    }

    
    private function verificaUsuario(): ?array
    {
        $ler = new Ler();
        $ler->Leitura(self::BD, "WHERE email = :email", "email={$this->email}");
        if($ler->getResultado() && password_verify($this->senha, $ler->getResultado()[0]['senha'])){
            return $this->resultado =  $ler->getResultado()[0];
        }

        return null;
    }



}