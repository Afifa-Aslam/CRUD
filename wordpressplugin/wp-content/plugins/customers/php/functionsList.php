<?php

function Registrationform()
{
	
	global $wpdb;
	global $pluginPath;
	$homeURI = get_home_url(); 

	if (isset($_POST['submit']))
	{
		
		$firstname    = $_POST['fname'];
		$lastname    = $_POST['lname'];
		$wpdb->query("INSERT INTO  customers 
	( firstname, lastname) VALUES ( '$firstname',  '$lastname') "  
);
echo '<h1>  Data Saved</h1';
	}
	else

	{
	//this will return  http://localhost/wp
	?>
	
	<!-- <link rel="stylesheet" href="<?phpecho $pluginPath; ?>css/mycss.css" type="text/css"> -->
	<h4> Customer Form </h4>
	<!-- <p id='c2' onclick="abc1()">
	 Testing paragraph 
	</p>
	<p id='c3'>
	 Testing paragraph with jQuery 
	</p> -->
	<!-- <?php  $homeURI;?>/insertdata/ -->
	<div style="margin-left: 40px">
	<form action='' method='post'>
		  <label for="fname">First name:</label><br>
		  <input type="text" id="fname" name="fname"><br>
		  <label for="lname">Last name:</label><br>
		  <input type="text" id="lname" name="lname">
		  <input type="submit" value='Submit' id='submit' name='submit'>
	</form>
</div>

<?php
}
}

function create()
{
		global $wpdb;
		$wpdb->show_errors();	
		$firstname    = $_POST['fname'];
		$lastname    = $_POST['lname'];
		$wpdb->query(
			"INSERT INTO  customers 
			( firstname, lastname) VALUES ( '$firstname',  '$lastname') "  
		);

		// header("Location: http://localhost/wp/wp-admin/admin.php?page=Registrationform");;
}



function list1()
{
	global $wpdb;
	//global $pluginPath;
	?>
	
   
	<h1> Customer Data List </h1>

	<?php
	$result = $wpdb->get_results('SELECT * FROM customers');
	echo "<table class='table table-hover'>
	<tr>
        <th>Firstname</th>
        <th>Lastname</th>
        
      </tr>";
	foreach ($result as $key => $row) 
	{
		echo "<tr> <td> $row->firstname </td><td> $row->lastname </td></tr>";
	}
	echo "</table>";
	
}
