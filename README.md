# Licencia  

> Plugin Name: Integración Woocommerce <br />
> Plugin URI: http://www.syloper.com/ <br />
> Description: Integración WooCommerce <br />
> Version: 0.1 <br />
> Author: Syloper <br />
> Author URI: http://www.syloper.com <br />

### Descripción

Integración WP, es un plugin que permite al usuario cargar datos facilmente mediante archivos CVS.
Listado de funcionalidades :<br />
							- Generar un pedido solamente con el SKU y la cantidad <br />
							- Subir un nuevo cliente, con su email, CUIL-CUIT y nombre <br />
							- Modificar precios de productos solo con el SKU y el nuevo precio <br />
                            - Modificar precios de productos en forma dinámica desde el admin <br />
<br />

### Instalación

- Manual: <br /> 
    ```sh
    - Descomprimimos el zip en .../wp-content/plugin 
    - Vamos a plugins instalados (dentro del admin-wp)
    - Activamos el plugin
    ```

- Mediante el admin: <br />
    
    ```sh
    - Añadir plugin 
    - Subir el .zip
    - Activar el plugin
     ```
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

 ### Changelog 

 - 0.01: <br />
```sh
           - Agregar Cliente 
           - Modificar precio del producto
           - Agregar pedidos por cliente  
```
 - 0.02: <br />
```sh
           - Listado de todos los productos 
           - Modificar de forma dinámica sus precios
```
 - 0.03: <br />
 ```sh
           - Buscador por ID y Titulo del producto 
```
 - 0.04: <br />
 ```sh
           - Actualizar Precios solo muestra los productos publicados 
  ```
  <br />
