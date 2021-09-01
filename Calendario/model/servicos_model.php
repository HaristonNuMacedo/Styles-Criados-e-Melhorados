<?php

class Servicos {
    private $id;
    private $nomeServico;
    private $valor;
    private $tempoServico;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomeServico
     */ 
    public function getNomeServico()
    {
        return $this->nomeServico;
    }

    /**
     * Set the value of nomeServico
     *
     * @return  self
     */ 
    public function setNomeServico($nomeServico)
    {
        $this->nomeServico = $nomeServico;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of tempoServico
     */ 
    public function getTempoServico()
    {
        return $this->tempoServico;
    }

    /**
     * Set the value of tempoServico
     *
     * @return  self
     */ 
    public function setTempoServico($tempoServico)
    {
        $this->tempoServico = $tempoServico;

        return $this;
    }
}