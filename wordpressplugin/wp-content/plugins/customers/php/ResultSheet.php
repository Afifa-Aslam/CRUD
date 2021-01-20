<?php

function quizList()
		{
			global $wpdb;
			$homeURI = get_home_url();
		?>
				  			<h2> Quiz List </h2>
	<form action='<?php echo $homeURIget; ?>List/' method='post'>
			
		<?php

			$qry ='SELECT * FROM wp_watu_master order by ID';
			$result = $wpdb->get_results($qry);
			
			echo "<select name='quizId' id='quizId'>
		  <option value=''>Select</option>";
			foreach ($result as $key => $row) 
			{
				echo "<option value=$row->ID> $row->name </option>";
			}
			echo "
			<input type='submit' Value='Resut' class='btn btn-primary btn-lg'>
			</select>
			
	</from>";
			
}

function displyResult()
{
		global $wpdb;
		// $wpdb->show_errors();	
		$quizId    = $_POST['quizId'];
		$row = $wpdb->get_row('SELECT * FROM wp_watu_master WHERE ID ='.$quizId );
		echo '<h4> Quiz id:'. $quizId. ' <br> Title ='.$row->name. '</h4>';

		$result = $wpdb->get_results('SELECT * FROM wp_watu_takings WHERE exam_id ='.$quizId);
		echo "<table class='table table-hover'>
		<tr>
	        <th>Student</th>
	        <th>Marks</th>
	        
	      </tr>";
		foreach ($result as $key => $row) 
		{
			echo "<tr> <td> $row->username </td><td> $row->points </td></tr>";
		}
		echo "</table>";
}
