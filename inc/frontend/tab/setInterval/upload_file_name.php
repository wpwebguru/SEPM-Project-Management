<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
			
	global $wpdb;
	$id = $_REQUEST['id'];
	
	// Product Tab Data loop
	$db_config = "SELECT * FROM sepm_product_file WHERE sepm_id='" . $id . "'";
	$results = $wpdb->get_results($db_config);
	if(!empty($results)){
		?>
	<h4 class="sepm_product_name">Products</h4>
	<?php
	foreach( $results as $result ) {
				$file_name = $result->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name;?></p>
			<?php					
			}
	}
	
	
	// Planning tab loop
	$db_config1 = "SELECT * FROM sepm_plan_file WHERE sepm_id='" . $id . "'";
	$results1 = $wpdb->get_results($db_config1);
	if(!empty($results1)){
		?>
	<h4 class="sepm_product_name">Planning</h4>
	<?php
	foreach( $results1 as $result1 ) {
				$file_name1 = $result1->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name1;?></p>
			<?php					
			}
	}
	
	// Subcontractor tab loop
	$db_config2 = "SELECT * FROM sepm_subcontractor_file WHERE sepm_id='" . $id . "'";
	$results2 = $wpdb->get_results($db_config2);
	if(!empty($results2)){
		?>
	<h4 class="sepm_product_name">Subcontractor</h4>
	<?php
	foreach( $results2 as $result ) {
				$file_name2 = $result->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name2;?></p>
			<?php					
			}
	}
	
	// Build tab loop
	$db_config3 = "SELECT * FROM sepm_build_file WHERE sepm_id='" . $id . "'";
	$results3 = $wpdb->get_results($db_config3);
	if(!empty($results3)){
		?>
	<h4 class="sepm_product_name">Build</h4>
	<?php
	foreach( $results3 as $result ) {
				$file_name3 = $result->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name3;?></p>
			<?php					
			}
	}
	
	// Electrician tab loop
	$db_config4 = "SELECT * FROM sepm_electrician_file WHERE sepm_id='" . $id . "'";
	$results4 = $wpdb->get_results($db_config4);
	if(!empty($results4)){
		?>
	<h4 class="sepm_product_name">Electrician</h4>
	<?php
	foreach( $results4 as $result ) {
				$file_name4 = $result->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name4;?></p>
			<?php					
			}
	}
	
	// Financial tab loop
	$db_config5 = "SELECT * FROM sepm_financial_file WHERE sepm_id='" . $id . "'";
	$results5 = $wpdb->get_results($db_config5);
	if(!empty($results5)){
		?>
	<h4 class="sepm_product_name">Financial</h4>
	<?php
	foreach( $results5 as $result ) {
				$file_name5 = $result->file_name;
				?>
				<p class="sepm_file_name"><?php echo $file_name5;?></p>
			<?php					
			}
	}
	
	