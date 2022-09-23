<?php
	
		
	add_shortcode( 'SEPM_Project_Management', 'SEPM_Frontend_Management_func' );
	$tab = isset($_POST["tab"]) ? $_POST["tab"] : "project";
	function SEPM_Frontend_Management_func(){
		global $wpdb;
		$id = $_REQUEST['id'];
		
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel with-nav-tabs panel-primary">
					<div class="panel-heading">
						<ul class="nav nav-tabs reload">
							<li class="active <?= $tab == "dashboard" ? 'active' : '' ?>"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
							<li class="<?= $tab == "new_project" ? 'active' : '' ?>"><a href="#new_project" data-toggle="tab">New Project</a></li>
							<li class="<?= $tab == "your_projects" ? 'active' : '' ?>"><a href="#your_projects" data-toggle="tab">Your Projects</a></li>
							<li class="<?= $tab == "all_projects" ? 'active' : '' ?>"><a href="#all_projects" data-toggle="tab">All Projects</a></li>
							<li class="<?= $tab == "all_documents" ? 'active' : '' ?>"><a href="#all_documents" data-toggle="tab">All Documents</a></li>
							
					<?php
						if(!empty($id)){ ?>
							<li class="<?= $tab == "edit_project" ? 'active' : '' ?>" style="visibility: visible;"><a href="#edit_project" data-toggle="tab">Edit Project</a></li>
					<?php	}
					?>
							
							
							
							
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="dashboard"><?php include ('SEPM_Dashboard.php');?></div>
							<div class="tab-pane fade" id="new_project"><?php include ('SEPM_New_Project.php');?></div>
							<div class="tab-pane fade" id="your_projects"><?php include ('SEPM_Your_Projects.php');?></div>
							<div class="tab-pane fade" id="all_projects"><?php include ('SEPM_All_Projects.php');?></div>
							<div class="tab-pane fade" id="all_documents"><?php include ('SEPM_All_Documents.php');?></div>
							
							<div class="tab-pane fade" id="edit_project"><?php include ('SEPM_Edit_project.php');?></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
<?php }












































