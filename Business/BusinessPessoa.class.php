<?php
	require_once '../../Model/Pessoa.class.php';
	require_once '../../Persistence/PersistencePessoa.class.php';

    class BusinessPessoa
    {
		private $persistencia;

        function __construct()
        {
			$this->persistencia = new PersistenciaPessoa();
		}

        function adicionar(Pessoa $pessoa)
        {
			return $this->persistencia->inserir($pessoa);
		}

        function atualizar(Pessoa $pessoa)
        {
			return $this->persistencia->atualizar($pessoa);
		}

        function remover(Pessoa $pessoa)
        {
			return $this->persistencia->remover($pessoa);
		}

        function obterTodos()
        {
			return $this->persistencia->obterTodos();
		}

        function obter($idPessoa)
        {
			return $this->persistencia->obterById($idPessoa);
		}

        function logar(Pessoa $pessoa)
        {
			return $this->persistencia->efetuarLogin($pessoa);
		}

		function verificaCampos($itens) {
			$msg = array();

			$msg[] = empty($itens['nome']) ? " * Nome " : null;
			$msg[] = empty($itens['cdCPF']) ? " * CPF " : null;
			$msg[] = empty($itens['cdRG']) ? " * RG " : null;
			$msg[] = empty($itens['celular']) ? " * Celular " : null;
			$msg[] = empty($itens['email']) ? " * Email " : null;
			$msg[] = empty($itens['login']) ? " * Login " : null;
			$msg[] = empty($itens['senha']) ? " * Senha " : null;
			
			$msg = array_filter($msg);
			$msg = empty($msg) ? false : $msg;

			return $msg;
		}
	}
?>