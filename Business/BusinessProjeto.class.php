<?php
	require_once '../../Model/Projeto.class.php';
	require_once '../../Persistence/PersistenceProjeto.class.php';

    class BusinessProjeto
    {
		private $persistencia;

        function __construct()
        {
			$this->persistencia = new PersistenciaProjeto();
		}

        function adicionar(Projeto $projeto)
        {
			return $this->persistencia->inserir($projeto);
		}

        function atualizar(Projeto $projeto)
        {
			return $this->persistencia->atualizar($projeto);
		}

        function remover(Projeto $projeto)
        {
			return $this->persistencia->remover($projeto);
		}

        function obterTodos()
        {
			return $this->persistencia->obterTodos();
		}

        function obter($idProjeto)
        {
			return $this->persistencia->obterById($idProjeto);
		}

        function logar(Projeto $projeto)
        {
			return $this->persistencia->efetuarLogin($projeto);
		}

		function verificaCampos($itens) {
			$msg = array();

			$msg[] = empty($itens['idEdital']) ? " * Número do Edital " : null;
			$msg[] = empty($itens['titulo']) ? " * Título " : null;
			$msg[] = empty($itens['orientador']) ? " * Orientador " : null;
			
			$msg = array_filter($msg);
			$msg = empty($msg) ? false : $msg;

			return $msg;
		}
	}
?>