<?php
		global $wpdb;
		$id = $_REQUEST['id'];
		
?>
<div id="sepm_complettion_section">
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 sepm_icon">
				<h3 class="summary_title">Summary</h3>
				
				<div id="comp_summary_content"></div>
			</div>
			
			<div class="col-sm-4 sepm_btn_style sepm_icon">
				<h3 class="comp_title">Complete project</h3>
				<p class="comp_desc">When all elements are marked with <i class="fa-solid fa-check"></i> and the installation is completed, click this button to notify Otovo.</p>
				
					<form id="sepm_project_finished" action="" method="post">
					
						<input type="hidden" id="sepm_project_id" name="sepm_project_id" value="<?php echo $id; ?>" />
						<input type="hidden" name="sepm_project_completed" value="Finished" />
						
						<input type="submit" name="submit" value="Mark as Completed" class="btn sepm_btn">
						
					</form>
				<p id="sepm_product_completed_msg"></p>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
			
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#sepm_project_finished").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo plugins_url('ajax/project_finished.php',  __FILE__);?>",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					if( data == 'finished'){
						$("#sepm_product_completed_msg").css('display','block');
						$('#sepm_product_completed_msg').html('Success!').fadeOut(2000);
					}else{
						$("#sepm_product_completed_msg").css('display','block');
						$('#sepm_product_completed_msg').html('Success!').fadeOut(2000);
					}
				}
			});
		}));
		
		setInterval(function(){
			$('#comp_summary_content').load('<?php echo plugins_url('setInterval/completion.php?id='.$id, __FILE__);?>').fadeIn('slow');
		}, 1000);
		
		
		
		
	});
</script>