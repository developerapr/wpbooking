<?php
function register_custom_menu_page() {
    add_menu_page(
				__('Booking'), 
				__('Booking'), 
				'edit_themes', 
				'aayanshtech-booking', 
				'_bokking_menu_page',
				'dashicons-editor-justify',
				81
	); 
	
}
add_action('admin_menu', 'register_custom_menu_page');

function _bokking_menu_page(){
	_handle_post();
	require 'admin_form.php';
}

function _handle_post(){      
	if(isset($_POST['submit'])){
		global $wpdb;
		$table_name = $wpdb->prefix ."booking_classes";
		unset($_POST['submit']);				
		$chDay = [
				'Monday'=>'1',
				'Tuesday'=>'2',
				'Wednesday'=>'3',
				'Thursday'=>'4',
				'Friday'=>'5',
				'Saturday'=>'6',
				'Sunday'=>'7',
		];
		$_POST['ch_day'] = $chDay[$_POST['en_day']];
		if($_POST['action']=='update'){
			$id = $_POST['id'];
			unset($_POST['id'],$_POST['action']);		
			$wpdb->update($table_name,$_POST,['id'=>$id]);   
			#exit( var_dump( $wpdb->last_query ) );
			$url = admin_url('users.php?page=aayanshtech-booking&message=2&update='.$id);       
		}else{
			unset($_POST['id'],$_POST['action']);
			$wpdb->insert($table_name,$_POST);     
			 $url = admin_url('users.php?page=aayanshtech-booking&message=1');        
		}        
		redirect($url);
        exit();
	}
}
function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';
    echo $string;
}
require_once 'wp_table_grid.php';
	add_action( 'plugins_loaded', function () {
		AP_Plugin::get_instance();
} );
