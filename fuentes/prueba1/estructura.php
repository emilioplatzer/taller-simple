<?php
//UTF-8:SÍ

$estructura_personal=array(
    'per_documento'=>array('leyenda'=>'DNI'      , 'aclaracion'=>'sin puntitos'),
    'per_cuil'     =>array('leyenda'=>'CUIL'     , 'aclaracion'=>'sin guiones' ),
    'per_nombre'   =>array('leyenda'=>'Nombre'   , ),
    'per_apellido' =>array('leyenda'=>'Apellido' , ),
    'per_telefono' =>array('leyenda'=>'Teléfono' , ),
    'per_mail'     =>array('leyenda'=>'Mail'     , ),
    'per_direccion'=>array('leyenda'=>'Dirección', ),
);

adaptar_estructura_campos($estructura_personal);

function adaptar_estructura_campos(&$estructura_tabla){
    foreach($estructura_tabla as $campo=>&$definicion_campo){
        $definicion_campo+=array(
            'aclaracion'=>''
        );
    }
}
?>