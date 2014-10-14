<?php
require_once("comunes.php");
require_once("armador-html.php");
//require_once("main.html");
function armaFormulario($entidad_def,$datos=array()){
    $array_campos=$entidad_def['campos'];
    $enviar=new ArmadorHtml();
    $enviar->complejo(<<<HTML
    <form action="#url" method="post" enctype="multipart/form-data"> 
    <table class=tabla_formulario> 
    <h1 class=titulo_formulario>#entidad_nombre</h1>
HTML
        ,array(
            'url'=>armar_url(array(
                'hacer'=>'grabar_entidad',
                'entidad_id'=>$entidad_def['entidad_id']
            )),
            'entidad_nombre'=>$entidad_def['entidad_nombre']
        )
    );
    $enviar=new ArmadorHtml();  
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
    echo <<<HTML2
    <td></td> 
    <td><input id="agregar" name="agregar" type="submit" id="agregar" value="Agregar"></td> 
    </tr> 
    </table> 
    </form>
HTML2;
}
?>