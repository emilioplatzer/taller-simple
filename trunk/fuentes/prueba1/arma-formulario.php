<?php
require_once("comunes.php");
require_once("armador-html.php");
//require_once("main.html");
function armaFormulario($entidad){
    $array_campos=$entidad['campos'];
    $enviar=new ArmadorHtml();
    $enviar->complejo(<<<HTML
    <form action="#url" method="post" enctype="multipart/form-data"> 
    <table class=tabla_formulario> 
    <h1 class=titulo_formulario>#nombre_entidad</h1>
HTML
        ,array(
            'url'=>armar_url(array(
                'hacer'=>'grabar_entidad',
                'entidad'=>$entidad['id_entidad']
            )),
            'nombre_entidad'=>$entidad['nombre_entidad']
        )
    );
    $enviar=new ArmadorHtml();  
    foreach($array_campos as $campo=>$definicion_campo){
        $enviar->complejo(<<<HTML
            <tr>
              <td class=etiqueta_formulario title="#aclaracion">#leyenda</td>
              <td><input id="#nombre_campo" name="#nombre_campo" type='text'></td> 
            </tr>
HTML
            , $definicion_campo
        );
    }
    echo <<<HTML2
    <td><div align="right"> 
    <input id="Restablecer" name="Restablecer" type="reset" id="Restablecer" value="Restablecer"> 
    </div></td> 
    <td><input id="agregar" name="agregar" type="submit" id="agregar" value="Agregar"></td> 
    </tr> 
    </table> 
    </form>
HTML2;
}
?>