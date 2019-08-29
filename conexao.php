<?php

    abstract class Conexao{

        #conexão com o banco de dados.

        protected function conectaBD(){
            try {
                $con = new PDO("mysql:host=localhost;dbname=triuh","root","");
                return $con; // retorna a conexão 
            } catch (PDOException $erro) {
                return $erro->getMessage(); // Retorna o erro;
            }
        }
    }
    ?>