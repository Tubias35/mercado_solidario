<?php
//adicionar require da conexão

/*
Usuario tera apenas a possibilidade de inserir ou excluir o cartão cadastrado para compra. 
Tirando a possibilidade de corrigir info do cartão;
*/
class Conta
{
    private $banco;
    private $agencia;
    private $conta;
    private $titular;
    private $cpf_cnpj;
    private $id_usuario;

    public function __construct($banco, $agencia, $conta, $titular, $cpf_cnpj)
    {
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->titular = $titular;
        $this->cpf_cnpj = $cpf_cnpj;
        $this->id_usuario = $_SESSION['id_usuario'];
    }

    public function insert($conexao)
    {
        $con = $conexao->conectar();

        $query = "INSERT INTO CONTA(banco, agencia, conta, titular, cpf_cnpj) 
							values(
								'" . $this->getBanco() . "',
								'" . $this->getAgencia() . "',
								'" . $this->getConta() . "',
                                '" . $this->getTitular() . "',
								'" . $this->getCpf_cnpj() . "',
                                '" . $this->getId_usuario() . "'
							)";
        $stmt = $con->prepare($query);
        return $stmt->execute();
    }

    public function delete($id_conta, $conexao)
    {
        $con = $conexao->conectar();
        $query = "DELETE FROM CONTA WHERE idConta = '$id_conta'";

        $stmt = $con->prepare($query);
        return $stmt->execute();
    }

    public function select($idUsuario, $conexao)
    {
        $con = $conexao->conectar();
        $query = "SELECT * FROM CONTA WHERE id_instituicao = '$idUsuario'";

        $stmt = $con->prepare($query);
        return $stmt->execute();
    }

    /**
     * Get the value of banco
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set the value of banco
     *
     * @return  self
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get the value of agencia
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Set the value of agencia
     *
     * @return  self
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * Get the value of conta
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set the value of conta
     *
     * @return  self
     */
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * Get the value of titular
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set the value of titular
     *
     * @return  self
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }


    /**
     * Get the value of cpf_cnpj
     */
    public function getCpf_cnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * Set the value of cpf_cnpj
     *
     * @return  self
     */
    public function setCpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    /**
     * Get the value of cpf_cnpj
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of cpf_cnpj
     *
     * @return  self
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }
}

?>