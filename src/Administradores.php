<?php
    namespace infinity;

    class Administradores{

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
            $sql = "INSERT INTO usuario(usuario_nombre, usuario_apellido, usuario_telefono, usuario_correo, usuario_pass, usuario_ciudad, usuario_direccion, usuario_rol_id) 
            VALUES (:usuario_nombre, :usuario_apellido, :usuario_telefono, :usuario_correo, :usuario_pass, :usuario_ciudad, :usuario_direccion, :usuario_rol_id)";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":usuario_nombre" => $_params['usuario_nombre'], 
                ":usuario_apellido" => $_params['usuario_apellido'], 
                ":usuario_telefono" => $_params['usuario_telefono'], 
                ":usuario_correo" => $_params['usuario_correo'], 
                ":usuario_pass" => $_params['usuario_pass'], 
                ":usuario_ciudad" => $_params['usuario_ciudad'], 
                ":usuario_direccion"=> $_params['usuario_direccion'],
                ":usuario_rol_id"=> $_params['usuario_rol_id']
            );

            if($resultado->execute($_array))
                return $this->cn->lastInsertId();
            return false;
        }
        public function eliminar($id){
            $sql = "DELETE FROM usuario WHERE usuario_id=:id";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $id
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function actualizar($_params){
            $sql = "UPDATE `usuario` SET (`usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario_correo`, `usuario_contraseña`, `usuario_ciudad`, `usuario_direccion`) 
            VALUES (:usuario_nombre, :usuario_apellido, :usuario:telefono, :usuario_correo, :usuario_contraseña, :usuario_ciudad, :usuario_direccion) WHERE usuario_id=:usuario:id";
            
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":usuario_nombre" => $_params['usuario_nombre'], 
                ":usuario_apellido" => $_params['usuario_apellido'], 
                ":usuario_telefono" => $_params['usuario_telefono'], 
                ":usuario_correo" => $_params['usuario_correo'], 
                ":usuario_contraseña" => $_params['usuario_contraseña'], 
                ":usuario_ciudad" => $_params['usuario_ciudad'], 
                ":usuario_direccion"=> $_params['usuario_direccion'],
                ":usuario_rol_id"=> $_params['usuario_rol_id'],
                ":usuario_id"=> $_params['usuario_id']
            );

            if($resultado->execute($_array))
                return true;
            return false;
        }

        public function mostrar(){
            $sql = "SELECT * FROM usuario where usuario_rol_id=1";
            $resultado=$this->cn->prepare($sql);
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }
        public function mostrar_clientes(){
            $sql = "SELECT * FROM usuario where usuario_rol_id=2";
            $resultado=$this->cn->prepare($sql);
            if($resultado->execute())
                return $resultado->fetchAll();
            return false;
        }
        public function mostrar_por_id($id){
            $sql = "SELECT * FROM usuario where usuario_id=:id";
            $resultado=$this->cn->prepare($sql);
            $_array = array(
                ":id" => $id
            );

            if($resultado->execute($_array))
                return $resultado->fetch();
            return false;
        }
        public function iniciar($_params){
            $sql = "SELECT * FROM usuario where usuario_correo=:correo and usuario_pass=:pass";
            $resultado=$this->cn->prepare($sql);
            $_array = array(
                ":correo" => $_params['correo'],
                ":pass"=>$_params['pass']
            );

            if($resultado->execute($_array))
                return $resultado->fetch();
            return false;
        }
        
    }