<?php
    namespace infinity;

    class Categoria{

        private $config;
        private $cn=null;

        public function __construct()
        {
            $this->config=parse_ini_file(__DIR__.'/../config.ini');
            $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        }
        public function registrar($_params){
            $sql = "INSERT INTO categoria (categoria_descripcion) values (:categoria_descripcion)";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":categoria_descripcion" => $_params['categoria_descripcion']
            );
            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function eliminar($id){
            $sql = "DELETE FROM categoria WHERE categoria_id=:id";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function mostrar(){
            $sql = "SELECT categoria.categoria_id, categoria.categoria_descripcion FROM categoria";
            $resultado=$this->cn->prepare($sql);
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }
    }
