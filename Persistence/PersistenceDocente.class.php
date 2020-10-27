<?php
	require_once "DbConnection.class.php";
	require_once "DaoGenerico.interface.php";
	require_once "../../Model/Docente.class.php";

	class PersistenciaDocente implements DaoGenerico
	{
		function inserir($docente)
		{
            try 
            {
                $Conexao = DbConnection::retornaConexao();
                
                $sql = "INSERT INTO docente (id_pessoa, matricula_siape, campus_setor, cargo) 
                        VALUES (:id_pessoa, :matricula_siape, :campus_setor, :cargo);";
                
                $statement = $Conexao->prepare($sql);
                
                $statement->bindParam(":id_pessoa", $docente->getIdPessoa(), PDO::PARAM_INT);
                $statement->bindParam(":matricula_siape", $docente->getMatriculaSIAPE(), PDO::PARAM_STR);
                $statement->bindParam(":campus_setor", $docente->getCampusSetor(), PDO::PARAM_STR);
                $statement->bindParam(":cargo", $docente->getCargo(), PDO::PARAM_STR);
                
				$result = $statement->execute();
				// print_r($statement->errorInfo());

				return $result;
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
		}

		function atualizar($pessoa)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "UPDATE edital SET
						numero = :numero,
						nome_programa = :nome_programa,
						tipo_proponente = :tipo_proponente,
						bolsa_orientador = :bolsa_orientador
					WHERE id_edital = :id;";

			$statement = $Conexao->prepare($sql);

			$statement->bindParam(":id", $pessoa->getId_Edital(), PDO::PARAM_INT);
			$statement->bindParam(":numero", $pessoa->getNumero(), PDO::PARAM_STR);
			$statement->bindParam(":nome_programa", $pessoa->getNome_Programa(), PDO::PARAM_STR);
			$statement->bindParam(":tipo_proponente", $pessoa->getTipo_Proponente(), PDO::PARAM_STR);
			$statement->bindParam(":bolsa_orientador", $pessoa->getBolsa_Orientador(), PDO::PARAM_STR);

			$result = $statement->execute();
                
			return $result;
		}

		function remover($pessoa)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "DELETE FROM docente WHERE id_docente = :id;";
			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $pessoa->getIdDocente(), PDO::PARAM_INT);
			$result = $statement->execute();

			return $result;
		}

		function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_pessoa, nome, cpf, rg, email, endereco, bairro, cep, cidade, 
						estado, celular, foto, perfil, 
						id_docente, matricula_siape, campus_setor, cargo, 'P' AS perfil
					FROM pessoa INNER JOIN docente USING (id_pessoa) ";

			$statement = $Conexao->query($sql);
			$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

			$resultado = array();
			if($statement != false && !empty($statement)) {
				foreach($statement as $linha) {
					$itens = $linha;
					$itens[idPessoa] = $linha[id_pessoa];
					$itens[idDocente] = $linha[id_docente];
					$itens[matriculaSIAPE] = $linha[matricula_siape];
					$itens[campusSetor] = $linha[campus_setor];
					$resultado[] = new Docente($itens);
				}
			}
			return $resultado;
		}

		function obterById($id)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_pessoa,nome, cpf, rg, email, endereco, bairro, cep, cidade, 
						estado, celular, foto, perfil, 
						id_docente, matricula_siape, campus_setor, cargo 
					FROM docente INNER JOIN pessoa USING (id_pessoa)
					WHERE id_pessoa = :id;";

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $id, PDO::PARAM_INT);

			$statement->execute();
			// print_r($statement->errorInfo());

			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			if($resultado != false && !empty($resultado)) {
				$itens = $resultado;
				$resultado[idPessoa] = $resultado[id_pessoa];
				$resultado[idDocente] = $resultado[id_docente];
				$resultado[matriculaSIAPE] = $resultado[matricula_siape];
				$resultado[campusSetor] = $resultado[campus_setor];
				$resultado = new Docente($resultado);
			}
			
			return $resultado;
		}
	}
?>