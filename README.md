Esta API REST le permitirá manejar el ABM de los productos y categorias del sitio web.

importar desde PHPMyAdmin : database/formula1.sql

Integrantes : Santiago Tomás Macht (santimacht2468@gmail.com) - Juan Cruz Olaechea(olaecheajc@gmail.com)


en caso de reentrega de la segunda parte: https://github.com/SantiagoMacht/web2-tpe

está completo con sus errores corregidos.



ACCIONES QUE SE PUEDEN REALIZAR EN ESTA TERCERA ENTREGA:

Productos: Listar (GET, con o sin parámetros), eliminar (DELETE), agregar (POST), modificar (PUT).

Categorias: Listar (GET, con o sin parámetros), eliminar (DELETE), agregar (POST), modificar (PUT).

-ENDPOINT: PRODUCTOS-

localhost/web2/web2-tpe3/api/productos (GET)
Esta url sin ningún parámetro, utilizando el verbo GET, va a listar los productos del sitio web según vienen de la base de datos.

Se pueden ordenar los productos según los siguientes campos:

-product_id
-name
-price
-stock
-CategoryId

Si quisiera ordenar los productos por "name" de manera ascendente, la url quedaría de la siguiente manera:

localhost/web2-tpe3/api/productos?sort=name&order=asc

localhost/web2-tpe3/api/productos/:ID (GET)
En este caso, si se le agrega a la url anterior, una barra y un ID se podrá traer el producto que posea dicho ID.

Si quisieras ver el producto con ID= 100, la url quedaría de la siguiente manera: Eligiendo el verbo GET:
localhost/web2-tpe3/api/productos/100

localhost/web2-tpe3/api/productos/:ID (DELETE)
Utilizando el verbo DELETE y especificando el ID del producto (/ID), se podrá eliminar el producto que posea dicho ID.

Si quisieras borrar el producto con ID= 100, la url quedaría de la siguiente manera: Eligiendo el verbo DELETE:
localhost/web2-tpe3/api/productos/100

agregar un producto (POST)
Seleccione el verbo POST y coloque la url correspondiente, en este caso:
localhost/web2-tpe3/api/productos
En la pestaña "Body" deberá colocar los valores de los siguientes campos: 

{
  "name": "Nombre del producto",
  "price": 29.99,
  "stock": 100,
  "CategoryId": 1
}

Por último presionar el botón "send" para realizar la acción.

modificar un producto (PUT)
Seleccione el verbo PUT y coloque la url correspondiente con su respectivo ID, en este caso:
localhost/web2-tpe3/api/productos/ID
En la pestaña "Body" deberá cambiar los valores de los campos que quiera modificar:

{
  "name": "Nuevo nombre",
  "price": 39.99,
  "stock": 150,
  "CategoryId": 2
}

Por último presionar el botón "send" para realizar la acción.

-ENDPOINT: CATEGORIAS-

localhost/web2/web2-tpe3/api/cateogorias (GET)
Esta url sin ningún parámetro, utilizando el verbo GET, va a listar las categorias del sitio web según vienen de la base de datos.

localhost/web2-tpe3/api/categorias/:ID (GET)
En este caso, si se le agrega a la url anterior, una barra y un ID se podrá traer la categoria que posea dicho ID.

Si quisieras ver la categoria con ID= 2, la url quedaría de la siguiente manera: Eligiendo el verbo GET:
localhost/web2-tpe3/api/categorias/2

localhost/web2-tpe3/api/categorias/:ID (DELETE)
Utilizando el verbo DELETE y especificando el ID de de la categoria (/ID), se podrá eliminar la categoria que posea dicho ID.

Si quisieras borrar la categoria con ID= 2, la url quedaría de la siguiente manera: Eligiendo el verbo DELETE:
localhost/web2-tpe3/api/categorias/2

agregar una categoria (POST)
Seleccione el verbo POST y coloque la url correspondiente, en este caso:
localhost/web2-tpe3/api/categorias
En la pestaña "Body" deberá colocar los valores de los siguientes campos: 

{
  "type": "Nombre de la nueva categoria"
}

Por último presionar el botón "send" para realizar la acción.

modificar una categoria (PUT)
Seleccione el verbo PUT y coloque la url correspondiente con su ID, en este caso:
localhost/web2-tpe3/api/categorias/ID
En la pestaña "Body" deberá cambiar los valores de los campos que quiera modificar:

{
  "type": "Nuevo nombre"
}

Por último presionar el botón "send" para realizar la acción.
