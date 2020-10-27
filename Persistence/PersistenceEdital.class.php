<?php
	require_once 'DbConnection.class.php';
	require_once 'DaoGenerico.interface.php';
	require_once '../../Model/Edital.class.php';

	class PersistenciaEdital implements DaoGenerico
	{
		function inserir($edital)
		{
            try 
            {
                $Conexao = DbConnection::retornaConexao();
                
                $sql = 'INSERT INTO edital (numero, nome_programa, tipo_proponente, bolsa_orientador) 
                        VALUES (:numero, :nome_programa, :tipo_proponente, :bolsa_orientador);';
                
                $statement = $Conexao->prepare($sql);
                
                $statement->bindParam(':numero', $edital->getNumero(), PDO::PARAM_STR);
                $statement->bindParam(':nome_programa', $edital->getNome_Programa(), PDO::PARAM_STR);
                $statement->bindParam(':tipo_proponente', $edital->getTipo_Proponente(), PDO::PARAM_STR);
                $statement->bindParam(':bolsa_orientador', $edital->getBolsa_Orientador(), PDO::PARAM_STR);
                
                $result = $statement->execute();
                
                return $result;
                
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            } 
		}

		function atualizar($edital)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'UPDATE edital SET
						numero = :numero,
						nome_programa = :nome_programa,
						tipo_proponente = :tipo_proponente,
						bolsa_orientador = :bolsa_orientador
					WHERE id_edital = :id;';

			$statement = $Conexao->prepare($sql);

			$statement->bindParam(':id', $edital->getId_Edital(), PDO::PARAM_INT);
			$statement->bindParam(':numero', $edital->getNumero(), PDO::PARAM_STR);
			$statement->bindParam(':nome_programa', $edital->getNomePrograma(), PDO::PARAM_STR);
			$statement->bindParam(':tipo_proponente', $edital->getTipoProponente(), PDO::PARAM_STR);
			$statement->bindParam(':bolsa_orientador', $edital->getBolsaOrientador(), PDO::PARAM_STR);

			$result = $statement->execute();
                
			return $result;
		}

		function remover($edital)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'DELETE FROM edital WHERE id_edital = :id;';

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(':id', $edital->getId_Edital(), PDO::PARAM_INT);

			$statement->execute();
		}

		function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$tecnico = utf8_encode("Técnico Administrativo");
			$nao = utf8_encode("Não");

			$sql = "SELECT id_edital, numero, nome_programa, 
						CASE WHEN tipo_proponente = '1' THEN 'Docente' 
							 WHEN tipo_proponente = '2' THEN '$tecnico'  
							 WHEN tipo_proponente = '3' THEN 'Docente e $tecnico'  
						ELSE '' END AS tipo_proponente, 
						CASE WHEN bolsa_orientador = 'S' THEN 'Sim'
							 WHEN bolsa_orientador = 'N' THEN '$nao'
						END AS bolsa_orientador
					FROM edital ORDER BY id_edital DESC";

			$statement = $Conexao->query($sql);
			$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

			$resultado = array();
			if($statement != false && !empty($statement)) {
				foreach($statement as $linha) {
					$itens = $linha;
					$itens['idEdital'] = $linha['id_edital'];
					$itens['numero'] = utf8_decode($linha['numero']);
					$itens['nomePrograma'] = utf8_decode($linha['nome_programa']);
					$itens['tipoProponente'] = utf8_decode($linha['tipo_proponente']);
					$itens['bolsaOrientador'] = utf8_decode($linha['bolsa_orientador']);
					$resultado[] = new Edital($itens);
				}
			}
			return $resultado;
		}

		function obterById($id)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = 'SELECT id_edital, numero, nome_programa, tipo_proponente, bolsa_orientador
					FROM edital
					WHERE id_edital = :id;';

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(':id', $id, PDO::PARAM_INT);

			$statement->execute();
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($resultado != false && !empty($resultado)) {
				$itens = $resultado;
				$itens['id_edital'] = $resultado['id_edital'];
				$itens['nomePrograma'] = utf8_encode($resultado['nome_programa']);
				$itens['tipoProponente'] = utf8_encode($resultado['tipo_proponente']);
				$itens['bolsaOrientador'] = utf8_encode($resultado['bolsa_orientador']);
				$resultado = new Edital($itens);
			}

			return $resultado;
		}
	}
?>