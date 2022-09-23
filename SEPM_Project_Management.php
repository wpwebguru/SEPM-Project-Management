<?php

/**
 * Plugin Name: SEPM Project Management
 * Description: SEPM Project Management Plugin. Shortcodes: <code>[SEPM_Project_Management]</code>
 * Version: 1.2.5
 * Plugin URI: https://github.com/wpwebguru
 * Author: Sunny
 * Author URI: https://github.com/wpwebguru
 */
 
	 if ( !defined( 'ABSPATH' ) ) {
			die;
		}
	
	
	// File include
	include ('inc/backend/SEPM_Menu_Func.php');
	include ('inc/frontend/SEPM_Management.php');
	
	// Require file
	require ('inc/SEPM_config.php');
	
	
	
	
	
	// Stylesheet and Script for Backend
	add_action('admin_enqueue_scripts', 'RMP_admin_scripts');	
	function RMP_admin_scripts() {
		
		wp_register_style('bootstrap_css', plugins_url('assets/backend/css/bootstrap.min.css', __FILE__));
		wp_enqueue_style('bootstrap_css');
		
		wp_register_style('custom_css', plugins_url('assets/backend/css/custom.css', __FILE__));
		wp_enqueue_style('custom_css');
		
		wp_enqueue_script('jquery');
		
		wp_register_script('bootstrap_js', plugins_url('assets/backend/js/bootstrap.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('bootstrap_js');
		
	}
	
	// Stylesheet and Script for Frontend
	add_action('wp_enqueue_scripts', 'RMP_frontend_script');	
	function RMP_frontend_script() {
		
		wp_register_style('bootstrap_css', plugins_url('assets/frontend/css/bootstrap.min.css', __FILE__));
		wp_enqueue_style('bootstrap_css');
		
		wp_register_style('fontawesome_all_css', plugins_url('assets/frontend/fontawesome/css/all.min.css', __FILE__));
		wp_enqueue_style('fontawesome_all_css');
		
		wp_register_style('fontawesome_min_css', plugins_url('assets/frontend/fontawesome/css/fontawesome.min.css', __FILE__));
		wp_enqueue_style('fontawesome_min_css');
		
		
		wp_register_style('custom_css', plugins_url('assets/frontend/css/custom.css', __FILE__));
		wp_enqueue_style('custom_css');
		
		wp_enqueue_script('jquery');
		
		wp_register_script('bootstrap_js', plugins_url('assets/frontend/js/bootstrap.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('bootstrap_js');

		wp_register_script('sepm_tab_js', plugins_url('assets/frontend/js/tab.js?'.time(), __FILE__), array('jquery'));
		wp_enqueue_script('sepm_tab_js');
		
		wp_register_script('sepm_filter_jquery', plugins_url('assets/frontend/js/jquery.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('sepm_filter_jquery');
		
		wp_register_script('sepm_image_uploader', plugins_url('assets/frontend/js/image_uploader.js', __FILE__), array('jquery'));
		wp_enqueue_script('sepm_image_uploader');

		
		wp_localize_script( 'sepm_main_js', 'rmpajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php?action=save_roster' )));

		
	}
	
	

	
	