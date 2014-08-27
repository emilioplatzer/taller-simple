<!-- provisorio: para probar en bruto con html -->
<?php
//require_once("main.html");
function armaFormulario($titulo, $array_datos){
    echo<<<HTML
    <form action="main.php" method="post" enctype="multipart/form-data"> 
    <table width="100%" border="0"> 
    <h1 align=center>$titulo</h1>
HTML;
    $str_html='';
    foreach($array_datos as $campo=>$valor){
        $str_html=$str_html."
            <tr><td><div align='right'>$valor</div></td>     
            <td><input id=$campo name=$campo type='text' maxlength='50'></td> 
            </tr><tr><tr> ";
    }
    echo $str_html;
    echo <<<HTML2
    <td><div align="right"> 
    <input id="Restablecer" name="Restablecer" type="reset" id="Restablecer" value="Restablecer"> 
    </div></td> 
    <td><input id="agregar" name="agregar" type="submit" id="agregar" value="Agregar persona"></td> 
    </tr> 
    </table> 
    </form>
HTML2;
}
?>