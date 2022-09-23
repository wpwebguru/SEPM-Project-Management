<?php
		global $wpdb;
		$id = $_REQUEST['id'];
		$db_config = "SELECT * FROM sepm_plan_file WHERE sepm_id=$id";
		$results = $wpdb->get_results($db_config);
?>
<div class="sepm_plannig_content edit_project_sub_content">
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form id="form" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="uploadImage">Please upload specified file to the sections below. They are required for project documentation purposes.</label>
						<input id="uploadImage" placeholder="kkkk" type="file" accept="image/*" name="image" />
					</div>
					
					<div class="form-group sepm_btn_style">
						<input type="hidden" name="sepm_post_id_hidden" value="<?php echo $_REQUEST['id']; ?>" />
						<input type="hidden" name="sepm_post_id" value="<?php echo $_REQUEST['id']; ?>" />
						<input class="btn sepm_btn" id="file_upload" type="submit" name="submit" value="Upload">
					</div>
				</form>
				
				<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Download</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="sepm_hide">
				
				<?php foreach( $results as $result ) {
												$id = $result->id;
												$sepm_id = $result->sepm_id;
												$file_name = $result->file_name;
												?>
									<tr class="plan_data">
										<td><?php echo $file_name; ?></td>
										<td><a class="sepm_file_name" href="<?php echo plugins_url('ajax/uploads/'.$file_name, __FILE__);?>" target="_blank">Download</a></td>
										<td>
											<span class='p_delete' data-id='<?php echo $id;?>' data-name='<?php echo $file_name;?>'>Delete</span>
										</td>
									</tr>
				<?php 		} ?>
									
					
                </tbody>
				<tbody id="update_div">
				</tbody>
				</table>
				
			</div>
			<div class="col-sm-2">
				
				<?php 
					if (isset($_POST['complete_plan_step']) && isset($_POST['action']) && $_POST['action'] == "update_theme"){
						if (wp_verify_nonce($_POST['sepm_plugin_frontend'],'update-options')){ 
							update_option('complete_plan_step',$_POST['complete_plan_step']);
						}
					}
				?>


				<form id="save-theme" name="save-theme" action="" method="post">
				
					<input type="hidden" name="complete_plan_step" value="sepmcomp" />
					
					<?php wp_nonce_field('update-options','sepm_plugin_frontend'); ?>
					<input type="hidden" name="action" value="update_theme">
					<input type="submit" name="update-options" value="Mark as Completed">
					
				</form>
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

	 // Delete 
	 $('.p_delete').click(function(){
	   var el = this;
	  
	   // Delete id
	   var deleteid = $(this).data('id');
	   
	   var imgElement_src = $(this).data('name');
	   
	//   var imgElement_src = $( '.sepm_file_name' ).attr("href");
	   
	   var confirmalert = confirm("Are you sure?");
	   if (confirmalert == true) {
		  // AJAX Request
		  $.ajax({
			url: '<?php echo plugins_url('ajax/plan_delete.php', __FILE__);?>',
			type: 'POST',
			data: { id:deleteid, name: imgElement_src },
			success: function(response){
			  if(response == 1){
		// Remove row from HTML Table
		$(el).closest('tr.plan_data').css('background','tomato');
		$(el).closest('tr.plan_data').fadeOut(600,function(){
		   $(this).remove();
		});
			  }else{
		alert('Oops! Something wrong.');
			  }

			}
		  });
	   }

	 });
	 
	// Form submit

	$("#form").on('submit',(function(e) {
	  e.preventDefault();
	  $.ajax({
	  // url: "ajaxupload.php",
	   url: "<?php echo plugins_url('ajax/plan_submit.php', __FILE__);?>",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
			 cache: false,
	   processData:false,
	   beforeSend : function(){
		$("#sepm_hide").fadeOut();
	   // $("#err").fadeOut();
	   },
	   success: function(data){
		  $("#update_div").html(data);
		if(data=='invalid'){
		 // invalid file format.
		 $("#err").html("Invalid File !").fadeIn();
		}else{
		 // view uploaded file.
		 $("#preview").html(data).fadeIn();
		 $("#form")[0].reset(); 
		}
		  },
		 error: function(e) {
		$("#err").html(e).fadeIn();
		  }          
		});
	}));
});

</script>
