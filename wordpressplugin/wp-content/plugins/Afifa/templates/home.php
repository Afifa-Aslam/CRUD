<style>
.main{
    width: 100%;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>



<div class="main">
  <h1>WT ASSIGNMNET</h1>

  <h1>TASK 1</h1>
  <form method="POST">
    <label for="Title">Lecture Title:</label>
    <br />
    <input type="text" id="Title" name="title" value="" />
    <br />
    <label for="Description">Lecture Description:</label>
    <br />
    <input type="text" id="Description" name="description" value="" />

    <br /><br />

    <input type="submit" name="save" value="Save data" />
  </form>
</div>


<?php

function sendDataIntoTable(){
  global $wpdb;
  $table_name = $wpdb->prefix . "lecture_details"; 
  $TextTitle =(isset($_POST['title']) ? $_POST['title'] : 'none');
  $TextDescription =(isset($_POST['description']) ? $_POST['description'] : 'none');

  // $TextTitle=$_POST['title']; 
  // $TextDescription=$_POST['description'];

  if(isset($_POST['save'])) $wpdb->insert(
  $table_name,array('lectureName'=>$TextTitle,'lectureDescription'=>$TextDescription),array('%s','%s'));
} 
?>
