<?php
/**
Plugin Name: Aayanshtech MFA Booking
Plugin URI: https://www.aayanshtech.in
Description: Mfa class book online
Author: Arunendra
Version: 1.7.1
*/
function mfa_booking_install() {	
	try{
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$user_groups = $wpdb->prefix . 'booking_classes';
		$sql = "CREATE TABLE $user_groups (
			id int(11) NOT NULL AUTO_INCREMENT,			
			en_session varchar(150),
			ch_session varchar(150),
			en_day varchar(20),
			ch_day varchar(20),
			en_start_time varchar(20),
			en_program varchar(150),
			ch_program varchar(150),
			age  varchar(10),
			class_size int(11),
			open_space int(11),
			created_by int(11),
			created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) $charset_collate;";

	
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta($sql);			
		}catch(\EXCEPTION $e){
			echo $e->getMessage(); 
			die;
	}
}
	/* un-install table for group */	
function mfa_booking_uninstall() {		
	global $wpdb;		
	$table_name = $wpdb->prefix . 'booking_classes';
	$wpdb->query("DROP TABLE IF EXISTS $table_name" );			
}
register_activation_hook(__FILE__,'mfa_booking_install');
register_deactivation_hook(__FILE__,'mfa_booking_uninstall');


# include files 

require_once 'admin-section.php';
require_once 'front-end.php';


function load_booking_scripts() {
	$some_condition = true;
    if (!is_front_page()) {       
         wp_enqueue_script( 'ajax-script', plugins_url( '/js/class_booking.js' , __FILE__ ), array('jquery') );         
		 
		 wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }
}
add_action('wp_enqueue_scripts','load_booking_scripts');

function save_booking_data(){
	print_r($_REQUEST); die;
}
add_action('wp_ajax_save_booking_data', 'save_booking_data');
?>
