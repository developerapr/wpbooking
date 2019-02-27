<?php
add_shortcode('aayanshtech-booking', 'getdataOfClasses' );
function getdataOfClasses($atts) {
    if($atts['code']=='en'){
		return getEngData();	
	}else{
		return getChData();
	}
}

function getEngData(){
	global $wpdb;
	$sql = "SELECT * FROM {$wpdb->prefix}booking_classes";
	$result = $wpdb->get_results( $sql, 'ARRAY_A' ); 
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered"><thead><tr>';
	echo '<th>District</th>';
	echo '<th>Session</th>';
	echo '<th>Map</th>';
	echo '<th>Day</th>';
	echo '<th>Time</th>';
	echo '<th>Program</th>';
	echo '<th>Age</th>';
	echo '<th>Class Size</th>';
	echo '<th>Open Space </th>';	
	echo '<th>Book Free Trial</th>';
	echo '<th>Add to wait list</th>';
	echo '</tr></thead><tbody>';
	foreach($result as $classes){
		echo '<tr>';
			echo '<td>'.$classes['en_destrict'].'</td>';
			echo '<td>'.$classes['en_session'].'</td>';
			echo '<td><a href="'.$classes['map'].'" target="_blank">View on map</a></td>';
			echo '<td>'.$classes['en_day'].'</td>';
			echo '<td>'.$classes['en_start_time'].'</td>';
			echo '<td>'.$classes['en_program'].'</td>';
			echo '<td>'.$classes['age'].'</td>';
			echo '<td>'.$classes['class_size'].'</td>';
			echo '<td>'.$classes['open_space'].'</td>';
			$cname = $classes['en_session'];
			if($classes['open_space']>0){
				echo '<td><a href="javascript:void(0);" type="button" data-class="'.$cname.'" class="btn-link" onclick="javascript:classBookNow(this,1)">Click here</a></td>';
				
				echo '<td><a href="javascript:void(0);"  class="btn-link disabled">Click here</a></td>';	
			}else{
				echo '<td><a href="javascript:void(0);" type="button" class="btn-link disabled">Click here</a></td>';
				
				echo '<td><a href="javascript:void(0);" data-class="'.$cname.'" class="btn-link" onclick="javascript:classBookNow(this,2)">Click here</a></td>';
			}			
		echo '</tr>';
	}
	echo '</tbody></table></div>';
}

function getChData(){
	global $wpdb;
	$sql = "SELECT * FROM {$wpdb->prefix}booking_classes";
	$result = $wpdb->get_results( $sql, 'ARRAY_A' ); 
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered"><thead><tr>';
	echo '<th>區域</th>';
	echo '<th>課程名稱</th>';
	echo '<th>地圖</th>';
	echo '<th>日期</th>';
	echo '<th>時間</th>';
	echo '<th>課程等級</th>';
	echo '<th>年齡</th>';
	echo '<th>班級人數上限</th>';	
	echo '<th>所剩名額</th>';
	echo '<th>報名免費體驗</th>';
	echo '<th>我要候補這一堂課</th>';
	echo '</tr></thead><tbody>';
	foreach($result as $classes){
		echo '<tr>';
			echo '<td>'.$classes['ch_destict'].'</td>';
			echo '<td>'.$classes['ch_session'].'</td>';
			echo '<td><a href="'.$classes['map'].'" target="_blank">在地圖上觀看</a></td>';
			echo '<td>'.$classes['ch_day'].'</td>';
			echo '<td>'.$classes['en_start_time'].'</td>';
			echo '<td>'.$classes['ch_program'].'</td>';
			echo '<td>'.$classes['age'].'</td>';
			echo '<td>'.$classes['class_size'].'</td>';
			echo '<td>'.$classes['open_space'].'</td>';
			$cname = $classes['ch_session'];
			if($classes['open_space']>0){				
				echo '<td><a href="javascript:void(0);" type="button" data-class="'.$cname.'" class="btn-link" onclick="javascript:classBookNow(this,1)">點選此處</a></td>';
				
				echo '<td><a href="javascript:void(0);" class="btn-link disabled">點選此處</a></td>';	
			}else{
				echo '<td><a href="javascript:void(0);" type="button" class="btn-link disabled">點選此處</a></td>';
				
				echo '<td><a href="javascript:void(0);" data-class="'.$cname.'" class="btn-link" onclick="javascript:classBookNow(this,2)">點選此處</a></td>';
			}			
		echo '</tr>';
	}
	echo '</tbody></table></div>';
}
