<div class="booking-wrapper">
	<h1>Hello World!</h1>
	<?php 
		if(!empty($_GET['save'])){
			echo '<div class="updated notice"><p>Class has been added Successfully.</p></div>';		
		}
	?>	
	<form  method="post">
	<div class="row">               
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<input type="text" name="en_district" placeholder="en_district"required/>
			</div>
			<div class="col-lg-6">  
				<input type="text" name="ch_district" placeholder="ch_district" required/>
			</div>
		</div>       
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<input type="text" name="en_session" placeholder="en_session" required/>
			</div>
			<div class="col-lg-6">  
				<input type="text" name="ch_session" placeholder="ch_session" required/>
			</div>
		</div>     	 	
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<input type="text" name="en_program" placeholder="en_program" required/>
			</div>
			<div class="col-lg-6">  
				<input type="text" name="ch_program" placeholder="ch_program" required/>
			</div>
		</div> 
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<select name="en_day" required>
					<option value="">Select a day..</option>
					<option value="Monday">Monday</option>
					<option value="Tuesday">Tuesday</option>
					<option value="Wednesday">Wednesday</option>
					<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
					<option value="Saturday">Saturday</option>
					<option value="Sunday">Sunday</option>
				</select>				
			</div>
			<div class="col-lg-6">  
				<input type="url" name="map" placeholder="map" required/>		
			</div>
		</div> 
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<input type="text" name="en_start_time" placeholder="time" required/>
			</div>
			<div class="col-lg-6">  
				<input type="number" name="age" placeholder="age" required max="60"/>
			</div>
		</div>   
		<div class="col-lg-12">  
			<div class="col-lg-6">  
				<input type="number" name="class_size" placeholder="class_size" required/>
			</div>
			<div class="col-lg-6">  
				<input type="number" name="open_space" placeholder="open_space" required/>
			</div>
		</div> 
		<div class="col-lg-12">  
			<?php submit_button('Save') ?>
		</div>
	</div>
	</form>
</div>
<style>
.booking-wrapper .col-lg-12 {    width: 100%;    clear: both;}
.booking-wrapper .col-lg-6 { width: 42%; float:left;}
.booking-wrapper .col-lg-12 input, .booking-wrapper .col-lg-12 select{    width: 90%;    line-height: 1.5em;    padding: 6px 6px;  margin: 10px 9px;}
input#map{ width: 38%;}
.message{color:green;}
</style>
