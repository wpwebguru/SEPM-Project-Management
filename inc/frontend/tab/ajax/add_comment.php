<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
global $wpdb;
if(!empty($_POST['sepm_comment_msg']) && !empty($_POST['current_userid'])){
		$user_id = $_POST['current_userid'];
		$user_name = $_POST['current_user_name'];
		$user_msg = $_POST['sepm_comment_msg'];
		$datetime = $_POST['current_datetime'];
		
		
		$query = $wpdb->insert('sepm_comments',
							array(
								'user_id'=>$user_id,
								'user_name'=>$user_name,
								'datetime'=>$datetime,
								'comments'=>$user_msg,
								) );
		if($query){
			echo 2;
			exit;
		}
		
	}else{
		echo 0;
		exit;
	}




















