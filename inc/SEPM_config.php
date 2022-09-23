<?php
		/* =========================================================
				Dynamically create table Function
			========================================================== */

		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$cst_table_name = $wpdb->prefix . 'sepm_project_management';
		$sql = "CREATE TABLE `sepm_project_management` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `author` varchar(250) NOT NULL,
									 `name` varchar(250) NOT NULL,
									 `address` varchar(250) NOT NULL,
									 `type` varchar(150) NOT NULL,
									 `status` varchar(150) NOT NULL,
									 `start_date` date NOT NULL,
									 `phone` varchar(150) NOT NULL,
									 `email` varchar(150) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$cst_table_name'") != $cst_table_name) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		
		// Create a new table for Products type
	/*	$sepm_product_type = $wpdb->prefix . 'sepm_product_type';
		$sql = "CREATE TABLE `sepm_product_type` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(150) NOT NULL,
									 `pro_type` varchar(150) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$sepm_product_type'") != $sepm_product_type) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		*/	
		// Create a new table for Products tab
		$sepm_product_file = $wpdb->prefix . 'sepm_product_file';
		$sql = "CREATE TABLE `sepm_product_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `type` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$sepm_product_file'") != $sepm_product_file) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
			
			
		// Create a new table for planning tab	
		$file_table_name = $wpdb->prefix . 'sepm_plan_file';
		$sql = "CREATE TABLE `sepm_plan_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$file_table_name'") != $file_table_name) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
			
		// Create a new table for Subcontractor tab	
		$table_subcontractor = $wpdb->prefix . 'sepm_subcontractor_file';
		$sql = "CREATE TABLE `sepm_subcontractor_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_subcontractor'") != $table_subcontractor) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		
		// Create a new table for Build tab	
		$table_build = $wpdb->prefix . 'sepm_build_file';
		$sql = "CREATE TABLE `sepm_build_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_build'") != $table_build) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
			
		// Create a new table for Electrician tab	
		$table_electrician = $wpdb->prefix . 'sepm_electrician_file';
		$sql = "CREATE TABLE `sepm_electrician_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_electrician'") != $table_electrician) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
			
		// Create a new table for financial tab	
		$table_financial = $wpdb->prefix . 'sepm_financial_file';
		$sql = "CREATE TABLE `sepm_financial_file` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(250) NOT NULL,
									 `file_name` varchar(250) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_financial'") != $table_financial) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		
		// Create a new table for Comments	
		$sepm_comments = $wpdb->prefix . 'sepm_comments';
		$sql = "CREATE TABLE `sepm_comments` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `user_id` varchar(50) NOT NULL,
									 `user_name` varchar(150) NOT NULL,
									 `datetime` varchar(150) NOT NULL,
									 `comments` varchar(550) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$sepm_comments'") != $sepm_comments) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		
		
		// Create a new table for Complete Task 	
		$sepm_completed = $wpdb->prefix . 'sepm_completed';
		$sql = "CREATE TABLE `sepm_completed` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `sepm_id` varchar(50) NOT NULL,
									 `products` varchar(150) NOT NULL,
									 `planning` varchar(150) NOT NULL,
									 `subcontractor` varchar(150) NOT NULL,
									 `build` varchar(150) NOT NULL,
									 `electrician` varchar(150) NOT NULL,
									 `financial` varchar(150) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$sepm_completed'") != $sepm_completed) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
		
				







































