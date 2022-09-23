<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
			
	global $wpdb;
	//global $sepm_finish ;
	
	$id = $_REQUEST['id'];
	
	$productCOMP = get_option('complete_product_step');
	$planCOMP = get_option('complete_plan_step');
	$subconCOMP = get_option('complete_subcon_step');
	$buildCOMP = get_option('complete_build_step');
	$electCOMP = get_option('complete_elect_step');
	$finanCOMP = get_option('complete_finan_step');
	
	$db_config = "SELECT * FROM sepm_project_management WHERE id='" . $id . "'";
	$results = $wpdb->get_results($db_config);
	foreach( $results as $result ) {
		
				$status = $result->status;
	}
		
?>

			<p class="comp_item_name">
				<?php
					if(!empty($productCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-products">Products</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-products">Products</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-products">Products</a>';
					}
				?>
				
			</p>
			
			<p class="comp_item_name">
				<?php
					if(!empty($planCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-planning">Planning</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-planning">Planning</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-planning">Planning</a>';
					}
				?>
				
			</p>
			
			<p class="comp_item_name">
				<?php
					if(!empty($subconCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-subcontractor">Subcontractor</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-subcontractor">Subcontractor</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-subcontractor">Subcontractor</a>';
					}
				?>
				
			</p>
			
			<p class="comp_item_name">
				<?php
					if(!empty($buildCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-build">Build</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-build">Build</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-build">Build</a>';
					}
				?>
				
			</p>
			
			<p class="comp_item_name">
				<?php
					if(!empty($electCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-electrician">Electrician</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-electrician">Electrician</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-electrician">Electrician</a>';
					}
				?>
				
			</p>
			
			<p class="comp_item_name">
				<?php
					if(!empty($finanCOMP)){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-financial">Financial</a>';
					}else if($status == 'Finished'){
						echo '<i class="fa-solid fa-check"></i><a href="#" class="link-summary" id="link-summary-financial">Financial</a>';
					}else{
						echo '<i class="fa-solid fa-xmark"></i><a href="#" class="link-summary" id="link-summary-financial">Financial</a>';
					}
				?>
				
			</p>

		




