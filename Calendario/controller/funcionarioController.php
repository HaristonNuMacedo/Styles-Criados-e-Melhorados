<?php
include_once 'C:/xampp/htdocs/Calendario/dao/daoAgendamento.php';
include_once 'C:/xampp/htdocs/Calendario/model/funcionario.php';

class FuncionarioController {
    
    public function listarFuncionarios(){
        $daoFunc = new DaoFuncionario();
        return $daoFunc->listarFuncionarioDAO();
    }

}