<?php
require_once("comunes.php");
//require_once("main.html");
function armaFormulario($titulo, $array_campos){
    echo<<<HTML
    <form action="main.php?hacer=grabar_personal" method="post" enctype="multipart/form-data"> 
    <table class=tabla_formulario> 
    <h1 class=titulo_formulario>$titulo</h1>
HTML;
    $str_html='';
    foreach($array_campos as $campo=>$definicion_campo){
        $leyenda=$definicion_campo['leyenda'];
        $aclaracion=$definicion_campo['aclaracion'];
        seguro($leyenda,'html');
        seguro($aclaracion,'attr_html');
        $str_html=$str_html."
            <tr><td class=etiqueta_formulario title='$aclaracion'>$leyenda</td>     
            <td><input id=$campo name=$campo type='text'></td> 
            </tr><tr><tr> ";
    }
    echo $str_html;
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