# Reproducible #

## Definición ##

Llamamos **reproducible** a cualquier proceso, consulta o programa que cumple la siguiente propiedad:
  * Con los mismos datos de entrada (y el mismo estado en la base de datos) debe producir exactamente el mismo resultado

## Problemática ##

Cuando los programas no son reproducibles puede ocurrir que a veces ocurran errores que parecen aleatorios porque se producen en alguna de las ramas posibles de ejecución. En esa condición los programas son mucho más difíciles de corregir.

### SELECT ... ORDER BY ###

Especial atención hay que prestar con la orden `SELECT` del SQL. Si no se especifica el ORDER BY o cuando los campos del ORDER BY no determinan el orden para todos los casos (por ejemplo cuando se ordena a los alumnos solo por la edad) puede ocurrir que distintas corridas devuelvan distintos órdenes. Esto ocurre aún cuando no se hayan cambiado los datos de la base, porque los motores de base de datos guardan información interna que si cambia y puede determinar que la misma instrucción devuelva el mismo conjunto de datos pero en orden distinto (los motores guardan información para optimizar las siguientes consultas).

Para solucionar este problema se debe ordenar la consulta por una lista de campos que sean clave única (independientemente de si está la _Primary Key_ o _Foreign Key_ definida explícitamente en la base de datos).

### random ###

Ocurre también el problema de que no sea reproducible un programa basado en los números al azar. La función random (o rnd o rand según el lenguaje) no es una función realmente aleatoria, devuelve una serie de números determinísticos que depende de un valor inicial llamado **semilla**. Esa semilla se puede cambiar <font size='1'>(salvo en PHP, con lo que hay que usar una función externa donde sí se pueda)</font>. Entonces:

  1. Si el programa está desarrollo debemos colocar a mano la semilla (ya sea en un .txt de configuración o como sea)
  1. Si el programa está en producción y la parte aleatoria no es crítica (no estamos programando juegos de azar o programas cuya seguridad dependa del secreto de la secuencia aleatoria) la semilla debe sortearse una vez al instalar (o una vez por día) y guardar la semilla de modo que si ocurre un error se pueda reproducir la secuencia aleatoria.



