<?php 
	global $wpdb;
	$user_id = get_userdata($user_id);
	$current_user = wp_get_current_user();
	
?>

<div class="sepm_content_body">
	<div class="container">
		<div class="row sepm_wel_msg">
			<h1 class="sepm_h1">Welcome <?php  echo $current_user->user_firstname;?> !</h1>
		</div>
		
		<div class="row sepm_dash_content">
			<div class="col-sm-5">
				<h3>Activities in your projects</h3>
					<p>new projects since Friday 5pm</p>
					<p>projects are overdue</p>
					<p>projects with activity today</p>
					<p>projects with activity this week</p>
					<p>projects with activity next week</p>
			</div>
			
			<div class="col-sm-7 dash_activity">
				<h3>Latest comments & changes</h3>
				
				<div class="panel with-nav-tabs panel-primary">
					<table id="sepm_dashboard_comment"></table>
				</div>
				
				
			</div>
			
		</div>
		<div class="sepm_space"></div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
			$('#sepm_dashboard_comment').load('<?php echo plugins_url('tab/setInterval/comment_loop.php', __FILE__);?>').fadeIn('slow');
		}, 1000);
		
		

		
		
		
	});
</script>


<?php


























