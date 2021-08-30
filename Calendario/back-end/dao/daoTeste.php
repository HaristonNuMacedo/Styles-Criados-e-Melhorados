<?php
include_once 'C:/xampp/htdocs/Calendario/back-end/bd/Banco.php';
include_once 'C:/xampp/htdocs/Calendario/back-end/model/agendamento_model.php';

class DaoData {
    
    public function inserirDataDAO(Agendamento $agend){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $data = $agend->getDataAgenda();
            $horario = $agend->getHorario();
            $dateTime = $agend->getDateTime();

            // Verificando se a data é UTC.
            $defaultTimeZone='UTC';
            if(date_default_timezone_get()!=$defaultTimeZone) date_default_timezone_set($defaultTimeZone);

            // Função para trabalhar a data com o código abaxio passando ela para GMT e 
            // colocando tipos de formatação de data.
            function _date($format="r", $timestamp=false, $timezone=false) {
                $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
                $gmtTimezone = new DateTimeZone('GMT');
                $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
                $offset = $userTimezone->getOffset($myDateTime);
                return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
            }

            /* Chamando a função _date para dentro de uma variável e depois inserindo uma data 
                automática no Banco juntamente com os outros dados */
            $dateTime = _date("Y-m-d H:i:s", false, 'America/Sao_Paulo');

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
