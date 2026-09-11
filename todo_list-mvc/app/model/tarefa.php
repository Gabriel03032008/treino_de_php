<?php

    class Tarefa{

        private $conn;

        public function __construct(){
            $db = new Database();
            $this -> conn = $db->conectar();
        }

    }

?>