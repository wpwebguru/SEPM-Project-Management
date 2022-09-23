<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
			
	global $wpdb;
	
	$db_config = "SELECT * FROM sepm_comments ORDER BY datetime DESC";
	$results = $wpdb->get_results($db_config);
	
	
	foreach( $results as $result ) {
								$id = $result->id;
								$user_id = $result->user_id;
								$user_name = $result->user_name;
								$message = $result->comments;
								$datetime = $result->datetime;
								
								$user_avatar = esc_url( get_avatar_url( $user_id ) );
					?>
						<tr class="sepm_comment_info">
							<td width="90">
								<img class="sepm_comment_user_avater" src="<?php echo $user_avatar; ?>" alt="" width="90" height="90" />
							</td>
							<td>
								<h3 class="comment_user_name"><?php echo $user_name;?><span class="datetime"><?php echo time_elapsed_string($datetime, true); ?></span></h3>
								<p class="sepm_comment_message"><?php echo $message; ?></p>
							</td>
						</tr>
					<?php } 
					
					
					function time_elapsed_string($datetime, $full = false) {
							$now = new DateTime;
							$ago = new DateTime($datetime);
							$diff = $now->diff($ago);

							$diff->w = floor($diff->d / 7);
							$diff->d -= $diff->w * 7;

							$string = array(
								'y' => 'year',
								'm' => 'month',
								'w' => 'week',
								'd' => 'day',
								'h' => 'hour',
								'i' => 'minute',
							);
							foreach ($string as $k => &$v) {
								if ($diff->$k) {
									$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
								} else {
									unset($string[$k]);
								}
							}

							if (!$full) $string = array_slice($string, 0, 1);
							return $string ? implode(', ', $string) . ' ago' : 'just now';
						}
					
					
					
					
					
					
					
					
					
					