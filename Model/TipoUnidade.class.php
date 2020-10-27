<?php
	class TipoUnidade{
		private $codigo;
		private $descricao;

		function __construct($codigo = null, $descricao = null){
			$this->codigo = $codigo;
			$this->descricao = $descricao;
		}

		function getCodigo(){
			return $this->codigo;
		}

		function getDescricao(){
			return $this->descricao;
		}

		function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}
	}
?>