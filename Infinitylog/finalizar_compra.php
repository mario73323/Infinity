<?php

use infinity\Factura;

session_start();
    require 'funciones.php';
    require '../vendor/autoload.php';
    $factura = new infinity\Factura;
    $detalle = new infinity\Detalle_factura;

    $_params= array(
        'factura_cliente_id'=>$_SESSION['id'],
        'factura_subtotal'=>calcular_subtotal(),
        'factura_iva'=>calcular_iva(),
        'factura_total'=>calcular_total()
    );
    $resultado=$factura->registrar($_params);

    foreach($_SESSION['carrito'] as $indice=> $value){
        $_params=array(
            'detalle_factura_id'=>$resultado,
            'detalle_producto_id'=>$value['producto_id'],
            'detalle_cantidad'=>$value['cantidad'],
            'detalle_total'=>$value['producto_precio']*$value['cantidad']
        );
        $final=$detalle->registrar($_params);

    }
    $_SESSION['carrito']=array();
    header('Location:index.php');
?>