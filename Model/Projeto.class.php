<?php
    class Projeto
    {
		private $idProjeto;
        private $titulo;
        private $idEdital;
        private $orientador;
        private $coOrientador;
        private $bolsista;
        private $voluntarioI;
        private $voluntarioII;
        private $resumo;
        private $areaPesquisa;
        private $subArea;
        private $cronogramaExec;
        private $publicacoes;
        private $infoAdd;
        private $resultados;
        private $statusRelatorio;
        private $statusProjeto;

        public function __construct($itens)
        {
            $this->idProjeto = $itens['idProjeto'];
			$this->titulo = $itens['titulo'];
			$this->idEdital = $itens['idEdital'];
			$this->orientador = $itens['orientador'];
			$this->coOrientador = $itens['coOrientador'];
			$this->bolsista = $itens['bolsista'];
			$this->voluntarioI = $itens['voluntarioI'];
			$this->voluntarioI = $itens['voluntarioI'];
			$this->voluntarioII = $itens['voluntarioII'];
			$this->resumo = $itens['resumo'];
			$this->areaPesquisa = $itens['areaPesquisa'];
			$this->subArea = $itens['subArea'];
			$this->cronogramaExec = $itens['cronogramaExec'];
			$this->publicacoes = $itens['publicacoes'];
			$this->infoAdd = $itens['infoAdd'];
			$this->resultados = $itens['resultados'];
			$this->statusRelatorio = $itens['statusRelatorio'];
			$this->statusProjeto = $itens['statusProjeto'];
        }
        
        public function getIdProjeto()
        {
            return $this->idProjeto;
        }
    
        public function setIdProjeto($idProjeto)
        {
            $this->idProjeto = $idProjeto;
        }
    
        public function getTitulo()
        {
            return $this->titulo;
        }
    
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }
    
        public function getIdEdital()
        {
            return $this->idEdital;
        }
    
        public function setIdEdital($idEdital)
        {
            $this->idEdital = $idEdital;
        }
    
        public function getOrientador()
        {
            return $this->orientador;
        }
    
        public function setOrientador($orientador)
        {
            $this->orientador = $orientador;
        }
    
        public function getCoOrientador()
        {
            return $this->coOrientador;
        }
    
        public function setCoOrientador($coOrientador)
        {
            $this->coOrientador = $coOrientador;
        }
    
        public function getBolsista()
        {
            return $this->bolsista;
        }
    
        public function setBolsista($bolsista)
        {
            $this->bolsista = $bolsista;
        }
    
        public function getVoluntarioI()
        {
            return $this->voluntarioI;
        }
    
        public function setVoluntarioI($voluntarioI)
        {
            $this->voluntarioI = $voluntarioI;
        }
    
        public function getVoluntarioII()
        {
            return $this->voluntarioII;
        }
    
        public function setVoluntarioII($voluntarioII)
        {
            $this->voluntarioII = $voluntarioII;
        }
    
        public function getResumo()
        {
            return $this->resumo;
        }
    
        public function setResumo($resumo)
        {
            $this->resumo = $resumo;
        }
    
        public function getAreaPesquisa()
        {
            return $this->areaPesquisa;
        }
    
        public function setAreaPesquisa($areaPesquisa)
        {
            $this->areaPesquisa = $areaPesquisa;
        }
    
        public function getSubArea()
        {
            return $this->subArea;
        }
    
        public function setSubArea($subArea)
        {
            $this->subArea = $subArea;
        }
    
        public function getCronogramaExec()
        {
            return $this->cronogramaExec;
        }
    
        public function setCronogramaExec($cronogramaExec)
        {
            $this->cronogramaExec = $cronogramaExec;
        }
    
        public function getPublicacoes()
        {
            return $this->publicacoes;
        }
    
        public function setPublicacoes($publicacoes)
        {
            $this->publicacoes = $publicacoes;
        }
    
        public function getInfoAdd()
        {
            return $this->infoAdd;
        }
    
        public function setInfoAdd($infoAdd)
        {
            $this->infoAdd = $infoAdd;
        }
    
        public function getResultados()
        {
            return $this->resultados;
        }
    
        public function setResultados($resultados)
        {
            $this->resultados = $resultados;
        }
    
        public function getStatusRelatorio()
        {
            return $this->statusRelatorio;
        }
    
        public function setStatusRelatorio($statusRelatorio)
        {
            $this->statusRelatorio = $statusRelatorio;
        }
        public function getStatusProjeto()
        {
            return $this->statusProjeto;
        }
    
        public function setStatusProjeto($statusProjeto)
        {
            $this->statusProjeto = $statusProjeto;
        }
	}
?>