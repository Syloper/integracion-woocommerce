<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REMOTE_ADDR']) {
$cli = false;
} else {
$cli = true;
}
global $wpdb;

if(!empty($_POST)){

  if($cli == true) {
    define('WP_USE_THEMES', false);
   global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
   require('../../../wp-load.php');
   if(file_exists('CTASCTES.XML')) {
       $precios = fopen($_FILES['archivo']['tmp_name'], 'r');
       } else {
       exit('error - archivo no existe');
       }//  print_r($precios);

  } else {
    $cuentaCorriente = fopen($_FILES['archivo']['tmp_name'], 'r');
  }

    $wpdb->show_errors();
  $i = 0;
  $insertedUsers = 0;
  $updatedCtaCte = 0;
while( $ctacte = fgetcsv($file, 0, ',')) {
    //if($i <= 0) {

        //vemos si existe, por numero y tipo
         $existeCtaCte = $wpdb->get_row("SELECT * FROM iw_ctacte WHERE fecha = '$ctacte[0]' AND numero = $ctacte[1] AND tipo = $ctacte[2]");
        // echo "SELECT * FROM iw_ctacte WHERE fecha = $ctacte[fecha] AND numero = $ctacte[numero] AND tipo = $ctacte[tipo]";
        // $existeCtaCte = false;
         //ver si cada registro es unico
         // csv va fecha - numero - tipo - importe
        if($ctacte[2] == 2) {
        $ctacte[3] = '-'. $ctacte[3];
        }
         if($existeCtaCte) {
         //  echo "SELECT * FROM iw_ctacte WHERE numero = $ctacte[numero]";
           $wpdb->update(
           'iw_ctacte',
           array(
             'user_id' => $ctacte['codigo'],
             'numero' => $ctacte['numero'],
             'importe' => $ctacte['importe'],
             'tipo' => $ctacte['tipo'],
             'deuda_total' => $ctacte['deudatotal'],
             'actualizado' => $ctacte['actualizad'],
             'fecha' => $ctacte['fecha'],
             'formulario' => $ctacte['formulario'],
           ),
           array( 'numero' => $ctacte[numero] )
            );
            $updatedCtaCte++;
         } else {

        $wpdb->insert(
          	'iw_ctacte',
          	array(
          		'user_id' => $ctacte['codigo'],
          		'numero' => $ctacte['numero'],
              'importe' => $ctacte['importe'],
              'tipo' => $ctacte['tipo'],
              'deuda_total' => $ctacte['deudatotal'],
              'actualizado' => $ctacte['actualizad'],
              'fecha' => $ctacte['fecha'],
              'formulario' => $ctacte['formulario'],
          	)
          );
          $insertedUsers++;
        }
    // }
      $i++;
    }
    echo "Se importaron " . $insertedUsers . " registros de Cuenta Corriente <br />";
    echo "Se actualizaron " . $updatedCtaCte . " registros de Cuenta Corriente <br />";

}else{
 ?>
<h1>Importar Cuenta Corriente</h1>
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="archivo" id="archivo" />
   <br />
   <br />

   <input type="submit" value="Subir!" />
 </form>
<?php } ?>