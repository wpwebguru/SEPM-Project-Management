<?php

 // Register main menu page.
	 
	add_action( 'admin_menu', 'SEPM_register_menu_func' );
	function SEPM_register_menu_func() {
		global $submenu;
		add_menu_page( 'SEPM Project Management', 'SEPM Projects', 'manage_options', 'sepm_project_management', 'SEPM_menu_data_func', 'dashicons-portfolio', 3 );
		
		add_submenu_page( 'sepm_project_management', 'Settings', 'Settings', 'manage_options', 'add_new_board-member', 'sepm_sub_menu_data_func');
		$submenu['sepm_project_management'][0][0] = 'All Projects';
		
	}
	function SEPM_menu_data_func(){
		include ('SEPM_All_Projects.php');
		
	}
	
	// Register Add new submenu page.
	 
	function sepm_sub_menu_data_func(){
		include ('SEPM_settings.php');
	}











