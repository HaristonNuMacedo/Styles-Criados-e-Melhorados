<?php
include_once 'C:/xampp/htdocs/Calendario/dao/daoAgendamento.php';
include_once 'C:/xampp/htdocs/Calendario/model/servicos_model.php';

class ServicosController {
    
    public function listarServicos(){
        $daoServico = new DaoServicos();
        return $daoServico->listarServicosDAO();
    }

}