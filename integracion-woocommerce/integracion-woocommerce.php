<?php
/*
Plugin Name: Integración Woocommerce
Plugin URI: http://www.syloper.com/
Description: Integración WooCommerce
Version: 0.1
Author: Syloper
Author URI: http://www.syloper.com
*/

//creamos las pagunas de menu de admin
function iw_admin_menu() {
add_menu_page ( 'Integración WooCommerce', 'Integración WC', 'read', 'iw-index', 'includeIndex', '', 101);
add_submenu_page( 'iw-index', 'Importar Clientes', 'Importar Clientes', 'read', 'iw-importarclientes', 'includeImportarClientes');
// add_submenu_page( 'iw-index', 'Importar CteCte', 'Importar CteCte', 'read', 'iw-importactacte', 'includeImportarCtaCte');
add_submenu_page( 'iw-index', 'Importar Pedidos', 'Importar Pedidos', 'read', 'iw-importapedidos', 'includeImportarPedidos');
add_submenu_page( 'iw-index', 'Actualizar Precios', 'Actualizar Precios', 'read', 'iw-actualizarprecios', 'includeActualizarPrecios');
add_submenu_page( 'iw-index', 'Productos', 'Productos', 'read', 'iw-productos', 'includeProductos');

}
add_action( 'admin_menu', 'iw_admin_menu');

function includeIndex() {
    include('iw-index.php');
}
function includeProductos() {
    include('readProductos.php');
}
function includeImportarCtaCte() {
    include('readCtaCte.php');
}
function includeImportarPedidos() {
    include('readPedidos.php');
}
function includeImportarClientes() {
    include('readClientes.php');
}

function includeActualizarPrecios() {
    include('readPrecios.php');
}
//campos extra de usuarios
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) {
?>
    <h3><?php _e("Integración Woocommerce - Campos Extras", "blank"); ?></h3>

    <table class="form-table">
      <tr>
          <th><label for="codigo"><?php _e("Código:"); ?></label></th>
          <td>
        <?php echo esc_attr( get_user_meta( $user->ID, 'codigo', true) ); ?>  </td>
          </tr>
      </tr>
    <tr>
        <th><label for="domicilio"><?php _e("Domicilio:"); ?></label></th>
        <td>
        <input type="text" name="domicilio" id="domicilio" value="<?php echo esc_attr( get_user_meta( $user->ID, 'domicilio', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Domicilio"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="c_postal"><?php _e("Código Postal:"); ?></label></th>
        <td>
        <input type="text" name="c_postal" id="c_postal" value="<?php echo esc_attr( get_user_meta( $user->ID, 'c_postal', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Código Postal"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="localidad"><?php _e("Localidad:"); ?></label></th>
        <td>
        <input type="text" name="localidad" id="localidad" value="<?php echo esc_attr( get_user_meta( $user->ID, 'localidad', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Localidad"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="provincia"><?php _e("Provincia:"); ?></label></th>
        <td>
        <input type="text" name="provincia" id="provincia" value="<?php echo esc_attr( get_user_meta( $user->ID, 'provincia', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Provincia"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="pais"><?php _e("País:"); ?></label></th>
        <td>
        <input type="text" name="pais" id="pais" value="<?php echo esc_attr( get_user_meta( $user->ID, 'pais', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("País"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="tipo"><?php _e("Tipo:"); ?></label></th>
        <td>
        <input type="text" name="tipo" id="tipo" value="<?php echo esc_attr( get_user_meta( $user->ID, 'tipo', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Tipo"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="cuit"><?php _e("Cuit:"); ?></label></th>
        <td>
        <input type="text" name="cuit" id="cuit" value="<?php echo esc_attr( get_user_meta( $user->ID, 'cuit', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Cuit"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="categoria"><?php _e("Categoría:"); ?></label></th>
        <td>
        <input type="text" name="categoria" id="categoria" value="<?php echo esc_attr( get_user_meta( $user->ID, 'categoria', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Categoría"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="telefono"><?php _e("Teléfono:"); ?></label></th>
        <td>
        <input type="text" name="telefono" id="telefono" value="<?php echo esc_attr( get_user_meta( $user->ID, 'telefono', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Telefóno"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="bonifica"><?php _e("Bonifica:"); ?></label></th>
        <td>
        <input type="text" name="bonifica" id="bonifica" value="<?php echo esc_attr( get_user_meta( $user->ID, 'bonifica', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Bonifica"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="comentario"><?php _e("Comentario:"); ?></label></th>
        <td>
        <input type="text" name="comentario" id="comentario" value="<?php echo esc_attr( get_user_meta( $user->ID, 'comentario', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Comentario"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="condicion"><?php _e("Condición:"); ?></label></th>
        <td>
        <input type="text" name="condicion" id="condicion" value="<?php echo esc_attr( get_user_meta( $user->ID, 'condicion', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Condición"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="percepc_ib"><?php _e("Percepc IB:"); ?></label></th>
        <td>
        <input type="text" name="percepc_ib" id="percepc_ib" value="<?php echo esc_attr( get_user_meta( $user->ID, 'percepc_ib', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Percepc IB"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="iibb_stafe"><?php _e("IIBB Sta Fe:"); ?></label></th>
        <td>
        <input type="text" name="iibb_stafe" id="iibb_stafe" value="<?php echo esc_attr( get_user_meta( $user->ID, 'iibb_stafe', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("IIBB Sta Fe"); ?></span>
        </td>
        </tr>
    </tr>
    <tr>
        <th><label for="iibb_corr"><?php _e("IIBB Corr:"); ?></label></th>
        <td>
        <input type="text" name="iibb_corr" id="iibb_corr" value="<?php echo esc_attr( get_user_meta( $user->ID, 'iibb_corr', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("IIBB Corr"); ?></span>
        </td>
        </tr>
    <tr>
        <th><label for="iibb_misiones"><?php _e("IIBB Misiones:"); ?></label></th>
        <td>
        <input type="text" name="iibb_misiones" id="iibb_misiones" value="<?php echo esc_attr( get_user_meta( $user->ID, 'iibb_misiones', true) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("IIBB Misiones"); ?></span>
        </td>
    </tr>
    </tr>
    </table>

<?php
}

add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'cuit', $_POST['cuit'] );
update_user_meta( $user_id, 'domicilio', $_POST['domicilio'] );
update_user_meta( $user_id, 'c_postal', $_POST['c_postal'] );
update_user_meta( $user_id, 'localidad', $_POST['localidad'] );
update_user_meta( $user_id, 'provincia', $_POST['provincia'] );
update_user_meta( $user_id, 'pais', $_POST['pais'] );
update_user_meta( $user_id, 'tipo', $_POST['tipo'] );
update_user_meta( $user_id, 'categoria', $_POST['categoria'] );
update_user_meta( $user_id, 'telefono', $_POST['telefono'] );
update_user_meta( $user_id, 'bonifica', $_POST['bonifica'] );
update_user_meta( $user_id, 'comentario', $_POST['comentario'] );
update_user_meta( $user_id, 'condicion', $_POST['condicion'] );
update_user_meta( $user_id, 'percepc_ib', $_POST['percepc_ib'] );
update_user_meta( $user_id, 'iibb_stafe', $_POST['iibb_stafe'] );
update_user_meta( $user_id, 'iibb_corr', $_POST['iibb_corr'] );
}
