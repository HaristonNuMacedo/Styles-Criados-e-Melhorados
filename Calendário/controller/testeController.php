<?php
include_once 'C:/xampp/htdocs/TesteAgend/dao/daoTeste.php';
include_once 'C:/xampp/htdocs/TesteAgend/model/teste.php';

class TesteController {
    
    public function inserirData($data){

        $forne = new Teste();
        $forne->setDataAgenda($data);
        
        $daofORNE = new DaoData();
        return $daofORNE->inserirDataDAO($forne);
    }

}