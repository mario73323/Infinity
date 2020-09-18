<?php
    namespace infinity;

    class Producto{

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
            $sql = "INSERT INTO `producto`(`producto_descripcion`, `producto_color`, `producto_talla`, `producto_marca`, `producto_precio`, `producto_categoria_id`, `producto_foto`) 
            VALUES (:producto_descripcion, :producto_color, :producto_talla, :producto_marca, :producto_precio, :producto_categoria_id, :producto_foto)";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":producto_descripcion" => $_params['producto_descripcion'], 
                ":producto_color" => $_params['producto_color'], 
                ":producto_talla" => $_params['producto_talla'], 
                ":producto_marca" => $_params['producto_marca'], 
                ":producto_precio" => $_params['producto_precio'], 
                ":producto_categoria_id" => $_params['producto_categoria_id'], 
                ":producto_foto"=> $_params['producto_foto']
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }
        
        public function actualizar($_params){
            $sql = "UPDATE `producto` SET `producto_descripcion`=:producto_descripcion,`producto_color`=:producto_color,`producto_talla`=:producto_talla,`producto_marca`=:producto_marca,`producto_precio`=:producto_precio,`producto_categoria_id`=:producto_categoria_id,`producto_foto`=:producto_foto WHERE `producto_id`=:producto_id";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":producto_descripcion" => $_params['producto_descripcion'], 
                ":producto_color" => $_params['producto_color'], 
                ":producto_talla" => $_params['producto_talla'], 
                ":producto_marca" => $_params['producto_marca'], 
                ":producto_precio" => $_params['producto_precio'], 
                ":producto_categoria_id" => $_params['producto_categoria_id'], 
                ":producto_foto"=> $_params['producto_foto'],
                ":producto_id" => $_params['producto_id']
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function eliminar($id){
            $sql = "DELETE FROM producto WHERE producto_id=:id";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function mostrar(){
            $sql = "SELECT producto.producto_id, producto.producto_descripcion, producto.producto_talla, producto.producto_marca, producto.producto_color, producto.producto_precio, producto.producto_foto, categoria.categoria_descripcion  
            FROM producto 
            INNER JOIN categoria ON producto.producto_categoria_id=categoria.categoria_id ORDER BY producto.producto_id DESC";

            $resultado=$this->cn->prepare($sql);
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }
        public function mostrar_por_categoria($id){
            $sql = "SELECT producto.producto_id, producto.producto_descripcion, producto.producto_talla, producto.producto_marca, producto.producto_color, producto.producto_precio, producto.producto_foto, categoria.categoria_descripcion  
            FROM producto 
            INNER JOIN categoria ON producto.producto_categoria_id=categoria.categoria_id  where categoria.categoria_id=:id ORDER BY producto.producto_id DESC
           ";

            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );
            if($resultado->execute($_array))
                return $resultado->fetchAll();
            return false;
        }
        public function mostrar_por_id($id){
            $sql = "SELECT producto.producto_id, producto.producto_descripcion, producto.producto_talla, producto.producto_marca, producto.producto_color, producto.producto_precio, producto.producto_foto, categoria.categoria_id, categoria.categoria_descripcion  
            FROM producto 
            INNER JOIN categoria ON producto.producto_categoria_id=categoria.categoria_id WHERE producto.producto_id=:id";

            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );

            if($resultado->execute($_array))
                return $resultado->fetch();
            return false;
        }
    }
