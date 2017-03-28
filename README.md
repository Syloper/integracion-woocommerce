 == Licencia == 

Plugin Name: Integración Woocommerce
Plugin URI: http://www.syloper.com/
Description: Integración WooCommerce
Version: 0.1
Author: Syloper
Author URI: http://www.syloper.com

== Descripción == 

Integración WP, es un plugin que permite al usuario cargar datos facilmente mediante archivos CVS.
Listado de funcionalidades :<br />
							- Generar un pedido solamente con el SKU y la cantidad <br />
							- Subir un nuevo cliente, con su email, CUIL-CUIT y nombre <br />
							- Modificar precios de productos solo con el SKU y el nuevo precio <br />
                            - Modificar precios de productos en forma dinámica desde el admin <br />
<br />

== Instalación == 

- Manual: <br />
    1- Descomprimimos el zip en .../wp-content/plugin <br />
    2- Vamos a plugins instalados (dentro del admin-wp) <br />
    3- Activamos el plugin

<br />
- Mediante el admin: <br />
     1- Añadir plugin <br />
     2- Subir el .zip <br />
     3- Activar el plugin <br />
<br /> 

== Preguntas frecuentes == 

¿Cómo creo archivos CSV? <br />

 - A traves de cualquier programa de hojas de calculos.<br />

¿Campos para completar en cada CSV?<br />

Agregar Cliente: <br /> 
                - Email (email válido)
<br />
                - CUIL-CUIT (sin "-")
<br />
                - Nombre (sin espacios)
<br /> 
Agregar Pedido: <br />
                - SKU
<br />
                - Cantidad
<br /> <br /> 
Modificar Precio:<br />
                - SKU
<br />
                - Nuevo precio
<br /> 

¿Cómo se crea en el wordpress el nuevo cliente? <br />

 - Es un nuevo usuario Cliente, donde el id es el email y la contraseña es el CUIL-CUIT.   

<br /> 
¿Qué es el SKU? <br />

 - Es el código único de cada producto que podemos agregarle cuando lo creamos. <br />

<br /> 
== Changelog ==

 - 0.01: <br />
           - Agregar Cliente <br /> 
           - Modificar precio del producto <br />
           - Agregar pedidos por cliente   <br />
<br />
 - 0.02: <br />
           - Listado de todos los productos <br /> 
           - Modificar de forma dinámica sus precios <br />
<br /> <br />
