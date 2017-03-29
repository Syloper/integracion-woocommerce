

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
  
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<style type="text/css">
    .claseDelBoton{
        border:none;
        outline:none;
        font-size:26px;
        position: fixed;
        z-index: 100000;
        bottom: 20px;
        right: 50px;
    }
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<?php


    global $wpdb;
    $args['post__in'] = array();
    $products = $wpdb->get_results("SELECT ID FROM ".$wpdb->posts." WHERE `post_type`='product'",ARRAY_A);
    echo '<div style="overflow-x:auto;margin:15px;" align="center"> ';
        echo '<table class="table table-striped display" id="tabla" >' ;
          echo "<thead>";
            echo '<tr style="hover {background-color: #f5f5f5}"> 
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Producto ID</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Título</th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;"> Imagen</th> 
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Precio </th>
                  <th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;"><input type="text" id="search" placeholder="Buscar" class="form-control"></input></th>
                </tr>';
          echo "</thead>";
          ?>
    <form method="POST" action="">
        <?php
        $nuevoprecio = [];    
        foreach($products as $k => $v) {
            echo "<tbody>"; 
                $args['post__in'][] = $products[$k]['ID']; 
                $product = wc_get_product($products[$k]['ID']);
                // print_r ($product->post->post_title);
                if ($product->post->post_status == 'publish'){
                  echo "<tr>";
                      $src = wp_get_attachment_image_src( get_post_thumbnail_id($product->id), $size);
                      echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$product->id.'</td>'; 
                      echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$product->post->post_title.'</td>'; 
                      ?> <td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;"><div align="left"><img src="<?php  echo $src[0]; ?>" style="padding: 0px !important;height: 50px !important; width: 50px !important;"></div></td> <?php 
                          ?>
                      
                          <td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">
                              <input name="nuevoprecio[<?php echo $product->id;?>]" value="<?php echo $product->get_price(); ?>" class="form-control">
                          </td>
                          <td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">
                              
                          </td>
                <?php } ?>

             
        <?php
        }?>
    <button type="submit" class="btn btn-primary claseDelBoton">Cambiar precios</button>
    </form>
    <?php 
        if(!empty($_POST)){
            foreach ($_POST['nuevoprecio'] as $key => $value) {
                    // var_dump($value);

                  $precioFormatted = $value;
                  $reemplazar = ',';
                  $reemplazo = '.';
                  $precioFormatted = str_replace($reemplazar, $reemplazo, $precioFormatted);
                  // var_dump($precioFormatted);
                  $product_id = $key;
                  $precioFormattedFinal = floatval($precioFormatted);
                  $precioAnterior = get_post_meta($product_id, '_regular_price', true);
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
                  
            }

            wp_redirect($_SERVER['HTTP_REFERER']);
            die();
        }
        
        ?> 
        </tr>
            
        </tbody>
        </table>
        </div>
        <script type="text/javascript">
               $("#search").on("keyup", function() {
                    var value = $(this).val();

                    $("table tr").each(function(index) {
                        if (index !== 0) {

                            $row = $(this);

                            $row.find("td").each(function(){
                              var id = $(this).text();
                              if (id.indexOf(value) < 0) {
                                $row.hide();
                              }
                              else {
                                $row.show();
                                return false;
                              }
                            });
                        }
                    });
                });
        </script>
    <?php 