<?php
		global $wpdb;
		$id = $_REQUEST['id'];
		$db_config = "SELECT * FROM sepm_project_management WHERE id=$id";
		$results = $wpdb->get_results($db_config);
		$user_id = get_userdata($user_id);
		$current_user = wp_get_current_user();
		foreach( $results as $result ) {
								$id = $result->id;
								$author = $result->author;
								$name = $result->name;
								$address = $result->address;
								$type = $result->type;
								$status = $result->status;
								$start_date = $result->start_date;
								$phone = $result->phone;
								$email = $result->email;
								 } 
?>

<div class="sepm_edit_project_section">
	<div class="row sepm_edit_project_head">
		<div class="container">
			<div class="col-md-8">
				<h3 class="sepm_address_info"><?php echo $address; ?></h3>
				<p class="sepm_info_box">
					<span class="sepm_name"><?php echo $name; ?></span>
					<span class="sepm_phone"><a class="sepm_phone_icon" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></span>
					<span class="sepm_email"><a class="sepm_email_icon" href="mailto:<?php echo $email; ?>" ><?php echo $email; ?></a></span>
					
				</p>
			</div>
			
			<div class="col-md-4">
				<table class="sepm_agent_info_box">
					<tr>
						<td width="60" class="sepm_agent_img"><img class="sepm_agent_avater" src="<?php echo plugins_url('sepm-project-management/assets/frontend/img/agent_avater.png'); ?>" width="60" height="60" alt="" /></td>
						<td>
							<p class="sepm_agent_name">Yohannes Asmar</p>
							<p class="sepm_agent_phone"><a class="sepm_phone_icon" href="tel:+46708420260">+46 70 842 0260</a></p>
							<p class="sepm_agent_email"><a class="sepm_email_icon" href="mailto:yohannes@solarentreprenad.com">yohannes@solarentreprenad.com</a></p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel with-nav-tabs panel-primary" id="sepm_sub_tab">
				<div class="panel-heading">
					<ul class="nav nav-tabs">
						<li class="active <?= $tab == "description" ? 'active' : '' ?>"><a href="#description" data-toggle="tab">Description</a></li>
						<li class="<?= $tab == "products" ? 'active' : '' ?>"><a href="#products" data-toggle="tab">Products</a></li>
						<li class="<?= $tab == "planning" ? 'active' : '' ?>"><a href="#planning" data-toggle="tab">Planning</a></li>
						<li class="<?= $tab == "comments" ? 'active' : '' ?>"><a href="#comments" data-toggle="tab">Comments & changes</a></li>
						<li class="<?= $tab == "subcontractor" ? 'active' : '' ?>"><a href="#subcontractor" data-toggle="tab">Subcontractor</a></li>
						<li class="<?= $tab == "build" ? 'active' : '' ?>"><a href="#build" data-toggle="tab">Build</a></li>
						<li class="<?= $tab == "electrician" ? 'active' : '' ?>"><a href="#electrician" data-toggle="tab">Electrician</a></li>
						<li class="<?= $tab == "financial" ? 'active' : '' ?>"><a href="#financial" data-toggle="tab">Financial</a></li>
						<li class="<?= $tab == "completion" ? 'active' : '' ?>"><a href="#completion" data-toggle="tab">Summary & Completion</a></li>
						
						
						
						
					</ul>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="description"><?php include ('tab/SEPM_Description.php');?></div>
						<div class="tab-pane fade" id="products"><?php include ('tab/SEPM_Products.php');?></div>
						<div class="tab-pane fade" id="planning"><?php include ('tab/SEPM_Planning.php');?></div>
						<div class="tab-pane fade" id="comments"><?php include ('tab/SEPM_Comments_change.php');?></div>
						<div class="tab-pane fade" id="subcontractor"><?php include ('tab/SEPM_Subcontractor.php');?></div>
						<div class="tab-pane fade" id="build"><?php include ('tab/SEPM_Build.php');?></div>
						<div class="tab-pane fade" id="electrician"><?php include ('tab/SEPM_Electrician.php');?></div>
						<div class="tab-pane fade" id="financial"><?php include ('tab/SEPM_Financial.php');?></div>
						<div class="tab-pane fade" id="completion"><?php include ('tab/SEPM_Completion.php');?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
/*	$(document).ready(function(){
		setInterval(function(){
			$('#div').load('src.php').fadeIn('slow');
		}, 1000);
	});*/
</script>