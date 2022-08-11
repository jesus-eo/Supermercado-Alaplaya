<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

##EJERCICIO SUPERMERCADO ALAPLAYA, S.L.  
La empresa de supermercados Alaplaya, S.L. nos solicita el desarrollo de una aplicación web para sus "cajas amigas", las cajas no requieren de personal y que el mismo consumidor puede usar para hacer sus compras sin ayuda. La aplicación debe funcionar de la siguiente forma:

1. El cliente llega a la caja amiga y pulsa el botón de "Empezar compra".
2. A continuación, va pasando los productos por el escáner, mientras en la pantalla va apareciendo el listado de los productos que se han pasado, así como el subtotal en la parte inferior. Nosotros lo simularemos tecleando los códigos de barras y pulsando el botón "Añadir producto a la compra".
3. Al lado de cada producto hay un botón rojo que permite eliminar ese producto de la lista, en caso de error.
4. Hay un botón "Anular compra" que, al pulsarlo, anulará la compra y volverá de nuevo a la pantalla de inicio.
5. También hay otro botón "Finalizar compra" que, al pulsarlo, nos llevará a la pantalla de pago, donde se mostrará el importe total a pagar, se le pedirá al usuario que introduzca los 16 dígitos de su tarjeta y se dará por finalizada la compra. El número de la tarjeta se guardará junto con los datos del ticket.
6. Al finalizar la compra, se mostrará un botón "Volver al inicio" que, al pulsarlo, llevará al usuario de nuevo a la pantalla de inicio.

Se pide:

1. Crear la base de datos mediante migraciones con, al menos, las siguientes tablas (que contendrán, al menos, las siguientes columnas):

    - *productos (**id**, codigo, denominacion, precio)*

        La columna `codigo` contiene el código de barras del producto.
        La columna `precio` será el precio unitario del producto si es un producto prefabricado, o el precio base por metro cuadrado si es un producto fabricado.

    - *tickets (**id**, tarjeta, created_at)*
        
        La columna `created_at` contiene la fecha y hora de creación de cada ticket.
        La columna `tarjeta` contiene el número de la tarjeta (16 dígitos) con la que se ha pagado la compra.

    - *lineas (**id**, **ticket_id**, **producto_id**)*

2.  Crear los modelos correspondientes y todas las relaciones adecuadas entre ellos.
3. Implementar los apartados 1 y 2.
4.  Implementar los apartados 3 y 4.
5.  Implementar los apartados 5 y 6.
6.  Validar el número de la tarjeta de crédito introducida en el apartado `5-b`.

### Realización
Este ejercicio esta realizado mayoral ménte usando livewire, además usando sessiones para crear el carrito de almacenamiento.

### Levantar servidor  
npm run dev  
php artisan serve
