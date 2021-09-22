<?php
include_once 'C:/xampp/htdocs/Calendario/bd/banco.php';
include_once 'C:/xampp/htdocs/Calendario/model/funcionario.php.php';

class DaoFuncionario {
    
    public function listarFuncionarioDAO(){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try{
                $serag = $conecta->query("select * from funcionarios");
                $lista = array();
                $a = 0;
                if($serag->execute()){
                    if($serag->rowCount() > 0){
                        while($linha = $serag->fetch(PDO::FETCH_OBJ)){
                            $func = new Funcionario();
                            $func->setIdFuncionario($linha->id);
                            $func->setNome($linha->nome);
                            $func->setCargo($linha->cargos);
                            $func->setTelefone($linha->telefone);
                            $func->setEmail($linha->email);
                            $func->setSenha($linha->senha);
                            $func->setCpf($linha->cpf);
                           
                            $lista[$a] = $func;
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
