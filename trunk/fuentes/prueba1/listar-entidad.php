<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "estructura.php";

function leer_datos_tabla($nombre_tabla,$que_campos,$entidad_orden){
    global $estructura_personal;
    $db=abrir_conexion();
    $sql="SELECT ".implode(",",$que_campos)."\n FROM prin.".$nombre_tabla."\n ORDER BY ".implode(",",$entidad_orden).";\n";
    $sentencia=$db->prepare($sql);
    $sentencia->execute();
    $leidos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $leidos;    
}

function despachable_listar_entidad($parametros){
    global $modelo;
    $listado_id=$parametros['listado_id'];
    $entidad_id=$parametros['entidad_id'];
    $entidad_def=$modelo['entidades'][$entidad_id];
    $entidad_campos=$entidad_def['campos'];
    $listado_def=$entidad_def['listados'][$listado_id];
    $enviar=new ArmadorHtml();
    $enviar->complejo(<<<HTML
    <!DOCTYPE HTML>
    <html  lang="es">
    <head>
        <meta charset="UTF-8">
        <title>TALLER SIMPLE</title>
        <link rel="stylesheet" type="text/css" href="prueba1.css">
    </head>
    <table class=tabla_listado> 
    <h1 class=titulo_listado>Listado de #entidad_nombre</h1>
HTML
    , $entidad_def);   
    $arreglo_filtrado=array_filter($entidad_campos, 
        function ($campo_def) use ($listado_id) {
            return !!$campo_def['enlistados'][$listado_id];
        } 
    );
    $listado_orden=$listado_def['listado_orden'];
    $sql_campos=array_keys($arreglo_filtrado);
    $filas_leidas=leer_datos_tabla($entidad_def['nombre_tabla'],$sql_campos,$listado_orden);
    $primera_fila=$filas_leidas[0];
    $columnas=array_keys($primera_fila); 
    $armacol='';
    $enviar->complejo("<th>");
    $armacol.='<td><a href="#___url">esto se ve como un lapiz</a></td>';
    foreach ($columnas as $columna) {
        $enviar->complejo("<th class=celda_titulo>#leyenda</th>",$entidad_campos[$columna]);
        $armacol.=interpolador("\n".<<<HTML
            <td class=celda_listado  name="#columna" type='text'> ##columna </td>
HTML
        , array('columna'=>$columna));
    }
    foreach ($filas_leidas as $fila){
        $enviar->complejo(<<<HTML
            <tr>
                {$armacol}
            </tr>
HTML
            , array_merge(
                $fila,
                array('___url'=>armar_url(array(
                    'hacer'=>'editar_entidad',
                    'entidad_id'=>$entidad_id,
                    'pk'=>$fila['per_per'] // GENERALIZAR PARA OTRAS ENTIDADES
                )))
            )
        );
        // throw new Exception("tengo en columna ".json_encode($columna
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