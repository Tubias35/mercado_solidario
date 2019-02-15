<?php
require_once('Pessoa.php');
require_once('Endereco.php');
//adicionar requires de conexao
class PessoaJuridica extends Pessoa
{
    private $cnpj;
    private $razaoSocial;
    private $img_usuario;

    public function __construct($razaoSocial, $tipo_pessoa, $cnpj, $email, $senha)
    {
        parent::__construct($tipoPessoa, $email, $senha);
        $this->razaoSocial = $razaoSocial;
        $this->cnpj = $cnpj;
    }

    //insert usuario pessoa juridica
    public function insert($conexao)
    {
        $con = $conexao->conectar();

        $query = "INSERT INTO USUARIO(dta_cadastro, nome, tipo_pessoa, cpf_cnpj, email, senha, img_usuario) 
							values(
                                NOW(),
								'" . $this->getRazaoSocial() . "',
                                '" . $this->getTipoPessoa() . "',
								'" . $this->getCnpj() . "',
								'" . $this->getEmail() . "',
								'" . $this->getSenha() . "',
                                null                                
							)";

        $stmt = $con->prepare($query);
        return $stmt->execute();
    }

    public function update($idUsuario, $conexao)
    {
        $con = $conexao->conectar();

        $query = "UPDATE USUARIO SET 
								nome='" . $this->getRazaoSocial() . "',
								cpf='" . $this->getCnpj() . "',
                                email='" . $this->getEmail() . "',
                                senha='" . $this->getSenha() . "',
                                img_usuario= '" . $this->getImg_usuario() . "'
						  WHERE id_usuario = '$idUsuario'";

        $stmt = $con->prepare($query);
        return $stmt->execute();
    }

    public function selectIdUser($cnpj, $conexao)
    {
        $con = $conexao->conectar();

        //organizar o update da imagem
        $query = "SELECT * FROM usuario WHERE cpf_cnpj = $cnpj";

        $stmt = $con->prepare($query);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $IdUser = $row->idUsuario;
        }

        return $IdUser;
    }


    /**
     * Get the value of cnpj
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @return  self
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }



    /**
     * Get the value of razaoSocial
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set the value of razaoSocial
     *
     * @return  self
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getImg_usuario()
    {
        return $this->img_usuario;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setImg_usuario($img_usuario)
    {
        $this->img_usuario = $img_usuario;

        return $this;
    }
}

?>