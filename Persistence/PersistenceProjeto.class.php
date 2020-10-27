<?php
	require_once "DbConnection.class.php";
	require_once "DaoGenerico.interface.php";
	require_once "../../Model/Projeto.class.php";

	class PersistenciaProjeto implements DaoGenerico
	{
		function inserir($projeto)
		{
            try 
            {
                $Conexao = DbConnection::retornaConexao();
                
                $sql = "INSERT INTO projeto (titulo, id_edital, orientador) 
                        VALUES (:titulo, :id_edital, :orientador);";
                
                $statement = $Conexao->prepare($sql);
                
                $statement->bindParam(":titulo", $projeto->getTitulo(), PDO::PARAM_STR);
                $statement->bindParam(":id_edital", $projeto->getIdEdital(), PDO::PARAM_STR);
                $statement->bindParam(":orientador", $projeto->getOrientador(), PDO::PARAM_STR);
                
				$result = $statement->execute();
				// print_r($statement->errorInfo());
				// print_r($statement->debugDumpParams());
                
                return $result;
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
		}

		function atualizar($projeto)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "UPDATE projeto SET
						titulo = :titulo,
						num_edital = :num_edital,
						orientador = :orientador
					WHERE id_projeto = :id;";

			$statement = $Conexao->prepare($sql);

			$statement->bindParam(":id", $projeto->getId_Edital(), PDO::PARAM_INT);
			$statement->bindParam(":titulo", $projeto->getTitulo(), PDO::PARAM_STR);
            $statement->bindParam(":num_edital", $projeto->getNumEdital(), PDO::PARAM_STR);
            $statement->bindParam(":orientador", $projeto->getOrientador(), PDO::PARAM_STR);
            
			$result = $statement->execute();
                
			return $result;
		}

		function remover($projeto)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "DELETE FROM projeto WHERE id_projeto = :id;";

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $projeto->getId_Edital(), PDO::PARAM_INT);

			$statement->execute();
		}

		function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_projeto, titulo, num_edital, orientador
					FROM projeto ORDER BY id_projeto DESC";

			$statement = $Conexao->query($sql);
			$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

			$resultado = array();
			if($statement != false && !empty($statement)) {
				foreach($statement as $linha) {
					$itens[id_projeto] = $linha[id_projeto];
					$itens[titulo] = utf8_decode($linha[titulo]);
					$itens[numEdital] = utf8_decode($linha[nome_programa]);
					$itens[orientador] = utf8_decode($linha[orientador]);
					$resultado[] = new Projeto($itens);
				}
			}
			return $resultado;
		}

		function obterById($id)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_projeto, titulo, num_edital, orientador
                    FROM projeto 
                    WHERE id_projeto = :id;";

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $id, PDO::PARAM_INT);

			$statement->execute();
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($resultado != false && !empty($resultado)) {
				$itens[id_projeto] = $resultado[id_projeto];
                $itens[titulo] = utf8_decode($resultado[titulo]);
                $itens[numEdital] = utf8_decode($resultado[nome_programa]);
                $itens[orientador] = utf8_decode($resultado[orientador]);
                $resultado = new Projeto($itens);
			}

			return $resultado;
		}
	}
?>