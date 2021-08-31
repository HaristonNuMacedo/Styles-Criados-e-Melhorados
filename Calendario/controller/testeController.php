<?php
include_once 'C:/xampp/htdocs/Calendario/dao/daoTeste.php';
include_once 'C:/xampp/htdocs/Calendario/model/agendamento_model.php';

class TesteController {
    
    public function inserirData($data, $horario){

        $forne = new Agendamento();
        $forne->setDataAgenda($data);
        $forne->setHorario($horario);
        
        $daofORNE = new DaoData();
        return $daofORNE->inserirDataDAO($forne);
    }

}