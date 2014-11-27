<?php
require_once("comunes.php");
require_once("armador-html.php");
require_once("adaptar-estructura.php");
//require_once("main.html");
function armaFormulario($parametros){
    adaptar_estructura($parametros,array(
        'atributos'=>array(
            'entidad_def'=>array(), // al no tener valor por defecto es obligatorio
            'datos'=>array('valor_predeterminado'=>array()),
            'boton_accion'=>array(
                'valor_predeterminado'=>array(),
                'atributos'=>array(
                    'id'=>array(),
                    'hacer'=>array(),
                    'leyenda'=>array('predeterminado_por'=>'id'),
                )
            ),
        )
    ));
    $entidad_def=$parametros['entidad_def'];
    $datos=$parametros['datos'];
    $array_campos=$entidad_def['campos'];
    $enviar=new ArmadorHtml();
    $enviar->complejo(<<<HTML
    <form action="#url" method="post" enctype="multipart/form-data"> 
    <table class=tabla_formulario> 
    <h1 class=titulo_formulario>#entidad_nombre</h1>
HTML
        ,array(
            'url'=>armar_url(array(
                'hacer'=>$parametros['boton_accion']['hacer'],
                'entidad_id'=>$entidad_def['entidad_id']
            )),
            'entidad_nombre'=>$entidad_def['entidad_nombre']
        )
    );
    foreach($array_campos as $campo_id=>$campo_def){
        $enviar->complejo(<<<HTML
            <tr>
              <td class=etiqueta_formulario title="#aclaracion">#leyenda</td>
              <td><input id="#nombre_campo" name="#nombre_campo" type='text' value="#valor"></td> 
            </tr>
HTML
            , array_merge(
                $campo_def,
                array('valor'=>isset($datos[$campo_id])?$datos[$campo_id]:'')
            )
        );
    }
    $enviar->complejo(<<<HTML
    <td></td> 
    <td><input id="#id" name="#id" type="submit" value="#leyenda"></td> 
    </tr> 
    </table> 
    </form>
HTML
        , $parametros['boton_accion']
    );
}
?>