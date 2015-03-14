# Quinta Reunión #

| Fecha | Presentes |
|:------|:----------|
| 9/9 | Elba, Graciela, Raquel, Mauro, Emilio |

# Doble interpolación #

Empezamos revisando la tarea hecha por Raquel, mostrar por pantalla el listado de los datos cargados. Ella se encontró con la necesidad de hacer doble interpolación. Al preparar el cuadro se itera por los campos de la estructura obteniendo sus nombres y características, en este ciclo se prepara una variable de texto con un _placholder_ para cada uno de los campos donde colocar los valores de cada una de las filas a listar.

Vamos despacio y de abajo para arriba.

Cuando mostramos un listado (suponiendo que enviamos los datos dentro del HTML) iteramos por las filas leídas inyectando los datos de cada fila en el código HTML de la fila. Algo así como:

```
while($fila_leida = leer_fila()){
    enviar_interpolando(<<<HTML
      <tr><td class='columna_numerica'>#documento</td>
          <td class='columna_texto'>#nombre</td>
          <td class='columna_texto'>#apellido</td>
          ...
      </tr>
HTML
      , $fila_leida);
}
```

así la fila leída (que contiene los campos documento, nombre, apellido, ...) es interpolada dentro del código HTML). El problema es que no queremos escribir ese código HTML a mano dentro de nuestro código, lo queremos en una variable de texto que se construya recorriendo la estructura de la tabla que queremos listar. Algo así como:

```
// armar el código HTML con los placeholders
$codigo_html_fila="<tr>";
foreach($estructura_tabla as $definicion_campo){
    $codigo_html_fila.=interpolador(
       "<td class='#clase_columna'>##nombre_campo</td>",
       $definicion_campo
    );
$codigo_html_fila.="</tr>";
// ...
// mostrar los datos leídos
while($fila_leida = leer_fila()){
    enviar_interpolando($codigo_html_fila, $fila_leida);
}
```

La definción de los campos tiene como mínimo dos atributos "clase\_columna" y "nombre\_campo" lo que hace que el código HTML que armamos tenga lo que necesitamos.

Vemos acá que la definición de campos podría tener otros atributos que no necesitamos, según lo que estamos haciendo parecería cómodo permitir que en los datos que recibe el interpolador haya más campos que los necesarios (pero no menos).

## Generalizando ##

Durante la reunión decidimos que haya dos listados, uno el general donde se ven todos los campos y otro llamado agenda donde no están los datos personales (DNI y CUIL) y solo están los datos de contacto (teléfono, mail, nombre y apellido).

Entendemos que los listados que pueden existir son parte del conocimiento del negocio y por lo tanto tienen que estar por afuera del módulo que hace los listados y dentro de lo que por ahora llamamos "estructura".

Discutimos varias alternativas sobre cómo incluir ese conocimiento. Lo que queda claro es que hay una relación muchos a muchos entre "tablas" y "listados". Si ese conocimiento estuviera almacenado en una base de datos relacional no habría dudas que va en una tabla con una pk compuesta (tabla, listado). Almacenando el conocimiento en un txt obliga a elegir colocar esa información en alguno de los dos lugares:
  1. Teniendo una lista de listados y dentro de cada listado los nombres de los campos que entran
  1. Teniendo en la definición de cada campo a qué listados debe pertenecer

Ambas son factibles (elegimos la segunda) y la pregunta para resolverla es ¿qué vamos a agregar con mayor frecuencia, listados o campos? Si agrego un campo podría pensar tiene que estar en los mismos listados que tal otro campo (salvo tal o cual excepción), si agrego un listado tendría que tiene que tener casi los mismos campos que tal otro listado. Ahí estoy pensando en copiar y pegar definiciones (y en copiar y pegar en forma cruzada o con expresiones regulares en el caso de haber elegido la opción incómoda en relación a lo que quiero agregar). Llegado el momento vamos a tener que pensar si hay un modo de abstraer o hacer definiciones jerárquicas.

## Acuerdos ##

  1. Vamos a intentar usar interpolación controlada en todos los puntos donde se arme código fuente dentro de variables de texto (ya sea código HTML, SQL, CSS o lo que sea)
  1. No usamos el RecorteBruto. Por ejemplo de no usamos una función que trae todas las columnas y todas filas de una tabla de la base de datos para luego filtrar los datos que necesitamos aún cuando eso parezca más sencillo que enviar el filtro en el SQL.
  1. Siempre colocamos ORDER BY en nuestras consultas SQL porque queremos que todos nuestros procesos sean [reproducibles](Reproducible.md). O sea que no agregamos cualquier ORDER BY sino uno que determine un orden total.

## Cierre de la actividad ##

Usamos la estructura de la tabla personas para armar los listados. Nos beneficiamos así de tener separado el conocimiento sobre el modelo.

## ¿Cómo seguimos? ##

Queda de deber mejorar el filtrado (o selección) de campos de modo de que el SQL se arme con los campos que necesitamos.

**Próxima reunión**: martes 16/9 11:00 a 13:00