<?php
    class Pessoa
    {
		private $idPessoa;
        private $nome;
        private $cpf;
        private $rg;
        private $endereco;
        private $bairro;
        private $cep;
        private $cidade;
        private $estado;
        private $celular;
        private $email;
        private $login;
        private $senha;
        private $foto;
        private $perfil;

        public function __construct($itens)
        {
            $this->idPessoa = $itens['idPessoa'];
			$this->nome = $itens['nome'];
			$this->cpf = $itens['cpf'];
			$this->rg = $itens['rg'];
			$this->endereco = $itens['endereco'];
			$this->bairro = $itens['bairro'];
			$this->cep = $itens['cep'];
			$this->cidade = $itens['cidade'];
			$this->estado = $itens['estado'];
			$this->celular = $itens['celular'];
			$this->email = $itens['email'];
			$this->login = $itens['login'];
			$this->senha = $itens['senha'];
			$this->foto = $itens['foto'];
			$this->perfil = $itens['perfil'];
		}

        public function getIdPessoa()
        {
            return $this->idPessoa;
        }
    
        public function setIdPessoa($idPessoa)
        {
            $this->idPessoa = $idPessoa;
        }
    
        public function getNome()
        {
            return $this->nome;
        }
    
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
    
        public function getCpf()
        {
            return $this->cpf;
        }
    
        public function setCpf($cpf)
        {
            $this->cpf = $cpf;
        }
    
        public function getRg()
        {
            return $this->rg;
        }
    
        public function setRg($rg)
        {
            $this->rg = $rg;
        }
    
        public function getEndereco()
        {
            return $this->endereco;
        }
    
        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;
        }
    
        public function getBairro()
        {
            return $this->bairro;
        }
    
        public function setBairro($bairro)
        {
            $this->bairro = $bairro;
        }
    
        public function getCep()
        {
            return $this->cep;
        }
    
        public function setCep($cep)
        {
            $this->cep = $cep;
        }
    
        public function getCidade()
        {
            return $this->cidade;
        }
    
        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }
    
        public function getEstado()
        {
            return $this->estado;
        }
    
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
    
        public function getFoto()
        {
            return $this->foto;
        }
    
        public function setFoto($foto)
        {
            $this->foto = $foto;
        }
    
        public function getCelular()
        {
            return $this->celular;
        }
    
        public function setCelular($celular)
        {
            $this->celular = $celular;
        }
    
        public function getEmail()
        {
            return $this->email;
        }
    
        public function setEmail($email)
        {
            $this->email = $email;
        }
    
        public function getLogin()
        {
            return $this->login;
        }
    
        public function setLogin($login)
        {
            $this->login = $login;
        }
    
        public function getSenha()
        {
            return $this->senha;
        }
    
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function getPerfil()
        {
            return $this->perfil;
        }
    
        public function setPerfil($perfil)
        {
            $this->perfil = $perfil;
        }
	}
?>