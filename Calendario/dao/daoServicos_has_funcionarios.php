<?php
include_once 'C:/xampp/htdocs/Calendario/bd/banco.php';
include_once 'C:/xampp/htdocs/Calendario/model/servicos_model.php';
include_once 'C:/xampp/htdocs/Calendario/model/servicos_has_funcionarios.php';
include_once 'C:/xampp/htdocs/Calendario/model/funcionario.php';

class DaoServicos_agendamentos {
    
    public function listarServicos_has_funcionariosDAO(){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $servFunc = new Servicos_has_funcionarios();
        
        if ($conecta) {
            try{
                $serag = $conecta->query("select * from servicos_has_funcionarios left join servicos on servicos.id = servicos_has_funcionarios.servicos_id left join funcionarios on funcionarios.id = servicos_has_funcionarios.funcionarios_id");
                $lista = array();
                $a = 0;
                if($serag->execute()){
                    if($serag->rowCount() > 0){
                        while($linha = $serag->fetch(PDO::FETCH_OBJ)){
                            
                            //$servFunc->setServicos_id($linha->servicos_id);
                            //$servFunc->setFuncionarios_id($linha->funcionarios_id);

                            $servicos = new Servicos();
                            $servicos->setIdServico($linha->id);
                            $servicos->setNomeServico($linha->nome);
                            $servicos->setValor($linha->valor);
                            $servicos->setTempoServico($linha->tempo_estimado);

                            $func = new Funcionario();
                            $func->setIdFuncionario($linha->id);
                            $func->setNome($linha->nome);
                            $func->setCargo($linha->cargo);
                            $func->setTelefone($linha->telefone);
                            $func->setEmail($linha->email);
                            $func->setSenha($linha->senha);

                            $servFunc->setServicos($servicos);
                            $servFunc->setFuncionarios($func);
                           
                            $lista[$a] = $servFunc;
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

    public function pesquisarServicos_has_funcionariosDAO($id){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $servFunc = new Servicos_has_funcionarios();
        
        if ($conecta) {
            try{
                $serag = $conecta->query("select * from servicos_has_funcionarios left join servicos on servicos.id = servicos_has_funcionarios.servicos_id left join funcionarios on funcionarios.id = servicos_has_funcionarios.funcionarios_id "
                    ."where servicos_has_funcionarios.funcionarios_id = ?");
                $serag->bindParam(1, $id);
                if($serag->execute()){
                    if($serag->rowCount() > 0){
                        while($linha = $serag->fetch(PDO::FETCH_OBJ)) {
                            
                            //$servFunc->setServicos_id($linha->servicos_id);
                            //$servFunc->setFuncionarios_id($linha->funcionarios_id);

                            $servicos = new Servicos();
                            $servicos->setIdServico($linha->id);
                            $servicos->setNomeServico($linha->nome);
                            $servicos->setValor($linha->valor);
                            $servicos->setTempoServico($linha->tempo_estimado);

                            $func = new Funcionario();
                            $func->setIdFuncionario($linha->id);
                            $func->setNome($linha->nome);
                            $func->setCargo($linha->cargo);
                            $func->setTelefone($linha->telefone);
                            $func->setEmail($linha->email);
                            $func->setSenha($linha->senha);

                            $servFunc->setServicos($servicos);
                            $servFunc->setFuncionarios($func);
                           
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;

        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
            URL='http://localhost/Calendario/agendamento.php\">";
        }
        return $servFunc;
    }

}
