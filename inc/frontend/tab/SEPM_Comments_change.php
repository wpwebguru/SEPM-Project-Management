<?php
	global $wpdb;
	$user_id = get_userdata($user_id);
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;
	$username = $current_user->user_login;
	$user_fname = $current_user->user_firstname;
	$user_lname = $current_user->user_lastname;
	$current_datetime = current_datetime()->format('Y-m-d H:i:s');
	
	
	$db_config = "SELECT * FROM sepm_comments ORDER BY datetime DESC";
	$results = $wpdb->get_results($db_config);
?>
<div class="sepm_comments_section">
	<div class="container">
		<div class="row gx-5">
			<div class="col-sm-8">
				<div class="sepm_comments_content">
					<h3 class="all_comments">All Comments</h3>
					<hr style="width:100%; max-width: 100% !important; border-width: 3px; color: #909090;">
					<table id="sepm_comment_data_show">
					
						
						
					</table>
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="sepm_comments_form sepm_btn_style">
					<div class="sepm_message_sec">
						<h3 class="success_comments"></h3>
					</div>
					
					<form action="" method="post" id="add_comment_form">
						<textarea name="sepm_comment_msg" id="sepm_comment_msg" class="form-control sepm_comment_box"></textarea>
						<!-- Hidden value-->
						<input type="hidden" name="current_userid" value="<?php echo $user_id; ?>"/>
						<input type="hidden" name="current_user_name" value="<?php echo $user_fname.' '.$user_lname; ?>"/>
						<input type="hidden" name="current_datetime" value="<?php echo $current_datetime; ?>"/>
						<input type="submit" name="add_comment" class="btn sepm_btn" value="Add comment"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#add_comment_form").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo plugins_url('ajax/add_comment.php', __FILE__);?>",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					if(data == 2){
						$(".success_comments").css('display','block');
						$(".success_comments").css('color','rgb(13,166,13)');
						$(".success_comments").html("Success!").fadeOut(4000);
						$("#add_comment_form")[0].reset();
					}else if(data == 0){
						$(".success_comments").css('display','block');
						$(".success_comments").css('color','red');
						$(".success_comments").html("Oops! Something Wrong.").fadeOut(4000);
					}
				}
			});
		}));
		setInterval(function(){
			$('#sepm_comment_data_show').load('<?php echo plugins_url('setInterval/comment_loop.php', __FILE__);?>').fadeIn('slow');
		}, 1000);
		
	});
</script>