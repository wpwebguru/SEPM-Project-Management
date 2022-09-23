<?php
		global $wpdb;
		$db_config = "SELECT * FROM sepm_project_management";
		$results = $wpdb->get_results($db_config);
		$user_id = get_userdata($user_id);
		$current_user = wp_get_current_user();
?>

<div class="sepm_all_project_data">
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>PROJECT DETAILS</th>
					<th>PROJECT TYPE</th>
					<th>STATUS</th>
					<th>INSTALLATION START DATE</th>
					<th>CONTACT INFORMATION</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
			foreach( $results as $result ) {
							$id = $result->id;
							$author = $result->author;
							$project_name = $result->name;
							$address = $result->address;
							$project_type = $result->type;
							$status = $result->status;
							$startdate = $result->start_date;
							$start_date = date('j F, Y', strtotime($startdate)); 
							$phone = $result->phone;
							$email = $result->email;
							$format = date("j F, Y,"); 
							
							$real_user = $current_user->user_login;
			
			if($author == $real_user){
			?>
				<tr class="align-middle">
					<td>
						<p><a href="./?id=<?php echo $id;?>#edit_project" class="sepm_project_title"><?php echo $project_name;?></a><br>
						<?php echo $address;?></p>
					</td>
					<td><?php echo $project_type;?></td>
					<td><?php echo $status;?></td>
					<td><?php echo $start_date;?></td>
					<td class="sepm_contact_info">
						<p><a class="sepm_phone_icon" href="tel:<?php echo $phone;?>"><?php echo $phone;?></a>
							<br>
						<a class="sepm_email_icon" href="mailto:<?php echo $email;?>" ><?php echo $email;?></a>
						</p>
					</td>
				</tr>
			<?php	
				
				 }else{ ?>
					 <tr class="align-middle">
						<td></td>
						<td></td>
						<td><p class="sepm_no_found">You have no project !</p></td>
						<td></td>
						<td></td>
					 </tr>
				<?php }
			}
				
			?>
			</tbody>
		</table>
	</div>
</div>

<?php














