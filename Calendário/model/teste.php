<?php

class Teste {
    private $id;
    private $dataAgenda;

    /**
     * Get the value of idFornecedor
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of idFornecedor
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomeFornecedor
     */ 
    public function getDataAgenda()
    {
        return $this->dataAgenda;
    }

    /**
     * Set the value of nomeFornecedor
     *
     * @return  self
     */ 
    public function setDataAgenda($dataAgenda)
    {
        $this->dataAgenda = $dataAgenda;

        return $this;
    }
}

?>