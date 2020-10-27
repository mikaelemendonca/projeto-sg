<?php
	class DbConnection{
		private static $Conexao;

		static function retornaConexao()
		{
			$ParametrosConexao = parse_ini_file('config_bd.ini');
			$StringConexao = "pgsql:host=$ParametrosConexao[Host];dbname=$ParametrosConexao[Banco];user=$ParametrosConexao[Usuario];password=$ParametrosConexao[Senha]";
			
			try
			{
				self::$Conexao = new PDO($StringConexao);
				self::$Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			} catch(PDOException $e)
			{
				echo 'Conexão Falhou: ' . $e->getMessage();
			}
			return self::$Conexao;
		}

		static function encerraConexao()
		{
			self::$Conexao = null;
		}
	}
?>