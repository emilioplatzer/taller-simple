# Primera Reunión #

| Fecha | Presentes |
|:------|:----------|
| 26/8 | Elba, Graciela, Raquel, Mauro, Emilio |

## Eligiendo la aplicación ##

Habíamos quedado en la reunión de preparación que hoy íbamos a elegir cuál sería la aplicación que vamos a desarrollar. Hablamos de la posibilidad de hacer 2 a la vez en paralelo (lo descartamos por ahora). Las alternativas entre las que elegimos son:
  1. Sistema de Selección de personal (reclutamiento) y de registro de participación en proyectos
  1. Manejo de Capacitaciones
  1. Sistema de Requerimientos
  1. Sistema online de seguimiento de producción de encuestas y backup.

## Sistema elegido: RRPP ##

Elegimos el sistema de Reclutamiento y Registro de Participación en Proyectos.

### Objetivo del Sistema RRPP ###

Registro de comunicaciones y entrevistas a candidatos a personal de campo y registro de participaciones en los distintos proyectos.

## Metodología de trabajo ##

Vamos a ordenar la jornada de estudio en:

  1. hacer algo que funcione, haciéndolo lo más simple posible sin agregar nada que no se necesite ahora
  1. adaptar lo hecho a las normas de desarrollo existentes o nuevas a convenir

## ¿Qué vamos a hacer hoy? ##

Vamos a hacer la pantalla de alta del personal (candidatos o personal actual). La pantalla de ingreso y el _insert_ en la base de datos. Como vamos a usar la versión más simple posibles:
  1. no vamos a usar AJAX (vamos a usar un formulario común con submit)
  1. todos los campos van a ser de texto

### Características ###

  1. Al presionar el botón entrar se hará el _INSERT_
  1. El sistema contesta OK o devuelve el mensaje de error tal como venga de la base de datos
  1. El modelo (conocimiento del negocio, en este caso los nombres de los campos y las leyendas de cada uno) va a estar separado del resto de la aplicación

## Cierre de la actividad ##

**Reflexionamos**: no es tan sencillo hacer lo simple simple, siempre estamos tentados en hacer más de lo que se necesita. En este caso empezamos por la conexión a la base y en lugar de poner la instrucción de conexión pura empezamos metiendo eso en una clase con más opciones o atributos de los que necesitábamos para comenzar.

## ¿Cómo seguimos? ##

Queda de deber terminar la opción simple que funciona (y subir todo al SVN). En la próxima reunión haremos el ejercicio de adaptación y reflexión metodológica.

**Próxima reunión**: 29/8 13:30 a 15:20