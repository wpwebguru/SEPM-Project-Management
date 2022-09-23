<?php
	global $wpdb;
	$user_id = get_userdata($user_id);
	$current_user = wp_get_current_user();
	
	if(isset($_POST['sepm_add_new_project']) && !empty($_POST['sepm_author'])){
		$project_author = $_POST['sepm_author'];
		$project_name = $_POST['sepm_project_name'];
		$project_address = $_POST['sepm_project_address'];
		$project_type = $_POST['sepm_project_type'];
		$project_status = $_POST['sepm_project_status'];
		//$project_start = $_POST['sepm_project_start_date'];
		$project_start = date('Y-m-d', strtotime($_POST['sepm_project_start_date']));
		$project_phone = $_POST['sepm_project_phone'];
		$project_email = $_POST['sepm_project_email'];
		
		
		$query = $wpdb->insert('sepm_project_management',
							array(
								'author'=>$project_author,
								'name'=>$project_name,
								'address'=>$project_address,
								'type'=>$project_type,
								'status'=>$project_status,
								'start_date'=>$project_start,
								'phone'=>$project_phone,
								'email'=>$project_email,
								) );
		
		
	}

?>

<div class="sepm_new_project_body">
	
	<div class="container">
			<form action="" method="POST" class="row g-3 sepm_new_project">
				<div class="col-md-6">
					<label for="sepm_project_name" class="form-label">Name <span class="sepm_required">*</span></label>
					<input type="text" name="sepm_project_name" id ="sepm_project_name" class="form-control" required />
				</div>
				
				<div class="col-md-6">
					<label for="sepm_project_address" class="form-label">Address <span class="sepm_required">*</span></label>
					<input type="text" name="sepm_project_address" id ="sepm_project_address" class="form-control" required />
				</div>
				
				<div class="col-md-12 row" style="margin-top: 20px;">
				
					<div class="col-md-4">
						<label for="sepm_project_type" class="form-label">Type</label>
						<input type="text" name="sepm_project_type" id ="sepm_project_type" class="form-control" value="PV system" readonly />
					</div>
					
					<div class="col-md-4">
						<label for="sepm_project_status" class="form-label">Status <span class="sepm_required">*</span></label>
							<select class="form-select" aria-label="Default select example" name="sepm_project_status" id ="sepm_project_status">
								  <option value="Pending">Pending</option>
								  <option value="Working">Working</option>
								  <option value="Finished">Finished</option>
							</select>
					</div>
					
					<div class="col-md-4">
						<label for="sepm_project_start_date" class="form-label">Installation Start Date <span class="sepm_required">*</span></label>
						<input type="date" name="sepm_project_start_date" id ="sepm_project_start_date" class="form-control" required />
					</div>
					
				</div>
				
				<div class="col-md-12 row" style="margin-top: 20px;">
					<div class="col-md-4">
						<label for="sepm_project_phone" class="form-label">Contact Number <span class="sepm_required">*</span></label>
						<input type="text" name="sepm_project_phone" id ="sepm_project_phone" class="form-control" placeholder="eg:+123456789" required />
					</div>
					
					<div class="col-md-4">
						<label for="sepm_project_email" class="form-label">Contact Email <span class="sepm_required">*</span></label>
						<input type="email" name="sepm_project_email" id ="sepm_project_email" class="form-control" required />
					</div>
					
					
				</div>
				
				<div class="col-md-12">
				
					<!--- Hidden Value -->
					
					<input type="hidden" name="sepm_author" value="<?php echo $current_user->user_login;?>" />
				
				
					<p style="padding-top: 20px; text-align: right;">
						<input type="submit" value="Add Project" name="sepm_add_new_project" class="btn sepm_btn" />
					</p>
				</div>
				
				
				
				
			</form>
	</div>
</div>

<?php




