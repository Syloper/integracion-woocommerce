<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['REMOTE_ADDR']) {
$cli = false;
} else {
$cli = true;
}
if(!empty($_POST)){

  if($_POST['addcsvsubmit']){
    global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
    $file = fopen($_FILES['archivo']['tmp_name'], 'r');



    //echo plugin_dir_path(__FILE__);

      $editados = array();
    while( $precio = fgetcsv($file, 0, ',')) {
        /*echo '<pre>';
        print_r($precio);
        echo '</pre>';
  */

      $codigo = $precio[0]; 
      $precioFormatted = $precio[1];
  //    echo $precioFormatted;
      /*$product_id = $wpdb->get_var(
        $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $codigo )
      );*/
      $product_id = wc_get_product_id_by_sku( $codigo );
      echo '<div style="overflow-x:auto;margin:15px;" align="center"> ';
        echo '<table style="background-color:white; width:100%;" >' ;
          echo "<thead>";
            echo '<tr style="hover {background-color: #f5f5f5}"> 
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Producto ID</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">SKU</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Precio Anterior </th> 
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Nuevo Precio </th> 
                </tr>';
          echo "</thead>";
        echo "<tbody>";

      if($product_id) {

          $precioFormattedFinal = floatval($precioFormatted);
          $precioAnterior = get_post_meta($product_id, '_regular_price', true);
          $editados[] =  "Editado Producto ID " . $product_id . " SKU : " . $codigo . ' - Precio Anterior: $' . $precioAnterior . ' Precio Nuevo: $ ' . $precioFormattedFinal;
          update_post_meta($product_id, '_regular_price', $precioFormattedFinal);
          update_post_meta($product_id, '_price', $precioFormattedFinal);
          $post = get_post( $product_id );

          update_post_meta($post->post_parent, '_regular_price', $precioFormattedFinal);
          update_post_meta($post->post_parent, '_price', $precioFormattedFinal);
          update_post_meta($post->post_parent, '_min_variation_price', $precioFormattedFinal);
          update_post_meta($post->post_parent, '_max_variation_price', $precioFormattedFinal);
          update_post_meta($post->post_parent, '_min_variation_regular_price', $precioFormattedFinal);
          update_post_meta($post->post_parent, '_max_variation_regular_price', $precioFormattedFinal);
          delete_transient('wc_var_prices_' . $post->post_parent);

          delete_transient('wc_var_prices_' . $product_id);
          delete_transient('timeout_wc_var_prices_' . $product_id);
          delete_transient('timeout_wc_var_prices_' . $post->post_parent);
          echo "<tr>";
          ?>
          <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$product_id.'</td>'; ?>
          <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$codigo.'</td>'; ?>
          <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$precioAnterior.'</td>'; ?>
          <?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$precioFormattedFinal.'</td>'; ?>
          <?php
          
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo '</div>';
    }
  }
}else{
 ?>
<div class="wpap">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
      <form action="/wp-content/plugins/integracion-woocommerce/TEST-MODPRECIOS.csv">
          <input type="submit" value="CSV de ejemplo" style="margin:10px;" />
      </form>

      <?php screen_icon() ?><h2>Actualizar precios.</h2>

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
