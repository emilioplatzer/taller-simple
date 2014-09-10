<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "personal.php";
require_once "estructura.php";
/*
function filtrar_campos($filas, $listado){
    global $estructura_personal;      
    $filas_filtradas = array();
    foreach($filas as $fila){
        $fila_filtrada = array();
        foreach ($estructura_personal as $campo=>$definicion_campo){
            if($definicion_campo['listados'][$listado]){
                $fila_filtrada[$campo]=$fila[$campo];
            }
        }
        $filas_filtradas[]=$fila_filtrada;
    }
    return $filas_filtradas;
}
*/
function leer_personal($que_campos,$orden){
    global $estructura_personal;
    $db=abrir_conexion();
    //$sql_campos=array();
    //$sql_campos=array_keys($estructura_personal);
    $sql="SELECT ".implode(",",$que_campos)."\n FROM prin.personal\n ORDER BY ".implode(",",$orden).";\n";
    $sentencia=$db->prepare($sql);
    $sentencia->execute();
    $leidos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $leidos;    
}
function despachable_listar_agenda(){
    despachable_listar_personal('agenda');
}
function despachable_listar_personal($que_listado='general'){
    global $estructura_personal;  
    echo <<<HTML
    <!DOCTYPE HTML>
    <html  lang="es">
    <head>
        <meta charset="UTF-8">
        <title>TALLER SIMPLE</title>
        <link rel="stylesheet" type="text/css" href="prueba1.css">
    </head>
    <table class=tabla_listado> 
    <h1 class=titulo_listado>Listado de Personal</h1>
HTML
;   
    $enviar=new ArmadorHtml(); 
    //escribir_header_columnas;
    $orden=array('per_documento');
    //$sql_campos=array();
    //$sql_campos=array_keys($estructura_personal);
    $arreglo_filtrado=array_filter($estructura_personal, 
        function ($element) use ($que_listado) {
        return ($element['listados']["$que_listado"]==true ); 
        } );
    $sql_campos=array_keys($arreglo_filtrado);
    $personal_leidos=leer_personal($sql_campos,$orden);
    //$personal_leidos=filtrar_campos($personal_leidos, $que_listado);
    $primera_fila=$personal_leidos[0];
    $columnas=array_keys($primera_fila); 
    $armacol='';
    foreach ($columnas as $columna) {
        $enviar->complejo("<th class=celda_titulo>#leyenda</th>",$estructura_personal[$columna]);
        $armacol.=interpolador("\n".<<<HTML
            <td class=celda_listado  name="#columna" type='text'> ##columna </td>
HTML
        , array('columna'=>$columna));
    }
    foreach ($personal_leidos as $persona){
        $enviar->complejo(<<<HTML
            <tr>
                {$armacol}
            </tr>
HTML
            , $persona
        );
    }
    $enviar->complejo(<<<HTML
        </table>
        </body>
        </html>
HTML
        , array()
    );        
    echo "\n<B>Listo";
}

?>