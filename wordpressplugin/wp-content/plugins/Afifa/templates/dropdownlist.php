
<?php
  global $wpdb;
  $table_name = $wpdb->prefix . "watu_master";

  $watu_master_Results=$wpdb->get_results("SELECT * FROM  $table_name");
?>
<h1>Task 3</h1>
<?php $path =  plugin_dir_path(__FILE__) ?>
<form method="POST">
  <label for="quizs">Select the Quiz:</label>
  <select name="quizs" id="quizs">
    <option value="choose"></option>
    <?php foreach($watu_master_Results as $watu_master){
        $id=$watu_master->ID;
        $name=$watu_master->name;
        ?>
    <option value=<?php echo $id ?>><?php echo $name ?></option>
  
    <?php } ?>
</select>
  <br><br>
  <input type="submit" name="send" value="Send">
</form>




<?php $exam_ID = (isset($_POST['send']))? $_POST['quizs'] :'';


global $wpdb;
$table_name = $wpdb->prefix . "watu_takings";

$watu_takings_Results=$wpdb->get_results("SELECT * FROM  $table_name WHERE exam_id=$exam_ID");

?>
</style>
<div class="main">
<h1>Task 4</h1>
  <table>
    <tr>
      <td>ID</td>
      <td>Student ID</td>
      <td> Student Name</td>
      <td> Obtained Marks</td>
    </tr>
<?php  foreach($watu_takings_Results  as $watu_takings){ 
    
global $wpdb;
    
$table_name = $wpdb->prefix . "users";
$userResult=$wpdb->get_results("SELECT * FROM  $table_name WHERE ID=$watu_takings->user_id");
    ?>
    <tr>
      <td><?php echo $watu_takings->ID ?></td>
      <td><?php echo $watu_takings->user_id ?></td>
      <td><?php echo $userResult[0]->user_login ?></td>
      <td><?php echo $watu_takings->points ?></td>
    </tr>
<?php 

}  ?>
  </table>
</div>