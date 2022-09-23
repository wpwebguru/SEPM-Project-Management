<?php
		global $wpdb;
		$id = $_REQUEST['id'];
		
?>
<div class="sepm_project_description">
	<div class="container">
		<div class="row gx-5">
			<div class="col-sm-6">
				<div class="sepm_box_shadow">
					<h3><i class="fa-solid fa-triangle-exclamation"></i> Disclaimer</h3>
					<p>The information provided is based on customer input and/or publicly available databases and may be incorrect.</p>

					<p>You are responsible for verifying the information, the layout requested by the customer, and for evaluating whether the installation can be conducted as described.</p>

					<p>You as the installer is responsible for electrical engineering including dimensioning and selection of equipment such as inverters, cables etc.</p>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="sepm_box_shadow">
					<h3>Suggested equipment</h3>
					<div class="alert_warning">
						<h4><i class="fa-solid fa-triangle-exclamation"></i> Remember to verify suitability</h4>
						<p>The suggested equipment is automatically generated based on your cost model. Remember to verify suitability and change if needed.</p>
					</div>
					<div id="sepm_upload_file_name">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
			$('#sepm_upload_file_name').load('<?php echo plugins_url('setInterval/upload_file_name.php?id='.$id, __FILE__);?>').fadeIn('slow');
		}, 1000);
	});
</script>