<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
	global $wpdb;
	$db_config = "SELECT * FROM sepm_product_type";
	$results = $wpdb->get_results($db_config);
	foreach( $results as $result ) {
				$id = $result->id;
				$sepm_id = $result->sepm_id;
	}
	
	if($_POST['pid'] == $sepm_id){
		$sepm_id = $_POST['pid'];
		$type = $_POST['ptype'];

	//	$query= $wpdb->insert('sepm_product_type',array( 'sepm_id'=>$sepm_id, 'pro_type'=>$type,) );
		
		$query = $wpdb->update('sepm_product_type', array('sepm_id'=>$sepm_id, 'pro_type'=>$type), array('id'=>$id));
		
		if($query){
				echo 'Updated!';
				exit;
			}
	}else{
		$sepm_id = $_POST['pid'];
		$type = $_POST['ptype'];

		$query= $wpdb->insert('sepm_product_type',array( 'sepm_id'=>$sepm_id, 'pro_type'=>$type,) );
		
		if($query){
				echo 'Updated!';
				exit;
			}
	}
