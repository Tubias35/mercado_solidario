<?php
    class RecuperarSenha {

        private $senha;

        public function verificaSenha($conexao, $senha,$idUsuario)
        {
            $con = $conexao->conectar();

            $query = "SELECT senha FROM usuario WHERE idUsuario = $idUsuario";

            $stmt = $con->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return password_verify($this->getSenha(), $user['senha']);
            } else {
                $query = "SELECT senha FROM instituicoes WHERE idInst = $idUsuario";

                $stmt = $con->prepare($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    return password_verify($this->getSenha(), $user['senha']);
                } else {
                    return false;
                }
            }
        }
        //terminar de 
        public function update($conexao,$senha){
            $con = $conexao->conectar();

            $query = "UPDATE";
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }
    }
?>