<?php
	require_once '../../Model/Edital.class.php';
	require_once '../../Persistence/PersistenceEdital.class.php';

    class BusinessEdital
    {
		private $persistencia;

        function __construct()
        {
			$this->persistencia = new PersistenciaEdital();
		}

        function adicionar(Edital $edital)
        {
			return $this->persistencia->inserir($edital);
		}

        function atualizar(Edital $edital)
        {
			return $this->persistencia->atualizar($edital);
		}

        function remover(Edital $edital)
        {
			return $this->persistencia->remover($edital);
		}

        function obterTodos()
        {
			return $this->persistencia->obterTodos();
		}

        function obter($idEdital)
        {
			return $this->persistencia->obterById($idEdital);
		}

		function verificaCampos($itens) {
			$msg = array();

			$msg[] = empty($itens['numero']) ? " * Número " : null;
			$msg[] = empty($itens['nomePrograma']) ? " * Programa " : null;
			$msg[] = empty($itens['tipoProponente']) ? " * Tipo Proponente " : null;
			$msg[] = empty($itens['bolsaOrientador']) ? " * Bolsa Orientador " : null;
			
			$msg = array_filter($msg);
			$msg = empty($msg) ? false : $msg;

			return $msg;
		}
	}
?>