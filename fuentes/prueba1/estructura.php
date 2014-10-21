<?php
//UTF-8:SÍ

$modelo=array(
    'entidades'=>array(
        'personal'=>array(
            'campos'=>array(
                'per_per'      =>array('leyenda'=>'DNI'            ,'aclaracion'=>'sin "puntitos" ni otros signos', 'es_pk'=>true),
                'per_cuil'     =>array('leyenda'=>'CUIL'           ,'enlistados'=>array('general'=>false), 'aclaracion'=>'sin guiones'),
                'per_nombre'   =>array('leyenda'=>'Nombre'         ,'enlistados'=>array('agenda'=>true) ),
                'per_apellido' =>array('leyenda'=>'Apellido'       ,'enlistados'=>array('agenda'=>true) ),
                'per_telefono' =>array('leyenda'=>'Teléfono'       ,'enlistados'=>array('agenda'=>true) ),
                'per_mail'     =>array('leyenda'=>'Mail "personal"','enlistados'=>array('agenda'=>true) ),
                'per_direccion'=>array('leyenda'=>'Dirección'      ),
            ),
            'entidad_orden'=>array('per_per'),
            'listados'=>array(
                'general'=>array(),
                'agenda'=>array(
                    'listado_nombre'=>'agenda telefónica y de emails',
                    'listado_orden'=>array('per_mail','per_telefono')
                ),
            )
        ),
        'actividades'=>array(
            'entidad_nombre'=>'Actividades (operativos, procesos, etc)',
            'campos'=>array(
                'act_act'    =>array('leyenda'=>'Nombre corto (id)'  , 'es_pk'=>true),
                'act_nombre' =>array('leyenda'=>'Nombre'             ),
                'act_tipo'   =>array('leyenda'=>'Tipo'               ),
                'act_abierta'=>array('leyenda'=>'Abierta'            ),
            ),
            'entidad_orden'=>array('act_nombre'),
            'listados'=>array(
                'general'=>array(),
                'vigentes'=>array(),
                'cerrados'=>array(),
            )
        )
    ),
);

if(!"por ahora no, tienen que funcionar las pruebas primero"){
adaptar_estructura($modelo,
    array(
        'entidades'=>array(
            'tipo'=>'array',
            'atributos'=>array(
                'entidad_nombre'=>array('predeterminado_especial'=>'id'),
                'nombre_tabla'=>array('predeterminado_especial'=>'id'),
                'entidad_id'=>array('predeterminado_especial'=>'id'),
                'campos'=>array(
                    'tipo'=>'array',
                    'atributos'=>array(
                        'aclaracion'=>'',
                        'nombre_campo'=>array('predeterminado_especial'=>'id'),
                        'puede_leer_de_db'=>true,
                        'enlistados'=>array(
                            'tipo'=>'array',
                            'valor_predeterminado'=>array()
                        ),
                        'es_pk'=>false,
                    )
                ),
                'entidad_orden'=>array(
                    'tipo'=>'array',
                    'valores'=>array('tipo'=>'texto')
                ),
                'listados'=>array(
                    'tipo'=>'array',
                    'atributos'=>array(
                        'listado_nombre'=>array('predeterminado_especial'=>'id'),
                        'listado_orden'=>array(
                            'predeterminado_especial'='../../entidad_orden'
                        )
                    )
                ),
            )
        )
    )
);
}

function adaptar_estructura_total(){
    global $modelo;
    foreach($modelo['entidades'] as $entidad_id=>&$entidad_def){
        $entidad_def+=array(
            'entidad_nombre'=>$entidad_id,
            'nombre_tabla'  =>$entidad_id
        );
        $entidad_def['entidad_id']=$entidad_id;
        adaptar_estructura_campos($entidad_def['campos'],$entidad_def['listados']);
        foreach($entidad_def['listados'] as $listado_id=>&$listado_def){
            $listado_def+=array(
                'listado_nombre'=>$listado_id,
                'listado_orden'=>$entidad_def['entidad_orden']
            );
        }
    }
}
    
function adaptar_estructura_campos(&$estructura_tabla, $listados_entidad/*NORMALIZAR!*/){
    foreach($estructura_tabla as $campo_id=>&$campo_def){
        $campo_def+=array(
            'aclaracion'=>'',
            'nombre_campo'=>$campo_id,
            'puede_leer_de_db'=>true,
            'enlistados'=>array(),
            'es_pk'=>false,
        );
        $valor_por_defecto_enlistados=array();
        foreach($listados_entidad as $listado_id=>$dummy){
            $valor_por_defecto_enlistados[$listado_id]=false;
        }
        $valor_por_defecto_enlistados['general']=true;
        $campo_def['enlistados']+=$valor_por_defecto_enlistados;
    }
}

adaptar_estructura_total();
?>