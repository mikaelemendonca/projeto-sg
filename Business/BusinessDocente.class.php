<?php
	require_once '../../Model/Docente.class.php';
	require_once '../../Persistence/PersistenceDocente.class.php';

    class BusinessDocente extends BusinessPessoa
    {
		private $persistencia;

        function __construct()
        {
			parent::__construct();
			$this->persistencia = new PersistenciaDocente();
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
			return $this->persistencia->atualizar($pessoa);
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

        function obter($idDocente)
        {
			return $this->persistencia->obterById($idDocente);
		}

		function verificaCampos($itens) {
			$msg = array();

			$msg[] = empty($itens[matriculaSIAPE]) ? " * Matricula SIAPE " : null;
			$msg[] = empty($itens[campusSetor]) ? " * Campus / Setor " : null;
			$msg[] = empty($itens[cargo]) ? " * Cargo " : null;
			
			$msg = array_filter($msg);
			$msg = empty($msg) ? false : $msg;

			return $msg;
		}
	}
?>