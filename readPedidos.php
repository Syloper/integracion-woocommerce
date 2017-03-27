<?php

    if(!empty($_POST)){
    	//LE ASIGNO A UNA VARIABLE EL USUARIO ELEGIDO	
    	$user = $_POST['selector']; 
    	//SI EL POST ES DEL BOTON ADDCSVSUBMIT (POR SI MAS ADELANTE HAY QUE AGREGARLE OTRO)
    	if($_POST['addcsvsubmit']){
			?>
			<?php
			//LEE EL ARCHIVO CSV, LO MUESTRA EN UNA TABLE Y LO GUARDA EN UNA NUEVA ORDEN
			$file = fopen($_FILES['archivo']['tmp_name'], 'r');
			global $woocommerce;

			$cart = new WC_Cart();

			$order = wc_create_order();

			echo '<div style="overflow-x:auto;margin:15px;" align="center"> ';
				echo '<table style="background-color:white; width:100%;" >' ;
					echo "<thead>";
						echo '<tr style="hover {background-color: #f5f5f5}"> 
									<th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">SKU</th>
									<th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">Cantidad</th>
						 			<th style="padding: 15px;text-align: left; background-color: #4CAF50; color: white; border-bottom: 2px solid #ddd;">ID Producto </th> 
						 	  </tr>';
					echo "</thead>";
				echo "<tbody>";

			while( $data = fgetcsv($file, 0, ',')) {
				
				echo "<tr>";
				$product_id = wc_get_product_id_by_sku( "$data[0]" );
				$product = wc_get_product($product_id);
				?>
				<?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$data[0].'</td>'; ?>
				<?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$data[1].'</td>'; ?>
				<?php echo '<td style="padding: 15px;text-align: left; border-bottom: 2px solid #ddd;">'.$product_id.'</td>'; ?>
				<?php
					if($product_id) {
						$order->add_product($product, $data[1]);
						$order->update_status( 'completed' );
						update_post_meta($order->id, '_customer_user', $user );
					}

				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo '</div>';
		}
	}else{
		// SI NO HAY NINGUN ARCHIVO ENVIADO POR POST
		?>
		<div class="wpap">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
			<form action="/wp-content/plugins/integracion-woocommerce/TEST-ADDPEDIDOS.csv">
			    <input type="submit" value="CSV de ejemplo" style="margin:10px;" />
			</form>

			<?php screen_icon() ?><h2>Importador de pedidos.</h2>

			<form method="POST" action="" enctype="multipart/form-data">

				<?php settings_fields("csv-group") ?>
				<?php @do_settings_fields("csv-group") ?>

				<table class="form-table">

					<input type="file" name="archivo" class="file" id="addcsv" />

				</table>
				<?php $users = get_users( $args ); ?> 

					<select class="select2" id="select2" name="selector">
					  <?php foreach ($users as $user) {
					  	?><option value="<?php echo($user->ID); ?>" ?>></strong><?php print_r($user->display_name); ?></strong>, <?php print_r($user->user_email); ?>, <?php print_r($user->ID); ?> </option>
					  <?php } ?> 
					</select>
				<input type="submit" name="addcsvsubmit">
			</form>
		</div>
		<script type="text/javascript">
			jQuery('.select2').select2();
		</script>
	<?php } ?>