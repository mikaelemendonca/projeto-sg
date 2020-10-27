<?php
    class Docente extends Pessoa
    {
		private $idPessoa;
		private $idDocente;
        private $matriculaSIAPE;
        private $campusSetor;
        private $cargo;

        public function __construct($itens)
        {
            parent::__construct($itens);
			$this->idPessoa = $itens['idPessoa'];
			$this->idDocente = $itens['idDocente'];
			$this->matriculaSIAPE = $itens['matriculaSIAPE'];
			$this->campusSetor = $itens['campusSetor'];
			$this->cargo = $itens['cargo'];
		}

        public function getIdPessoa()
        {
            return $this->idPessoa;
        }
    
        public function setIdPessoa($idPessoa)
        {
            $this->idPessoa = $idPessoa;
        }
    
        public function getIdDocente()
        {
            return $this->idDocente;
        }
    
        public function setIdDocente($idDocente)
        {
            $this->idDocente = $idDocente;
        }
    
        public function getMatriculaSIAPE()
        {
            return $this->matriculaSIAPE;
        }
    
        public function setMatriculaSIAPE($matriculaSIAPE)
        {
            $this->matriculaSIAPE = $matriculaSIAPE;
        }
    
        public function getCampusSetor()
        {
            return $this->campusSetor;
        }
    
        public function setCampusSetor($campusSetor)
        {
            $this->campusSetor = $campusSetor;
        }
    
        public function getCargo()
        {
            return $this->cargo;
        }
    
        public function setCargo($cargo)
        {
            $this->cargo = $cargo;
        }
	}
?>