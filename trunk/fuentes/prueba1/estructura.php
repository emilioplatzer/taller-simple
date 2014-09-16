<?php
//UTF-8:SÍ

$modelo=array(
    'entidades'=>array(
        'personal'=>array(
            'campos'=>array(
                'per_documento'=>array('leyenda'=>'DNI'            ,'aclaracion'=>'sin "puntitos" ni otros signos'),
                'per_cuil'     =>array('leyenda'=>'CUIL'           ,'enlistados'=>array('general'=>false), 'aclaracion'=>'sin guiones'),
                'per_nombre'   =>array('leyenda'=>'Nombre'         ,'enlistados'=>array('agenda'=>true) ),
                'per_apellido' =>array('leyenda'=>'Apellido'       ,'enlistados'=>array('agenda'=>true) ),
                'per_telefono' =>array('leyenda'=>'Teléfono'       ,'enlistados'=>array('agenda'=>true) ),
                'per_mail'     =>array('leyenda'=>'Mail "personal"','enlistados'=>array('agenda'=>true) ),
                'per_direccion'=>array('leyenda'=>'Dirección'      ),
            ),
            'listados'=>array(
                'general'=>array(),
                'agenda'=>array(),
            )
        ),
        'proyectos'=>array(
            'campos'=>array(
                'pro_nombre' =>array('leyenda'=>'Nombre'             ),
                'pro_periodo'=>array('leyenda'=>'Período'            ),
            ),
            'listados'=>array(
                'general'=>array(),
                'vigentes'=>array(),
            )
        )
    ),
);

echo "<pre>POR CORRER:\n</pre>";

foreach($modelo['entidades'] as &$entidad){
    adaptar_estructura_campos($entidad['campos'],$entidad['listados']);
}

function adaptar_estructura_campos(&$estructura_tabla, $listados_entidad){
    foreach($estructura_tabla as $campo=>&$definicion_campo){
        $definicion_campo+=array(
            'aclaracion'=>'',
            'nombre_campo'=>$campo,
            'enlistados'=>array()
        );
        $valor_por_defecto_enlistados=array();
        foreach($listados_entidad as $listado=>$dummy){
            $valor_por_defecto_enlistados[$listado]=false;
        }
        $valor_por_defecto_enlistados['general']=true;
        $definicion_campo['enlistados']+=$valor_por_defecto_enlistados;
    }
}

$estructura_personal=$modelo['entidades']['personal']['campos'];

?>