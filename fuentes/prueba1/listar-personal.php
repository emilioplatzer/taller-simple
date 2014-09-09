<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "personal.php";
require_once "estructura.php";

function leer_personal($orden){
    global $estructura_personal;
    $db=abrir_conexion();
    $sql_campos=array();
    $sql_campos=array_keys($estructura_personal);
    //revisar$orden;
    $sql="SELECT ".implode(",",$sql_campos)."\n FROM prin.personal\n ORDER BY ".implode(",",$orden).";\n";
    //echo "por ejecutar \n".$sql;
    $sentencia=$db->prepare($sql);
    $sentencia->execute();
    $leidos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $leidos;    
}

function despachable_listar_personal(){
    global $estructura_personal;  
    echo <<<HTML
    <!DOCTYPE HTML>
    <html  lang="es">
   
    <head>
        <meta charset="UTF-8">
        <title>TALLER SIMPLE</title>
    </head>
    <table class=tabla_listado> 
    <h1 class=titulo_listado>Listado de Personal</h1>
HTML
;   
    $enviar=new ArmadorHtml(); 

    //escribir_header_columnas;
    
    $orden=array('per_documento');
    $personal_leidos=leer_personal($orden);
    foreach ($personal_leidos as $persona){
        $columnas= array_keys($estructura_personal); 
        $armacol='';        
        foreach ($columnas as $columna) {
            $armacol.="\n".<<<HTML
                <td class=celda_listado  name="$columna" type='text' #$columna </td>
HTML;
        //echo "$persona[$columna] \t";
        }
        //echo"\n";
        //echo $armacol;
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
    //escribir_pie

    echo "\n<B>Listo";
}

?>