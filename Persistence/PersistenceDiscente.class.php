<?php
	require_once "DbConnection.class.php";
	require_once "DaoGenerico.interface.php";
	require_once "../../Model/Discente.class.php";

	class PersistenciaDiscente implements DaoGenerico
	{
		function inserir($discente)
		{
            try 
            {
                $Conexao = DbConnection::retornaConexao();
                
                $sql = "INSERT INTO discente (id_pessoa, matricula, campus, curso, cv_lattes) 
                        VALUES (:id_pessoa, :matricula, :campus, :curso, :cv_lattes);";
                
                $statement = $Conexao->prepare($sql);
                
                $statement->bindParam(":id_pessoa", $discente->getIdPessoa(), PDO::PARAM_INT);
                $statement->bindParam(":matricula", $discente->getMatricula(), PDO::PARAM_STR);
                $statement->bindParam(":campus", $discente->getCampus(), PDO::PARAM_STR);
                $statement->bindParam(":curso", $discente->getCurso(), PDO::PARAM_STR);
                $statement->bindParam(":cv_lattes", $discente->getCvLattes(), PDO::PARAM_STR);
                
				$result = $statement->execute();
				// print_r($statement->errorInfo());

				return $result;
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
		}

		function atualizar($discente)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "UPDATE discente SET
						matricula = :matricula, 
						campus = :campus, 
						curso = :curso, 
						cv_lattes = :cv_lattes 
                    WHERE id_discente = id_discente;";
                
			$statement = $Conexao->prepare($sql);
			
			$statement->bindParam(":matricula", $discente->getMatricula(), PDO::PARAM_STR);
			$statement->bindParam(":campus", $discente->getCampus(), PDO::PARAM_STR);
			$statement->bindParam(":curso", $discente->getCurso(), PDO::PARAM_STR);
			$statement->bindParam(":cv_lattes", $discente->getCvLattes(), PDO::PARAM_STR);
			$statement->bindParam(":id_discente", $discente->getIdDiscente(), PDO::PARAM_INT);
			
			$result = $statement->execute();
			// print_r($statement->errorInfo());
                
			return $result;
		}

		function remover($pessoa)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "DELETE FROM discente WHERE id_discente = :id;";
			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $pessoa->getIdDiscente(), PDO::PARAM_INT);
			$result = $statement->execute();

			return $result;
		}

		function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_pessoa, nome, cpf, rg, email, endereco, bairro, cep, cidade, 
						estado, celular, foto, perfil, 
						id_discente, matricula, campus, curso, 'A' AS perfil 
					FROM pessoa INNER JOIN discente USING (id_pessoa) ";

			$statement = $Conexao->query($sql);
			$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

			$resultado = array();
			if($statement != false && !empty($statement)) {
				foreach($statement as $linha) {
					$itens = $linha;
					$itens[idPessoa] = $linha[id_pessoa];
					$itens[idDiscente] = $linha[id_discente];
					$resultado[] = new Discente($itens);
				}
			}
			return $resultado;
		}

		function obterById($id)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_pessoa, nome, cpf, rg, email, endereco, bairro, cep, cidade, 
						estado, celular, foto, perfil,
						id_discente, matricula, campus, curso, cv_lattes
					FROM discente INNER JOIN pessoa USING (id_pessoa)
					WHERE id_pessoa = :id;";

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $id, PDO::PARAM_INT);

			$statement->execute();
			// print_r($statement->errorInfo());

			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			if($resultado != false && !empty($resultado)) {
				$itens = $resultado;
				$resultado[idPessoa] = $resultado[id_pessoa];
				$resultado[idDiscente] = $resultado[id_discente];
				$resultado[cvLattes] = $resultado[cv_lattes];
				$resultado = new Discente($resultado);
			}
			
			return $resultado;
		}
	}
?>