<?php

class Servicos_has_funcionarios {
    private $servicos;
    private $funcionarios;

    /**
     * Get the value of servicos
     */ 
    public function getServicos()
    {
        return $this->servicos;
    }

    /**
     * Set the value of servicos
     *
     * @return  self
     */ 
    public function setServicos($servicos)
    {
        $this->servicos = $servicos;

        return $this;
    }

    /**
     * Get the value of funcionarios
     */ 
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    /**
     * Set the value of funcionarios
     *
     * @return  self
     */ 
    public function setFuncionarios($funcionarios)
    {
        $this->funcionarios = $funcionarios;

        return $this;
    }
}