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
    $enviar=new ArmadorHtml();  
    foreach($array_campos as $campo=>$definicion_campo){
        $leyenda=$definicion_campo['leyenda'];
        $aclaracion=$definicion_campo['aclaracion'];
        $enviar->abrir('tr');
          $enviar->abrir('td',array('class'=>'etiqueta_formulario', 'title'=>$aclaracion));
            $enviar->abrir('label',array('for'=>$campo));
              $enviar->texto($leyenda);
            $enviar->cerrar('label');
          $enviar->cerrar('td');
          $enviar->abrir('td');
            $enviar->elemento('input',array('id'=>$campo, 'name'=>$campo, 'type'=>'text'));
          $enviar->cerrar('td');
        $enviar->cerrar('tr');
        
        /*
        seguro($leyenda,'html');
        seguro($aclaracion,'attr_html');
        $str_html=$str_html."
            <tr>
              <td class=etiqueta_formulario title='$aclaracion'>$leyenda</td>     
              <td><input id=$campo name=$campo type='text'></td> 
            </tr>";
        */
        $enviar->complejo(<<<HTML
            <tr>
              <td class=etiqueta_formulario title=#:aclaracion>#!leyenda</td>
              <td><input id=#:campo name=#:campo type='text'></td> 
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