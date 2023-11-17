<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
    session_start();

    class Empresa{

        protected $db;
        protected $table = "empresas";

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }
    }
?>