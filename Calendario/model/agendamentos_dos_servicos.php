<?php

class Servicos {
    private $agendamentos_id;
    private $servicos_id;
    private $funcionarios_id;


    /**
     * Get the value of agendamentos_id
     */ 
    public function getAgendamentos_id()
    {
        return $this->agendamentos_id;
    }

    /**
     * Set the value of agendamentos_id
     *
     * @return  self
     */ 
    public function setAgendamentos_id($agendamentos_id)
    {
        $this->agendamentos_id = $agendamentos_id;

        return $this;
    }

    /**
     * Get the value of servicos_id
     */ 
    public function getServicos_id()
    {
        return $this->servicos_id;
    }

    /**
     * Set the value of servicos_id
     *
     * @return  self
     */ 
    public function setServicos_id($servicos_id)
    {
        $this->servicos_id = $servicos_id;

        return $this;
    }

    /**
     * Get the value of funcionarios_id
     */ 
    public function getFuncionarios_id()
    {
        return $this->funcionarios_id;
    }

    /**
     * Set the value of funcionarios_id
     *
     * @return  self
     */ 
    public function setFuncionarios_id($funcionarios_id)
    {
        $this->funcionarios_id = $funcionarios_id;

        return $this;
    }
}