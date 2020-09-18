<?php 
    function agregar_producto($resultado, $id, $cantidad=1){
        $_SESSION['carrito'][$id] = array(
            'producto_id' => $resultado['producto_id'],
            'producto_descripcion'=> $resultado['producto_descripcion'],
            'producto_foto' => $resultado['producto_foto'],
            'producto_precio' => $resultado['producto_precio'],
            'cantidad' => 1
        ); 
    }

    function actualizar_producto($id,$cantidad=false){
        if($cantidad){
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
        }
        else{
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        }
            
    }


    function calcular_subtotal(){
        $total = 0;
            foreach($_SESSION['carrito'] as $indice => $value){
                $total=$total+($value['producto_precio']*$value['cantidad']);
            }
        return $total;
    }

    function calcular_iva(){
        $impuesto=12;
        $iva=0;
        if(isset($_SESSION['carrito'])){
            $iva=(calcular_subtotal()*$impuesto)/100;
        }
        return $iva;
    }

    function calcular_total(){
        $total = 0;
        if(isset($_SESSION['carrito'])){
            $total=calcular_subtotal();
            $total=$total+calcular_iva();
        }
        return $total;
    }

    function cantidad_producto(){
        $total = 0;
        if(isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $indice => $value){
                $total++;
            }
        }
        return $total;
    }
?>