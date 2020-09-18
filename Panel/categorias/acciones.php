<?php
require '../../vendor/autoload.php';

$categoria = new infinity\Categoria;
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['accion']==='Añadir')
    {
        if(empty($_POST['descripcion']))
            exit('Añada descripcion');

        $_params = array(
            'categoria_descripcion'=>$_POST['descripcion'],
        );
        $rpt=$categoria->registrar($_params);
        if($rpt)
            header('Location:index.php');
        else
            print 'ERROR AL REGISTRAR';
    }
}
if($_SERVER['REQUEST_METHOD']==='GET'){
    $id=$_GET['id'];
    $rpt=$categoria->eliminar($id);
    if($rpt)
            header('Location:index.php');
    else
        print 'ERROR AL ELIMINAR';

}
function subirFoto(){
    $carpeta= __DIR__.'../../upload/';
    $archivo=$carpeta.$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);
    return $_FILES['foto']['name'];
}