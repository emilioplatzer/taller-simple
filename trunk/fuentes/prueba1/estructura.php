<?php
//UTF-8:SÍ

$estructura_personal=array(
    'per_documento'=>array('leyenda'=>'DNI'            , 'aclaracion'=>'sin "puntitos" ni otros signos'),
    'per_cuil'     =>array('leyenda'=>'CUIL'           ,'listados'=>array('general'=>false), 'aclaracion'=>'sin guiones'),
    'per_nombre'   =>array('leyenda'=>'Nombre'         ,'listados'=>array('agenda'=>true) ),
    'per_apellido' =>array('leyenda'=>'Apellido'       ,'listados'=>array('agenda'=>true) ),
    'per_telefono' =>array('leyenda'=>'Teléfono'       ,'listados'=>array('agenda'=>true) ),
    'per_mail'     =>array('leyenda'=>'Mail "personal"','listados'=>array('agenda'=>true) ),
    'per_direccion'=>array('leyenda'=>'Dirección'      ),
);

adaptar_estructura_campos($estructura_personal);

function adaptar_estructura_campos(&$estructura_tabla){
    foreach($estructura_tabla as $campo=>&$definicion_campo){
        $definicion_campo+=array(
            'aclaracion'=>'',
            'nombre_campo'=>$campo,
            'listados'=>array()
        );
        $definicion_campo['listados']+=array(
            'agenda'=>false,
            'general'=>true
        );
    }
}
?>