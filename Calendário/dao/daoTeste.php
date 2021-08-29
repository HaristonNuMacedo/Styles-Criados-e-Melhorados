<?php
include_once 'C:/xampp/htdocs/TesteAgend/bd/Banco.php';
include_once 'C:/xampp/htdocs/TesteAgend/model/teste.php';

class DaoData {
    
    public function inserirDataDAO(teste $teste){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $data = $teste->getDataAgenda();
            try {
                $stmt = $conecta->prepare("insert into testedate values "
                        . "(null,?)");
                $stmt->bindParam(1, $data);
                $stmt->execute();
                
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

}
