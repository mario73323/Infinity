<?php
require '../vendor/autoload.php';
$usuario = new infinity\Administradores;
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['accion']==='iniciar')
    {
        
        if(empty($_POST['correo']))
            exit('Añada correo');
        if(empty($_POST['pass']))
            exit('Añada su contraseña');
        $params=array(
            'correo'=>$_POST['correo'],
            'pass'=>$_POST['pass']
        );
        $rpt=$usuario->iniciar($params);
        if(!$rpt){
            header('Location:login.php');    
        }
        else{
            session_start();
            $_SESSION["id"] =$rpt['usuario_id'];
            if($rpt['usuario_rol_id']==='1')
                header('Location:../Panel/dashboard.php');
            else
                header('Location:../Infinitylog/index.php');
        } 
    }
    if($_POST['accion']==='registrar')
    {
        $params = array(
            'usuario_nombre'=>$_POST['nombre'],
            'usuario_apellido'=>$_POST['apellido'],
            'usuario_telefono'=>$_POST['telefono'],
            'usuario_correo'=>$_POST['correo'],
            'usuario_pass'=>$_POST['pass'],
            'usuario_ciudad'=>$_POST['ciudad'],
            'usuario_direccion'=>$_POST['direccion'],
            'usuario_rol_id'=>$_POST['rol']
        );
        $rpt=$usuario->registrar($params);
       
        session_start();
        $_SESSION["id"] =$rpt;
        header('Location:../Infinitylog/index.php');
    }
}