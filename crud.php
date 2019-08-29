<?php

    include("Conexao.php");

    class Crud extends Conexao{
        private $crud;
        private $contador;

        #preparação das declarativas.
        private function prepare($query, $parametros){
            $this->contador = count($parametros);
            $this->crud = $this->conectaBD()->prepare($query);

            if($this->contador > 0){
                for($i = 0; $i < $this->contador; $i++){
                    $this->crud->bindValue($i + 1, $parametros[$i]);
                }
            }
            $this->crud->execute();
        }

        #funções do crud.
        public function insert($tabela, $campos ,$condicao, $parametros){
            $this->prepare("insert into {$tabela} ($campos) values ($condicao)", $parametros);
            return $this->crud;
        }
        public function select($campos, $tabela, $condicao, $parametros){
            $this->prepare("select {$campos} from {$tabela} {$condicao}", $parametros);
            return $this->crud;
        }
        public function update($tabela, $campos, $condicao, $parametros){
            $this->prepare("update {$tabela} set {$campos} {$condicao}", $parametros);
            return $this->crud;
        }
        public function delete($tabela, $condicao, $parametros){
            $this->prepare("delete from {$tabela} $condicao", $parametros);
            return $this->crud;
        }
    }