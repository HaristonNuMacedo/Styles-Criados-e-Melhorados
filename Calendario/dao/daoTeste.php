<?php
include_once 'C:/xampp/htdocs/Calendario/bd/Banco.php';
include_once 'C:/xampp/htdocs/Calendario/model/teste.php';

class DaoData {
    
    public function inserirDataDAO(teste $teste){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $data = $teste->getDataAgenda();
            $horario = $teste->getHorario();
            $dateTime = $teste->getDateTime();
            //$dateTime = date('Y-m-d H:i:s');
            $defaultTimeZone='UTC';
            if(date_default_timezone_get()!=$defaultTimeZone) date_default_timezone_set($defaultTimeZone);

            // somewhere in the code
            function _date($format="r", $timestamp=false, $timezone=false) {
                $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                $gmtTimezone = new DateTimeZone('GMT');
                $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
                $offset = $userTimezone->getOffset($myDateTime);
                return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
            }

            /* Example */
            $dateTime = _date("Y-m-d h:i:s", false, 'America/Sao_Paulo');

            try {
                $stmt = $conecta->prepare("insert into testedate values "
                        . "(null, ?, ?, '$dateTime')");
                $stmt->bindParam(1, $data);
                $stmt->bindParam(2, $horario);
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
