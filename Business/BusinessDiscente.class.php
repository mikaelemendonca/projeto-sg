<?php
	require_once '../../Model/Pessoa.class.php';
	require_once '../../Model/Discente.class.php';
	require_once '../../Persistence/PersistenceDiscente.class.php';

    class BusinessDiscente extends BusinessPessoa
    {
		private $persistencia;

        function __construct()
        {
			parent::__construct();
			$this->persistencia = new PersistenciaDiscente();
		}

        function adicionar(Pessoa $pessoa)
        {
			$id = parent::adicionar($pessoa);
			if ($id) {
				$pessoa->setIdPessoa($id);
				return $this->persistencia->inserir($pessoa);
			}
		}

        function atualizar(Pessoa $pessoa)
        {
			$result = parent::atualizar($pessoa);
			if ($result) {
				return $this->persistencia->atualizar($pessoa);
			}
		}

        function remover(Pessoa $pessoa)
        {
			$result = $this->persistencia->remover($pessoa);
			if ($result) {
				return parent::remover($pessoa);
			}
			return false;
		}

        function obterTodos()
        {
			return $this->persistencia->obterTodos();
		}

        function obter($idDiscente)
        {
			return $this->persistencia->obterById($idDiscente);
		}

		function verificaCampos($itens) {
			$msg = parent::verificaCampos($itens);

			$msg = is_array($msg) ? $msg : array();

			$msg[] = empty($itens[matricula]) ? " * Matricula  " : null;
			$msg[] = empty($itens[campus]) ? " * Campus  " : null;
			$msg[] = empty($itens[curso]) ? " * Curso " : null;
			
			$msg = array_filter($msg);
			$msg = empty($msg) ? false : $msg;

			return $msg;
		}
	}
?>