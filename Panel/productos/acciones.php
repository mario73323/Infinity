<?php
require '../../vendor/autoload.php';

$producto = new infinity\Producto;
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['accion']==='Añadir')
    {
        if(empty($_POST['descripcion']))
            exit('Añada descripcion');
        if(empty($_POST['color']))
            exit('Añada un color');
        if(empty($_POST['talla']))
            exit('Añada una talla');
        if(empty($_POST['marca']))
            exit('Añada una marca');
        if(!is_numeric($_POST['precio']))
            exit('Precio no valido');
        if(empty($_POST['categoria_id']))
            exit('Añada categoria valida');

        $_params = array(
            'producto_descripcion'=>$_POST['descripcion'],
            'producto_color'=>$_POST['color'],
            'producto_talla'=>$_POST['talla'],
            'producto_marca'=>$_POST['marca'],
            'producto_precio'=>$_POST['precio'],
            'producto_categoria_id'=>$_POST['categoria_id'],
            'producto_foto'=>subirFoto()
        );

        $rpt=$producto->registrar($_params);
        if($rpt)
            header('Location:index.php');
        else
            print 'ERROR AL REGISTRAR';
    }
    if($_POST['accion']==='Actualizar'){
        if(empty($_POST['descripcion']))
            exit('Añada descripcion');
        if(empty($_POST['color']))
            exit('Añada un color');
        if(empty($_POST['talla']))
            exit('Añada una talla');
        if(empty($_POST['marca']))
            exit('Añada una marca');
        if(!is_numeric($_POST['precio']))
            exit('Precio no valido');
        if(empty($_POST['categoria_id']))
            exit('Añada categoria valida');

        $_params = array(
            'producto_descripcion'=>$_POST['descripcion'],
            'producto_color'=>$_POST['color'],
            'producto_talla'=>$_POST['talla'],
            'producto_marca'=>$_POST['marca'],
            'producto_precio'=>$_POST['precio'],
            'producto_categoria_id'=>$_POST['categoria_id'],
            'producto_id'=>$_POST['id'],
        );

        if(!empty($_POST['foto_temp']))
            $_params['producto_foto']=$_POST['foto_temp'];

        if(!empty($_FILES['foto']['name']))
            $_params['producto_foto']=subirFoto();

        $rpt=$producto->actualizar($_params);
        if($rpt)
            header('Location:index.php');
        else
            print 'ERROR AL actualizar';
    }
    
}
if($_SERVER['REQUEST_METHOD']==='GET'){
    $id=$_GET['id'];
    $rpt=$producto->eliminar($id);
    if($rpt)
            header('Location:index.php');
    else
        print 'ERROR AL ELIMINAR';

}
function subirFoto(){
    $carpeta= __DIR__.'/../../upload/';
    $archivo=$carpeta.$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);
    return $_FILES['foto']['name'];
}