<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
if($_SERVER['REMOTE_ADDR']) {
$cli = false;
} else {
$cli = true;
}

if(!empty($_POST)){
//echo php_sapi_name();
  global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
  $clientes = fopen($_FILES['archivo']['tmp_name'], 'r');
    
    $i = 0;
    $insertedUsers = 0;
    $insertedUsersArray = array();
    $updatedUsers = 0;
    echo '<div style="overflow-x:auto;margin:15px;" align="center"> ';
        echo '<table style="background-color:white; width:100%;" >' ;
          echo "<thead>";
            echo '<tr style="hover {background-color: #f5f5f5}"> 
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Email</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">CUIL-CUIT</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Nombre </th> 
                </tr>';
          echo "</thead>";
        echo "<tbody>";
    while( $cliente = fgetcsv($clientes, 0, ',')) {
    //if($i <= 5) {
        // $user = get_users(array('meta_key' => 'codigo', 'meta_value' => $cliente[1]->__toString()));
        // $cliente[0] = str_replace(array("; ", " , ", ", ", ",  "), array(",", ",", ",", ","), $cliente[0]->__toString());
        // $emails = explode(',', $cliente[0]);

        /*if(!filter_var($emails['0'], FILTER_VALIDATE_EMAIL)) {
        echo "mail invalido!";
            $emails = explode(';', $cliente['e_mail']);

        } else {
        echo "mail  valido!";
        }*/
        // (string) $cliente[0] = (string) trim($emails[0]);
        // print_r($cliente);exit;
        $userdata = array(
            'user_login'  => $cliente[0],
            'user_pass'   => $cliente[1],
            'user_email'  => $cliente[0],
            'user_nicename' => $cliente[2],
            'display_name' => $cliente[2],
            'first_name' => $cliente[2],
            'role' => 'customer');

        //     if ( ! is_wp_error( $user_id ) ) {
        //         //guardamos la data meta

        //         add_user_meta( $user_id, 'domicilio',  $cliente['domicilio']->__toString());
        //         add_user_meta( $user_id, 'c_postal',  $cliente['c_postal']->__toString());
        //         add_user_meta( $user_id, 'localidad',  $cliente['localidad']->__toString());
        //         add_user_meta( $user_id, 'provincia',  $cliente['provincia']->__toString());
        //         add_user_meta( $user_id, 'pais',  $cliente['pais']->__toString());
        //         add_user_meta( $user_id, 'tipo',  $cliente['tipo']->__toString());
        //         add_user_meta( $user_id, 'cuit',  $cliente['cuit']->__toString());
        //         add_user_meta( $user_id, 'categoria',  $cliente['categoria']->__toString());
        //         add_user_meta( $user_id, 'telefono',  $cliente['telefono']->__toString());
        //         add_user_meta( $user_id, 'bonifica',  $cliente['bonifica']->__toString());
        //         add_user_meta( $user_id, 'comentario',  $cliente['comentario']->__toString());
        //         add_user_meta( $user_id, 'condicion',  $cliente['condicion']->__toString());
        //         add_user_meta( $user_id, 'percepc_ib',  $cliente['percepc_ib']->__toString());
        //         add_user_meta( $user_id, 'iibb_stafe',  $cliente['iibb_stafe']->__toString());
        //         add_user_meta( $user_id, 'iibb_corr',  $cliente['iibb_corr']->__toString());
        //         add_user_meta( $user_id, 'iibb_misiones',  $cliente['iibb_misio']->__toString());
        //         add_user_meta( $user_id, 'codigo',  $cliente['codigo']->__toString());

        //         $insertedUsers++;
        //         $insertedUsersArray[] = "Agregado Usuario " . $cliente['nombre'] . '<br />';
        // } else {
        //   //actualizamos el usuarios

        //   $userdata = array (
        //       'ID' => $user['0']->data->ID,
        //         'user_login'  => $cliente[0],
        //       'user_email'  => $cliente[0],
        //       'user_nicename' => $cliente[2],
        //       'display_name' => $cliente[2],
        //       'first_name' => $cliente[2],
        //       'role' => 'customer'
        //   );

         /* echo "data de usuario";
         echo '<pre>';
          print_r($userdata);
          echo '</pre>';*/
           $user_id = wp_insert_user( $userdata ) ;
           if ( ! is_wp_error( $user_id ) ) {
              echo "<tr>";
                $product_id = wc_get_product_id_by_sku( "$data[0]" );
                $product = wc_get_product($product_id);
                ?>
                <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$cliente[0].'</td>'; ?>
                <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$cliente[1].'</td>'; ?>
                <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$cliente[2].'</td>'; ?>
                <?php
                  
              echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo '</div>';
            //echo "usuario actualizado" . $user_id;
           // update_user_meta( $user_id, 'domicilio',  $cliente['domicilio']->__toString());
           // update_user_meta( $user_id, 'c_postal',  $cliente['c_postal']->__toString());
           // update_user_meta( $user_id, 'localidad',  $cliente['localidad']->__toString());
           // update_user_meta( $user_id, 'provincia',  $cliente['provincia']->__toString());
           // if($cliente['pais']) update_user_meta( $user_id, 'pais',  $cliente['pais']->__toString());
           //  if($cliente['tipo']) update_user_meta( $user_id, 'tipo',  $cliente['tipo']->__toString());
           // update_user_meta( $user_id, 'cuit',  $cliente['cuit']->__toString());
           // update_user_meta( $user_id, 'categoria',  $cliente['categoria']->__toString());
           // update_user_meta( $user_id, 'telefono',  $cliente['telefono']->__toString());
           // update_user_meta( $user_id, 'bonifica',  $cliente['bonifica']->__toString());
           // if($cliente['comentario']) update_user_meta( $user_id, 'comentario',  $cliente['comentario']->__toString());
           // if($cliente['condicion'])  update_user_meta( $user_id, 'condicion',  $cliente['condicion']->__toString());
           // if($cliente['percepc_ib']) update_user_meta( $user_id, 'percepc_ib',  $cliente['percepc_ib']->__toString());
           // update_user_meta( $user_id, 'iibb_stafe',  $cliente['iibb_stafe']->__toString());
           // update_user_meta( $user_id, 'iibb_corr',  $cliente['iibb_corr']->__toString());
           // if($cliente['iibb_misio']) update_user_meta( $user_id, 'iibb_misiones',  $cliente['iibb_misio']->__toString());


            } elseif(is_wp_error($user_id)){
            //echo "errror";
                $errors = $user_id->get_error_messages();

                foreach ($errors as $error) {
                    echo $error;
                }
            }

      }

      $i++;
    //}
    //exit($user_id);

}else{
 ?>
  <?php $url = $_SERVER['REQUEST_URI'];
    $url_2 = substr($url, 0, 35);
    
   ?>
<div class="wpap">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
      <form action="/wp-content/plugins/integracion-woocommerce/TEST-ADDCLIENTES.csv">
          <input type="submit" value="CSV de ejemplo" style="margin:10px;" />
      </form>

      <?php screen_icon() ?><h2>Importador de Clientes.</h2>

      <form method="POST" action="" enctype="multipart/form-data">

        <?php settings_fields("csv-group") ?>
        <?php @do_settings_fields("csv-group") ?>

        <table class="form-table">

          <input type="file" name="archivo" class="file" id="addcsv" />

        </table>
        <input type="submit" name="addcsvsubmit">
      </form>
    </div>
 <?php } ?>
