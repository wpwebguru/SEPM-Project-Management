<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
			
	global $wpdb;			
					
		if (isset($_POST['stylesheet']) && isset($_POST['action']) && $_POST['action'] == "update_theme"){
			if (wp_verify_nonce($_POST['theme_front_end'],'update-options')){ 
				update_option('my_theme_style',$_POST['stylesheet']);
			}
		}
	?>


	<form id="save-theme" name="save-theme" action="" method="post">
	
		<input type="hidden" name="stylesheet" value="sepmcomp1" />
		<input type="text" value="<?php echo get_option('my_theme_style');?>" />
		
		<?php wp_nonce_field('update-options','theme_front_end'); ?>
		<input type="hidden" name="action" value="update_theme">
		<input type="submit" name="update-options" value="Mark as Completed">
		
	</form>