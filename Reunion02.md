# Segunda Reunión #

| Fecha | Presentes |
|:------|:----------|
| 29/8 | Elba, Graciela, Raquel, Mauro, Emilio |

## Reflexiones sobre la tarea ##

Costó terminar la tarea. En principio costó arrancar (tomar las primeras decisiones y trabajar en un grupo de 4). Pero lo que se destaca es que llevó mucho más tiempo del que cada uno suponía que esta tarea iba a tomar.

## Acuerdos ##

  1. Convenimos entonces en agregar como objetivo a este taller usarlo como práctica para la estimación de tiempos de las tareas. Al principio cada participante anotará en privado cuánto supone que cada tarea lleva y en breve compartiremos el ejercicio de estimar.
  1. Reforzamos la importancia de la prolijidad (identación, espacios, márgenes, nombres de variable, etc.
  1. Respecto la instalación de la base y/o scripts y/o programas externos (ej: excel). Conviene siempre que se pueda guardar una versión en texto plano. En el caso de las bases de datos conviene el script que las genera antes que un backup (ya sea backup binario o de texto plano: es mejor el script a mano de creación antes que el "dump" de la base porque el dump se genera agregando mucha información innecesaria).

## ¿Qué vamos a hacer hoy? ##

Nos pusimos dar prolijidad a lo que habíamos hecho. Quedamos a mitad de camino, pero avanzamos en lo siguiente:
  1. En SQL en las instrucciones a la base separamos la sentencia de los datos usando _sentencias preparadas_ y _placeholders_ dentro de las sentencias.
  1. Provisoriamente usamos un [Despachador](Despachador.md) que determina qué función ejecutar en base a los parámetros recibidos en la URL. Para determinar si lo que se pasa es válido o no buscando que exista la función prefijando al nombre "despachable_" o sea todas las funciones que empiezan con "despachable_" son funciones que se pueden llamar desde la URL.
  1. La creación de tablas (los scripts SQL para la base) los generamos desde el PHP (vía línea de comandos) porque tenemos la info de cuáles son los campos y sus nombres
  1. Pasamos a un .css todos los formatos.
  1. Encapsulamos la apertura de la conexión a la base de datos.

## Cierre de la actividad ##

No hubo tarea, quedamos en que íbamos a avanzar todos juntos en la prolijidad del código. Cosas que faltan:
  1. Controlar la posible inyección en todo el programa

## ¿Cómo seguimos? ##

**Próxima reunión**: martes 2/9 11:00 a 13:00