<?php

$valid_extensions = array('pdf' , 'doc' , 'docx', 'docm', 'dotx', 'txt'); // valid extensions

$path = 'uploads/'; // upload directory
//$root= $root = dirname(dirname(dirname(realpath(__FILE__))));
//$path = $root.'/uploads/';


if(!empty($_POST['sepm_post_id_hidden']) || $_FILES['image']){
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) { 
$path = $path.strtolower($final_image); 

$file_loc = strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) {
	
//$imgurl = plugins_url('sepm-project-management/inc/frontend/tab/');

//echo "<img src='$imgurl' />";

$sepm_id = $_POST['sepm_post_id_hidden'];
$sepm_type = $_POST['sepm_type_material'];
//include database configuration file
//include ('db.php');

//insert form data in the database
//$insert = $db->query("INSERT sepm_product_file (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");
//echo $insert?'ok':'err';
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$pathss = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $pathss . '/wp-config.php';
			include_once $pathss . '/wp-includes/wp-db.php';
			include_once $pathss . '/wp-includes/pluggable.php';
global $wpdb;
$wpdb->insert('sepm_product_file',array( 'sepm_id'=>$sepm_id, 'type'=>$sepm_type, 'file_name'=>$file_loc,) );

// Loop

$db_config = "SELECT * FROM sepm_product_file WHERE sepm_id=$sepm_id";
		//$db_config = "SELECT * FROM sepm_product_file";
		$results = $wpdb->get_results($db_config);
		foreach( $results as $result ) {
								$id = $result->id;
								$sepmid = $result->sepm_id;
								$type = $result->type;
								$file_name = $result->file_name;
					if($type == 'material'){
						?>
						<tr class="product_data">
							<td><?php echo $file_name; ?></td>
							<td><a href="<?php echo plugins_url('uploads/'.$file_name, __FILE__);?>" target="_blank">Download</a></td>
							<td><span class='product_delete' data-id='<?php echo $id;?>' data-name='<?php echo $file_name;?>'>Delete</span></td>
						</tr>
<?php 				} 
			}			 
				
				

}
} 
else 
{
echo '<p style="color:red; padding: 10px 0px;">Please upload these format files PDF, DOC, DOCX, TXT.</p>';
}
}

?>
<script type="text/javascript">
	$(document).ready(function(){
		
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
			url: '<?php echo plugins_url('product_delete.php', __FILE__);?>',
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
		
	});
</script>