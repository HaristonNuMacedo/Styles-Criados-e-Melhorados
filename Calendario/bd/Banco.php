<?php

class Conecta {
    
    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=dblivro", 
            "root", "root");
        }catch(Exception $ex){
            echo "<script>alert('Erro na conexão com o "
                . "banco de dados.')</script>";
        }
        return $pdo;
    }
}

/* tabela testedate

id int(11) primary key auto_increment,
data DATE not null,
horario time not null,
data_registro dateTime not null;

https://www.php.net/manual/pt_BR/function.date.php
*/