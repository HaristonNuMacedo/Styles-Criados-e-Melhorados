<?php

class Conecta {
    
    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=dbbarbearia", 
            "root", "root");
        }catch(Exception $ex){
            echo "<script>alert('Erro na conexão com o "
                . "banco de dados.')</script>";
        }
        return $pdo;
    }
}


// __Tabela feita para testes dos Dia Escolhido no calendário e o horário, juntamente
// com a data de registro que é inserida automaticamente para o banco.

/* 
table testedate

id int(11) primary key auto_increment,
data DATE not null,
horario time not null,
data_registro dateTime not null;

https://www.php.net/manual/pt_BR/function.date.php
*/