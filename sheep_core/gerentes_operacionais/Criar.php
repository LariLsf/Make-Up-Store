<?php
/**********************************************************************
 * ********************************************************************
 * GERENTE DE CRIAÇÃO GERAL *******************************************
 */
class Criar extends Conexao {

    private $Tabela;
    private $Dados;
    private $Resultado;
    private $Criar;
    private $Conexao;

    /**
     * <b>ExeCriar</b> Executa um cadastro simplificado no banco de dados com prepared statements
     * Basta informar o nome da tabela e um array atribuitivo com o nome da coluna e valor.
     * @param STRING $Tabela INFORME O NOME DA TABELA
     * @param ARRAY  $Dados INFORME UM ARRAY ATRIBUITIVO ( 'NOME DA COLUNA' => 'VALOR' )
     *
     *  */
    public function Criacao($Tabela, array $Dados) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;

        
        $this->getLogica();
        $this->Execute();
    }

    /** @var Retorna um resultado de cadastro ou não  */

    public function getResultado() {
        return $this->Resultado;
    }

    /**
     * ********** PRIVATE METHODS *************
     */
    
    /** @var Faz a conexão com banco de dados */
    private function Conectar() {
        $this->Conexao = parent::getCanectar();
        $this->Criar = $this->Conexao->prepare($this->Criar);
        
    }

     /** @var gera a syntax do mysql automaticamente */
    private function getLogica() {
        $Fileds = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $this->Criar = "INSERT IGNORE INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
    
    }

     /** @var Executa o PDO */
    private function Execute() {
        $this->Conectar();
        
        try {
            $this->Criar->execute($this->Dados);
            $this->Resultado = $this->Conexao->lastInsertId();
        } catch (Exception $wt) {
            $this->Resultado = null;
            print "<b>Erro ao cadastrar: {$wt->getMessage()} {$wt->getCode()}</b> ";
        }
    }

}
