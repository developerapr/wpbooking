<div class="booking-wrapper">
	<h1>Hello World!</h1>
<?php 
$en_district = $ch_district = $en_session = $ch_session=$en_program=$ch_program=$en_day=$map=$en_start_time=$age=$class_size=$open_space=$id='';
$darArray = ['Monday','Tuesday','Thursday','Wednesday','Friday','Saturday','Sunday'];
	if(!empty($_GET['message'])){		
		echo '<div class="updated notice"><p>Class has been saved Successfully.</p></div>';		
	}
	$buttonText = 'Add Class';
	$action = 'save';
	if(!empty($_GET['update']) && is_numeric($_GET['update'])){
		global $wpdb;	
		$table_name = $wpdb->prefix . "booking_classes";	
		$sql = "SELECT * FROM $table_name where id=".$_GET['update'];
		$row = (array) $wpdb->get_row($sql);
		extract($row);
		$buttonText = 'Update Class';
		$action = 'update';		
		
	}		
?>	
	<form  method="post">
		<input type="hidden" name="action" value="<?php echo $action; ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="row">               
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="en_district">District English</label>
				<input type="text" name="en_district" value="<?php echo $en_district ?>" required/>
			</div>
			<div class="col-lg-6">  
				<label for="ch_district">District Chinese</label>
				<input type="text" name="ch_district" value="<?php echo $ch_district ?>"  required/>
			</div>
		</div>       
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="en_session">Session English</label>
				<input type="text" name="en_session" value="<?php echo $en_session ?>"  required/>
			</div>
			<div class="col-lg-6">  
				<label for="ch_session">Session Chinese</label>
				<input type="text" name="ch_session" value="<?php echo $ch_session ?>"  required/>
			</div>
		</div>     	 	
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="en_program">Program English</label>
				<input type="text" name="en_program" value="<?php echo $en_program ?>"  required/>
			</div>
			<div class="col-lg-6">  
				<label for="ch_program">Program Chinese</label>
				<input type="text" name="ch_program" value="<?php echo $ch_program ?>" required/>
			</div>
		</div> 
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="en_day">Day</label>
				<select name="en_day" required>
					<option value="">Select a day..</option>
					<?php 
					foreach($darArray as $_day){
						if($en_day==$_day){
							echo '<option value='.$_day.' selected="true">'.$_day.'</option>';
						} else{
							echo '<option value='.$_day.'>'.$_day.'</option>';
						}
					}
					?>	
				</select>				
			</div>
			<div class="col-lg-6">  
				<label for="map">Map</label>
				<input type="url" name="map" value="<?php echo $map ?>" required/>	
			</div>
		</div> 
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="en_start_time">Time</label>
				<input type="text" name="en_start_time" value="<?php echo $en_start_time ?>" required/>
			</div>
			<div class="col-lg-6">  
				<label for="age">Age</label>
				<input type="number" name="age" value="<?php echo $age ?>"  required max="60"/>
			</div>
		</div>   
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<label for="class_size">Class Size</label>
				<input type="number" name="class_size" value="<?php echo $class_size ?>" required/>
			</div>
			<div class="col-lg-6">  
				<label for="open_space">Open Size</label>
				<input type="number" name="open_space" value="<?php echo $open_space ?>" required/>
			</div>
		</div> 
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<p class="submit">
				<a href="<?php echo admin_url('admin.php?page=classes_list'); ?>" title="back" class="button button-default">Back</a>
				</p>
			</div>
			<div class="col-lg-6">  
				<?php submit_button($buttonText) ?>
			</div>
			
		</div>
	</div>
	</form>
</div>
<style>
.booking-wrapper .col-lg-12 {    width: 100%;    clear: both;}
.booking-wrapper .col-lg-6 { width: 42%; float:left;}
.booking-wrapper .col-lg-12 input, .booking-wrapper .col-lg-12 select{    width: 90%;    line-height: 1.5em;    padding: 6px 6px;  margin: 5px 9px;}
input#map{ width: 38%;}
.message{color:green;}
.booking-wrapper .col-lg-12 label{ margin-left: 2%; font-weight: bold;}
</style>
