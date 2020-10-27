<?php
	require_once 'DbConnection.class.php';
	require_once 'DaoGenerico.interface.php';
	require_once '../../Model/TipoUnidade.class.php';

	class PersistenciaTipoUnidade implements DaoGenerico
	{
		private function inserir($tipoUnidade)
		{
			$Conexao = DbConnection::retornaConexao();
			
			$sql = 'INSERT INTO TB_TIPO_UNIDADE (descricao) VALUES (:descricao);';
			
			$statement = $Conexao->prepare($sql);
			
			$statement->bindValue(':descricao', $tipoUnidade->getDescricao(), PDO::PARAM_STR);
			
			$statement->execute();
			DbConnection::encerraConexao();
		}

		private function atualizar($tipoUnidade)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'UPDATE TB_TIPO_UNIDADE SET
						descricao = :descricao
					WHERE id_tipo_unidade = :codigo;';

			$statement = $Conexao->prepare($sql);

			$statement->bindValue(':descricao', $tipoUnidade->getDescricao(), PDO::PARAM_STR);
			$statement->bindValue(':codigo', $tipoUnidade->getCodigo(), PDO::PARAM_INT);

			$statement->execute();
			DbConnection::encerraConexao();
		}

		private function remover($tipoUnidade)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'DELETE FROM TB_TIPO_UNIDADE WHERE id_tipo_unidade = :codigo;';

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(':codigo', $tipoUnidade->getCodigo(), PDO::PARAM_INT);

			$statement->execute();
			DbConnection::encerraConexao();
		}

		private function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'SELECT
						id_tipo_unidade as Codigo,
						descricao as Descricao
					FROM TB_TIPO_UNIDADE;';

			$statement = $Conexao->query($sql);
			$statement = $statement->fetchAll(PDO::FETCH_ASSOC);
			$resultado = null;
			if($statement != false && !empty($statement))
				foreach($statement as $linha)
					$resultado[] = new TipoUnidade($linha['Codigo'], $linha['Descricao']);

			return $resultado;
		}

		private function obterById($IdTipoUnidade)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'SELECT
						id_tipo_unidade as Codigo,
						descricao as Descricao
					FROM TB_TIPO_UNIDADE
					WHERE id_tipo_unidade = :codigo;';

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(':codigo', $IdTipoUnidade, PDO::PARAM_INT);

			$statement->execute();
			DbConnection::encerraConexao();
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			if($resultado != false && !empty($resultado))
				$resultado = new TipoUnidade($resultado['Codigo'], $resultado['Descricao']);
			else
				$resultado = null;

			return $resultado;
		}
	}
?>