<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
			
	global $wpdb;
	
	if(!empty($_POST['sepm_project_id'] && $_POST['sepm_project_completed'])){
		$proID = $_POST['sepm_project_id'];
		$proStatus = $_POST['sepm_project_completed'];
		
		$query = $wpdb->update('sepm_project_management', array('status'=>$proStatus), array('id'=>$proID));
		
		if($query){
			echo 'finished';
			exit;
		}
		
		
	}else{
		echo 'wrong';
		exit;
	}