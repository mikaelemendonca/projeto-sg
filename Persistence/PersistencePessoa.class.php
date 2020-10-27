<?php
	require_once "DbConnection.class.php";
	require_once "DaoGenerico.interface.php";
	require_once "../../Model/Pessoa.class.php";

	class PersistenciaPessoa implements DaoGenerico
	{
		function inserir($pessoa)
		{
            try 
            {
                $Conexao = DbConnection::retornaConexao();
                
                $sql = "INSERT INTO pessoa (nome, cpf, rg, email, endereco, bairro, cep, cidade, 
							estado, celular, login, senha, foto, perfil) 
                        VALUES (:nome, :cpf, :rg, :email, :endereco, :bairro, :cep, :cidade, 
							:estado, :celular, :login, :senha, :foto, :perfil) 
						RETURNING id_pessoa";
                
                $statement = $Conexao->prepare($sql);
                
                $statement->bindParam(":nome", $pessoa->getNome(), PDO::PARAM_STR);
                $statement->bindParam(":cpf", $pessoa->getCPF(), PDO::PARAM_STR);
                $statement->bindParam(":rg", $pessoa->getRG(), PDO::PARAM_STR);
                $statement->bindParam(":endereco", $pessoa->getEndereco(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":bairro", $pessoa->getBairro(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":cep", $pessoa->getCEP(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":cidade", $pessoa->getCidade(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":estado", $pessoa->getEstado(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":email", $pessoa->getEmail(), PDO::PARAM_STR);
                $statement->bindParam(":celular", $pessoa->getCelular(), PDO::PARAM_STR);
                $statement->bindParam(":login", $pessoa->getLogin(), PDO::PARAM_STR);
                $statement->bindParam(":senha", $pessoa->getSenha(), PDO::PARAM_STR);
                $statement->bindParam(":foto", $pessoa->getFoto(), PDO::PARAM_STR | PDO::PARAM_NULL);
                $statement->bindParam(":perfil", $pessoa->getPerfil(), PDO::PARAM_STR);
                
				$statement->execute();
				print_r($statement->errorInfo());
				print_r($statement->debugDumpParams());
				$resultado = $statement->fetch(PDO::FETCH_ASSOC);

				if($resultado != false && !empty($resultado)) 
					$id = $resultado['id_pessoa'];
					
				return $id;
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
		}

		function atualizar($pessoa)
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "UPDATE pessoa SET
						nome = :nome, 
						cpf = :cpf, 
						rg = :rg, 
						endereco = :endereco, 
						bairro = :bairro, 
						cep = :cep, 
						cidade = :cidade, 
						estado = :estado, 
						email = :email, 
						celular = :celular, 
						foto = :foto, 
						perfil = :perfil 
                    WHERE id_pessoa = :id";

			$statement = $Conexao->prepare($sql);

			$statement->bindParam(":id", $pessoa->getIdPessoa(), PDO::PARAM_INT);
			$statement->bindParam(":nome", $pessoa->getNome(), PDO::PARAM_STR);
			$statement->bindParam(":cpf", $pessoa->getCPF(), PDO::PARAM_STR);
			$statement->bindParam(":rg", $pessoa->getRG(), PDO::PARAM_STR);
			$statement->bindParam(":endereco", $pessoa->getEndereco(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":bairro", $pessoa->getBairro(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":cep", $pessoa->getCEP(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":cidade", $pessoa->getCidade(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":estado", $pessoa->getEstado(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":email", $pessoa->getEmail(), PDO::PARAM_STR);
			$statement->bindParam(":celular", $pessoa->getCelular(), PDO::PARAM_STR);
			$statement->bindParam(":foto", $pessoa->getFoto(), PDO::PARAM_STR | PDO::PARAM_NULL);
			$statement->bindParam(":perfil", $pessoa->getPerfil(), PDO::PARAM_STR);
				
			$result = $statement->execute();
			// print_r($statement->errorInfo());
                
			return $result;
		}

		function remover($pessoa)
		{
			$Conexao = DbConnection::retornaConexao();
			
			$sql = "DELETE FROM pessoa WHERE id_pessoa = :id;";
			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":id", $pessoa->getIdPessoa(), PDO::PARAM_INT);
			
			return $statement->execute();
		}

		function obterTodos()
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT id_pessoa, nome, cpf, rg, email, endereco, bairro, cep, cidade, 
						estado, celular, perfil,
						CASE WHEN id_pessoa IN (SELECT id_pessoa FROM discente) THEN 'A'
						ELSE 'P' END AS perfil
					FROM pessoa ";

			$statement = $Conexao->query($sql);
			// print_r($statement->errorInfo());

			$nlinhas = $statement->fetchColumn();
			if ($nlinhas > 0) {
				$statement = $statement->fetchAll(PDO::FETCH_ASSOC);
				
				$resultado = array();
				if($statement != false && !empty($statement)) {
					foreach($statement as $linha) {
						$itens = $linha;
						$itens['idPessoa'] = $linha['id_pessoa'];
						$resultado[] = new Pessoa($itens);
					}
				}
			}
			return $resultado;
		}

		function obterById($id)
		{
			
		}

		function efetuarLogin($pessoa) 
		{
			$Conexao = DbConnection::retornaConexao();

			$sql = "SELECT senha FROM pessoa WHERE login = :login";

			$statement = $Conexao->prepare($sql);
			$statement->bindValue(":login", $pessoa->getLogin(), PDO::PARAM_STR);

			$statement->execute();
			$resultado = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($resultado != false && !empty($resultado)) {
				if (password_verify($pessoa->getSenha(), $resultado[senha]))
					return true;
				return false;
			}
		}
	}
?>