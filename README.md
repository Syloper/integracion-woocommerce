 == Licencia == 

Plugin Name: Integración Woocommerce
Plugin URI: http://www.syloper.com/
Description: Integración WooCommerce
Version: 0.1
Author: Syloper
Author URI: http://www.syloper.com

== Descripción == 

Integración WP, es un plugin que permite al usuario cargar datos facilmente mediante archivos CVS.
Listado de funcionalidades :
							- Generar un pedido solamente con el SKU y la cantidad
							- Subir un nuevo cliente, con su email, CUIL-CUIT y nombre
							- Modificar precios de productos solo con el SKU y el nuevo precio
<br /> <br /> 

== Instalación == 

- Manual: 
    1- Descomprimimos el zip en .../wp-content/plugin
    2- Vamos a plugins instalados (dentro del admin-wp)
    3- Activamos el plugin


- Mediante el admin:

     1- Añadir plugin 
     2- Subir el .zip
     3- Activar el plugin
<br /> <br /> 

== Preguntas frecuentes == 

¿Cómo creo archivos CSV? 

 - A traves de cualquier programa de hojas de calculos.

¿Campos para completar en cada CSV?

Agregar Cliente: 
                - Email (email válido)
                - CUIL-CUIT (sin "-")
                - Nombre (sin espacios)
<br /> <br /> 
Agregar Pedido: 
                - SKU
                - Cantidad
<br /> <br /> 
Modificar Precio:
                - SKU
                - Nuevo precio
<br /> <br /> 
¿Cómo se crea en el wordpress el nuevo cliente? 

 - Es un nuevo usuario Cliente, donde el id es el email y la contraseña es el CUIL-CUIT.   

<br /> <br /> 
¿Qué es el SKU?

 - Es el código único de cada producto que podemos agregarle cuando lo creamos.

<br /> <br /> 
== Changelog ==

 - 0.01:
           - Agregar Cliente
           - Modificar precio del producto
           - Agregar pedidos por cliente  
<br /> <br /> 
