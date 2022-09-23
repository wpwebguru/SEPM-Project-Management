<?php
		global $wpdb;
		$id = $_REQUEST['id'];
		$db_config = "SELECT * FROM sepm_product_file WHERE sepm_id=$id";
		$results = $wpdb->get_results($db_config);
		
		$dconfig = "SELECT * FROM sepm_product_type";
		$Presults = $wpdb->get_results($dconfig);
		foreach( $Presults as $presult ) {
						$pro_type = $presult->pro_type;
		}						
?>
<div class="sepm_plannig_content">
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
			
				<!-- Product Type choose form -->
				<!--
				<form action="" method="post" id="sepm_products_type_form">
					
						<p class="autosave_sec"><span id="autosave_success"></span></p>
					
					
					<label for="sepm_products_type"><strong>Products Type</strong> <span class="sepm_required">*</span></label>
					<select name="sepm_products_type" id="sepm_products_type" required>
						<option value="">None</option>
						<option value="Panels" <?php // if($pro_type=='Panels'){echo 'selected';}?> >Panels</option>
						<option value="Inverters" <?php // if($pro_type=='Inverters'){echo 'selected';}?> >Inverters</option>
						<option value="Material" <?php // if($pro_type=='Material'){echo 'selected';}?> >Material</option>
					</select>
					<input type="hidden" id="sepm_project_id" name="sepm_project_id" value="<?php echo $_REQUEST['id']; ?>" />
					
				</form>
				-->
				
				<!-- Product Panels file upload form -->
				<form id="panels_product_form" action="" method="post" enctype="multipart/form-data">
				
					<div class="form-group">
						<h3>Panels <span class="sepm_required">*</span></h3>
						<p>Please upload specified file to the sections below. They are required for project documentation purposes.</p>
						<input id="uploadImage" placeholder="" type="file" accept="image/*" name="image" />
					</div>
					
					<div class="form-group sepm_btn_style">
						<input type="hidden" name="sepm_post_id_hidden" value="<?php echo $_REQUEST['id']; ?>" />
						<input type="hidden" name="sepm_type_panels" value="panels" />
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
                <tbody id="panels_product_hide">
				
				<?php foreach( $results as $result ) {
												$id = $result->id;
												$sepm_id = $result->sepm_id;
												$type = $result->type;
												$file_name = $result->file_name;
							if($type == 'panels'){
										?>
								<tr class="product_data">
									<td><?php echo $file_name; ?></td>
									<td><a class="sepm_file_name" href="<?php echo plugins_url('ajax/uploads/'.$file_name, __FILE__);?>" target="_blank">Download</a></td>
									<td>
										<span class='product_delete' data-id='<?php echo $id;?>' data-name='<?php echo $file_name;?>'>Delete</span>
									</td>
								</tr>	
				<?php 		}
						} 
					?>
								
                </tbody>
				<tbody id="panels_product_div">
				</tbody>
				</table>
				
				<!-- Product Inverters file upload form -->
				<form id="inverters_product_form" action="" method="post" enctype="multipart/form-data">
				
					<div class="form-group">
						<h3>Inverters <span class="sepm_required">*</span></h3>
						<p>Please upload specified file to the sections below. They are required for project documentation purposes.</p>
						<input id="uploadImage" placeholder="" type="file" accept="image/*" name="image" />
					</div>
					
					<div class="form-group sepm_btn_style">
						<input type="hidden" name="sepm_post_id_hidden" value="<?php echo $_REQUEST['id']; ?>" />
						<input type="hidden" name="sepm_type_inverters" value="inverters" />
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
                <tbody id="inverters_product_hide">
				
				<?php foreach( $results as $result ) {
												$id = $result->id;
												$sepm_id = $result->sepm_id;
												$type = $result->type;
												$file_name = $result->file_name;
							if($type == 'inverters'){
										?>
								<tr class="product_data">
									<td><?php echo $file_name; ?></td>
									<td><a class="sepm_file_name" href="<?php echo plugins_url('ajax/uploads/'.$file_name, __FILE__);?>" target="_blank">Download</a></td>
									<td>
										<span class='product_delete' data-id='<?php echo $id;?>' data-name='<?php echo $file_name;?>'>Delete</span>
									</td>
								</tr>	
				<?php 		}
						} 
					?>
								
                </tbody>
				<tbody id="inverters_product_div">
				</tbody>
				</table>
				
				
				<!-- Product Material file upload form -->
				<form id="material_product_form" action="" method="post" enctype="multipart/form-data">
				
					<div class="form-group">
						<h3>Material <span class="sepm_required">*</span></h3>
						<p>Please upload specified file to the sections below. They are required for project documentation purposes.</p>
						<input id="uploadImage" placeholder="" type="file" accept="image/*" name="image" />
					</div>
					
					<div class="form-group sepm_btn_style">
						<input type="hidden" name="sepm_post_id_hidden" value="<?php echo $_REQUEST['id']; ?>" />
						<input type="hidden" name="sepm_type_material" value="material" />
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
                <tbody id="material_product_hide">
				
				<?php foreach( $results as $result ) {
												$id = $result->id;
												$sepm_id = $result->sepm_id;
												$type = $result->type;
												$file_name = $result->file_name;
							if($type == 'material'){
										?>
								<tr class="product_data">
									<td><?php echo $file_name; ?></td>
									<td><a class="sepm_file_name" href="<?php echo plugins_url('ajax/uploads/'.$file_name, __FILE__);?>" target="_blank">Download</a></td>
									<td>
										<span class='product_delete' data-id='<?php echo $id;?>' data-name='<?php echo $file_name;?>'>Delete</span>
									</td>
								</tr>	
				<?php 		}
						} 
					?>
								
                </tbody>
				<tbody id="material_product_div">
				</tbody>
				</table>
				
			</div>
			
			
			<div class="col-sm-2 edit_project_sub_content">
			
			<?php 
					if (isset($_POST['complete_product_step']) && isset($_POST['action']) && $_POST['action'] == "update_theme"){
						if (wp_verify_nonce($_POST['sepm_plugin_frontend'],'update-options')){ 
							update_option('complete_product_step',$_POST['complete_product_step']);
						}
					}
				?>

				<form id="save-theme" name="save-theme" action="" method="post">
				
					<input type="hidden" name="complete_product_step" value="sepmcomp" />
					
					<?php wp_nonce_field('update-options','sepm_plugin_frontend'); ?>
					<input type="hidden" name="action" value="update_theme">
					<input type="submit" name="update-options" value="Mark as Completed">
					
				</form>
				<!--
				<form id="product_completed" action="" method="post">
				
					<input type="hidden" name="complete_product_step" value="completed" />
					<input type="hidden" name="sepm_id" value="<?php // echo $_REQUEST['id']; ?>">
					<input type="submit" name="submit" value="Mark as Completed">
					
				</form>
				-->
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		/*
		function autosave(){
			var sepm_id = $('#sepm_project_id').val();
			var sepm_type = $('#sepm_products_type').val();
			
			if(sepm_id != '' && sepm_type != ''){
				$.ajax({
					url: "<?php echo plugins_url('ajax/product_type_select.php', __FILE__);?>",
					method: "POST",
					data:{pid:sepm_id, ptype:sepm_type},
					dataType:"text",
					success: function(data){
							
						if(data == 'Updated!'){
							$("#autosave_success").css('display','block');
							$("#autosave_success").html(data).fadeOut(2000);
							
						}else{
							$("#autosave_success").css('display','block');
							$("#autosave_success").html(data).fadeOut(2000);
						}
					}
				});
			}
			return false;
		}
		setInterval(function(){   
           autosave();   
           }, 1000);
		
		*/
		
		
		
		

	 // Delete 
	 $('.product_delete').click(function(){
	   var el = this;
	  
	   // Delete id
	   var deleteid = $(this).data('id');
	   
	   var imgElement_src = $(this).data('name');
	   
	//   var imgElement_src = $( '.sepm_file_name' ).attr("href");
	   
	   var confirmalert = confirm("Are you sure?");
	   if (confirmalert == true) {
		  // AJAX Request
		  $.ajax({
			url: '<?php echo plugins_url('ajax/product_delete.php', __FILE__);?>',
			type: 'POST',
			data: { id:deleteid, name: imgElement_src },
			success: function(response){
			  if(response == 1){
		// Remove row from HTML Table
		$(el).closest('tr.product_data').css('background','tomato');
		$(el).closest('tr.product_data').fadeOut(600,function(){
		   $(this).remove();
		});
			  }else{
		alert('Oops! Something wrong.');
			  }

			}
		  });
	   }

	 });
	 
	// Panels Form submit
	$("#panels_product_form").on('submit',(function(e) {
	  e.preventDefault();
	  $.ajax({
	  // url: "ajaxupload.php",
	   url: "<?php echo plugins_url('ajax/product_submit_panels.php', __FILE__);?>",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
			 cache: false,
	   processData:false,
	   beforeSend : function(){
		$("#panels_product_hide").fadeOut();
	   // $("#err").fadeOut();
	   },
	   success: function(data){
		  $("#panels_product_div").html(data);
		if(data=='invalid'){
		 // invalid file format.
		 $("#err").html("Invalid File !").fadeIn();
		}else{
		 // view uploaded file.
		 $("#panels_product_form")[0].reset(); 
		}
		  }         
		});
	}));
	
	// inverters Form submit
	$("#inverters_product_form").on('submit',(function(e) {
	  e.preventDefault();
	  $.ajax({
	  // url: "ajaxupload.php",
	   url: "<?php echo plugins_url('ajax/product_submit_inverters.php', __FILE__);?>",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
			 cache: false,
	   processData:false,
	   beforeSend : function(){
		$("#inverters_product_hide").fadeOut();
	   // $("#err").fadeOut();
	   },
	   success: function(data){
		  $("#inverters_product_div").html(data);
		if(data=='invalid'){
		 // invalid file format.
		 $("#err").html("Invalid File !").fadeIn();
		}else{
		 // view uploaded file.
		 $("#inverters_product_form")[0].reset(); 
		}
		  }         
		});
	}));
	
	
	// material Form submit
	$("#material_product_form").on('submit',(function(e) {
	  e.preventDefault();
	  $.ajax({
	  // url: "ajaxupload.php",
	   url: "<?php echo plugins_url('ajax/product_submit_material.php', __FILE__);?>",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
			 cache: false,
	   processData:false,
	   beforeSend : function(){
		$("#material_product_hide").fadeOut();
	   // $("#err").fadeOut();
	   },
	   success: function(data){
		  $("#material_product_div").html(data);
		if(data=='invalid'){
		 // invalid file format.
		 $("#err").html("Invalid File !").fadeIn();
		}else{
		 // view uploaded file.
		 $("#material_product_form")[0].reset(); 
		}
		  }         
		});
	}));
	
/*	// Product Completed Form
	$("#material_product_form").on('submit',(function(e) {
	  e.preventDefault();
	  $.ajax({
	  // url: "ajaxupload.php",
	   url: "<?php echo plugins_url('ajax/product_submit_material.php', __FILE__);?>",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
			 cache: false,
	   processData:false,
	   beforeSend : function(){
		$("#material_product_hide").fadeOut();
	   // $("#err").fadeOut();
	   },
	   success: function(data){
		  $("#material_product_div").html(data);
		if(data=='invalid'){
		 // invalid file format.
		 $("#err").html("Invalid File !").fadeIn();
		}else{
		 // view uploaded file.
		 $("#material_product_form")[0].reset(); 
		}
		  }         
		});
	}));
	
	*/
	
	
	
	
	
	
});

</script>


