<?php
include_once 'C:/xampp/htdocs/Calendario/dao/daoAgendamento.php';
include_once 'C:/xampp/htdocs/Calendario/model/agendamento_model.php';

class AgendamentoController {
    
    public function inserirDataAgendamento($data, $horario){

        $forne = new Agendamento();
        $forne->setDataAgenda($data);
        $forne->setHorario($horario);
       //$forne->setDateTime($dateTime);
        
        $daofORNE = new DaoAgendamento();
        return $daofORNE->inserirDataDAO($forne);
    }

}