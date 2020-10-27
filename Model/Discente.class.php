<?php
    class Discente extends Pessoa
    {
		private $idPessoa;
		private $idDiscente;
        private $matricula;
        private $campus;
        private $curso;
        private $cvLattes;

        public function __construct($itens)
        {
            parent::__construct($itens);
			$this->idPessoa = $itens['idPessoa'];
			$this->idDiscente = $itens['idDiscente'];
			$this->matricula = $itens['matricula'];
			$this->campus = $itens['campus'];
			$this->curso = $itens['curso'];
			$this->cvLattes = $itens['cvLattes'];
		}

        public function getIdPessoa()
        {
            return $this->idPessoa;
        }
    
        public function setIdPessoa($idPessoa)
        {
            $this->idPessoa = $idPessoa;
        }
    
        public function getIdDiscente()
        {
            return $this->idDiscente;
        }
    
        public function setIdDiscente($idDiscente)
        {
            $this->idDiscente = $idDiscente;
        }
    
        public function getMatricula()
        {
            return $this->matricula;
        }
    
        public function setMatricula($matricula)
        {
            $this->matricula = $matricula;
        }
    
        public function getCampus()
        {
            return $this->campus;
        }
    
        public function setCampus($campus)
        {
            $this->campus = $campus;
        }
    
        public function getCurso()
        {
            return $this->curso;
        }
    
        public function setCurso($curso)
        {
            $this->curso = $curso;
        }
    
        public function getCvLattes()
        {
            return $this->cvLattes;
        }
    
        public function setCvLattes($cvLattes)
        {
            $this->cvLattes = $cvLattes;
        }
	}
?>