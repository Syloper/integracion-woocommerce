 == Licencia == 

Plugin Name: Integración Woocommerce
Plugin URI: http://www.syloper.com/
Description: Integración WooCommerce
Version: 0.1
Author: Syloper
Author URI: http://www.syloper.com

== Descripción == 

Integración WP, es un plugin que permite al usuario cargar datos facilmente mediante archivos CVS.

== Instalación == 
- Manual: 
    1- Descomprimimos el zip en .../wp-content/plugin
    2- Vamos a plugins instalados (dentro del admin-wp)
    3- Activamos el plugin

- Mediante el admin:

     1- Añadir plugin 
     2- Subir el .zip
     3- Activar el plugin


== Preguntas frecuentes == 

¿Cómo creo archivos CSV? 

 - A traves de cualquier programa de hojas de calculos.

¿Campos para completar en cada CSV?
Agregar Cliente: 
                - Email (email válido)
                - CUIL-CUIT (sin "-")
                - Nombre (sin espacios)
Agregar Pedido: 
                - SKU
                - Cantidad
Modificar Precio:
                - SKU
                - Nuevo precio

¿Cómo se crea en el wordpress el nuevo cliente? 

 - Es un nuevo usuario Cliente, donde el id es el email y la contraseña es el CUIL-CUIT.   


¿Qué es el SKU?

 - Es el código único de cada producto que podemos agregarle cuando lo creamos.


== Changelog ==

 - 0.01:
           - Agregar Cliente
           - Modificar precio del producto
           - Agregar pedidos por cliente  
