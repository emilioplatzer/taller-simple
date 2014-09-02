<?php
require_once("comunes.php");
require_once("armador-html.php");
//require_once("main.html");
function armaFormulario($titulo, $array_campos){
    echo<<<HTML
    <form action="main.php?hacer=grabar_personal" method="post" enctype="multipart/form-data"> 
    <table class=tabla_formulario> 
    <h1 class=titulo_formulario>$titulo</h1>
HTML;
    foreach($array_campos as $campo=>$definicion_campo){
        $leyenda=$definicion_campo['leyenda'];
        $aclaracion=$definicion_campo['aclaracion'];
        enviar_abrir('tr');
          enviar_abrir('td',array('class'=>'etiqueta_formulario', 'title'=>$aclaracion));
            enviar_texto($leyenda);
          enviar_cerrar('td');
          enviar_abrir('td');
            enviar_elemento('input',array('id'=>$campo, 'name'=>$campo, 'type'=>'text'));
          enviar_cerrar('td');
        enviar_cerrar('tr');
        
        /*
        seguro($leyenda,'html');
        seguro($aclaracion,'attr_html');
        $str_html=$str_html."
            <tr>
              <td class=etiqueta_formulario title='$aclaracion'>$leyenda</td>     
              <td><input id=$campo name=$campo type='text'></td> 
            </tr>";
        */
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