<?php
    namespace infinity;

    class Factura{

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
            $sql = "INSERT INTO `factura`(`factura_cliente_id`, `factura_fehca`, `factura_subtotal`, `factura_iva`, `factura_total`) VALUES (:factura_cliente_id, CURDATE(), :factura_subtotal, :factura_iva, :factura_total)";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":factura_cliente_id" => $_params['factura_cliente_id'], 
                ":factura_subtotal" => $_params['factura_subtotal'], 
                ":factura_iva" => $_params['factura_iva'], 
                ":factura_total" => $_params['factura_total'], 
            );

            if($resultado->execute($_array))
                return $this->cn->lastInsertId();
            return false;
        }
        public function mostrar(){
            $sql = "SELECT factura_id, usuario.usuario_nombre, usuario.usuario_apellido, usuario.usuario_direccion, factura.factura_id, factura.factura_total  
            FROM factura
            INNER JOIN usuario ON usuario.usuario_id=factura.factura_cliente_id ORDER BY factura.factura_id DESC";

            $resultado=$this->cn->prepare($sql);
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }
        
        
        public function mostrar_factura_cliente($id){
            $sql = "SELECT factura_id, factura_fehca, usuario_nombre, usuario_apellido, factura_subtotal, factura_iva, factura_total
            FROM factura
            INNER JOIN usuario ON usuario_id=factura_cliente_id
            where usuario_id=:id ORDER BY factura_id DESC";

            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }
        
    }
