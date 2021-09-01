<?php
include_once 'C:/xampp/htdocs/Calendario/bd/banco.php';
include_once 'C:/xampp/htdocs/Calendario/model/servicos_model.php';

class DaoServicos {
    
    public function listarServicosDAO(){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try{
                $serag = $conecta->query("select * from servicos order by servicos.id");
                $lista = array();
                $a = 0;
                if($serag->execute()){
                    if($serag->rowCount() > 0){
                        while($linha = $serag->fetch(PDO::FETCH_OBJ)){
                            $servicos = new Servicos();
                            $servicos->setId($linha->id);
                            $servicos->setNomeServico($linha->nome);
                            $servicos->setValor($linha->valor);
                            $servicos->setTempoServico($linha->tempo_estimado);
                           
                            $lista[$a] = $servicos;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;
            return $lista;
        }
    
    }

}
