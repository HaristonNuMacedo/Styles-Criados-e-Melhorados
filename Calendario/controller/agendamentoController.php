<?php
include_once 'C:/xampp/htdocs/Calendario/dao/daoAgendamento.php';
include_once 'C:/xampp/htdocs/Calendario/model/agendamento_model.php';

class AgendamentoController {
    
    public function inserirData($data, $horario){

        $forne = new Agendamento();
        $forne->setDataAgenda($data);
        $forne->setHorario($horario);
        
        $daofORNE = new DaoAgendamento();
        return $daofORNE->inserirDataDAO($forne);
    }

}