<?php
    class Edital
    {
		private $idEdital;
        private $numero;
        private $nomePrograma;
        private $tipoProponente;
        private $bolsaOrientador;

        public function __construct($itens)
        {
            $this->idEdital = $itens['idEdital'];
			$this->numero = $itens['numero'];
			$this->nomePrograma = $itens['nomePrograma'];
			$this->tipoProponente = $itens['tipoProponente'];
			$this->bolsaOrientador = $itens['bolsaOrientador'];
		}

        public function getIdEdital()
        {
            return $this->idEdital;
        }
    
        public function setIdEdital($idEdital)
        {
            $this->idEdital = $idEdital;
        }
    
        public function getNumero()
        {
            return $this->numero;
        }
    
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
    
        public function getNomePrograma()
        {
            return $this->nomePrograma;
        }
    
        public function setNomePrograma($nomePrograma)
        {
            $this->nomePrograma = $nomePrograma;
        }
    
        public function getTipoProponente()
        {
            return $this->tipoProponente;
        }
    
        public function setTipoProponente($tipoProponente)
        {
            $this->tipoProponente = $tipoProponente;
        }
    
        public function getBolsaOrientador()
        {
            return $this->bolsaOrientador;
        }
    
        public function setBolsaOrientador($bolsaOrientador)
        {
            $this->bolsaOrientador = $bolsaOrientador;
        }
	}
?>