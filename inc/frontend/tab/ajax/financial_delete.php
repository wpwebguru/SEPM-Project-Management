<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
global $wpdb;
if(isset($_POST['id'])){
						
			global $wpdb;
			$id = $_POST['id'];
			$name = $_POST['name'];
			
			if($id>0){
				$query = $wpdb->delete( 'sepm_financial_file', array( 'id' => $id ) );
				
				if($query){
					$unlink = unlink('uploads/'.$name);
					echo 1;
					exit;
				}else{
					echo 0;
					exit;
				  }
				}
			}
			






