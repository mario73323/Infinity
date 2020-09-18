<?php
    namespace infinity;

    class Detalle_factura{

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
            $sql = "INSERT INTO `detalle_pedido`(`detalle_factura_id`, `detalle_producto_id`, `detalle_cantidad`, `detalle_total`) VALUES (:detalle_factura_id, :detalle_producto_id, :detalle_cantidad, :detalle_total)";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":detalle_factura_id" => $_params['detalle_factura_id'], 
                ":detalle_producto_id" => $_params['detalle_producto_id'], 
                ":detalle_cantidad" => $_params['detalle_cantidad'], 
                ":detalle_total" => $_params['detalle_total'] 
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }
        
        public function mostrar_por_factura($id){
            $sql = "SELECT factura_total, factura_iva, factura_subtotal, producto_descripcion, producto_foto, producto_precio, detalle_cantidad, detalle_total
            FROM detalle_pedido
            INNER JOIN producto ON producto_id=detalle_producto_id
            INNER JOIN factura ON factura_id=detalle_factura_id
            where factura_id=:id";

            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }
        
    }
