# Cuartar Reunión #

| Fecha | Presentes |
|:------|:----------|
| 4/9 | Elba, Graciela, Raquel, Mauro, Emilio |

# Enviar HTML a través de interpolación controlada #

En esta reunión estuvimos trabajando sobre la idea de la reunión anterior:
  1. Aprovechar las ventajas de la interpolación, o sea que se vea el código HTML tal cual se enviará, sin comillas y sin la concatenación
> 2. Aprovechar las ventajas del control de los datos para evitar la inyección de código HTML.

Dado algo similar a

```
enviar_interpolando("
  <div title=#title>
    <label for=#campo>#leyenda</label>
    <input id=#campo name=#campo type='text'>
  </div>", $definicion_campos);
```

Simplemente hacemos un buscar y reemplazar buscando una expresión regular (un identificador precedido por un signo #) y utilizamos una función que indique el valor reemplazante buscando ese identificador como clave del arreglo que se pasa con los valores y aplicando las sustituciones necesarias para evitar los caracteres inválidos.

(ver [function complejo](https://code.google.com/p/taller-simple/source/diff?spec=svn40&r=40&format=side&path=/trunk/fuentes/prueba1/armador-html.php))

O sea llamamos a una función que se encarga de hacer la interpolación buscando los _placeholders_ dentro de la cadena (en vez de dejar la interpolación automática del PHP en base a variables que empiecen con $). Esto agregaría también la ventaja de usar claves en un arreglo en vez de verdaderas variables.

También probamos con distintos caracteres inválidos (mayor, menor, comillas, etc) para ver cómo funcionan en la solución anterior (de la reunión pasada) y en esta.

## Cierre de la actividad ##

Evaluamos esta alternativa como viable y la elegimos para profundizar en otras partes del desarrollo. Cada vez que necesitemos construir sentencias o TXT con valores intentaremos usar interpolación controlada

## ¿Cómo seguimos? ##

Quedamos en ampliar la funcionalidad y mostrar el listado de las personas cargadas.

**Próxima reunión**: martes 9/9 11:00 a 13:00