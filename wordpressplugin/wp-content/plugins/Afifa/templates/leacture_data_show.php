<style>
.main{
    width: 100% !important;
    max-width: 100% !important;
    flex:1;
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





<?php
  global $wpdb;
  $table_name = $wpdb->prefix . "lecture_details";

  $lecture_Results=$wpdb->get_results("SELECT * FROM  $table_name");
?>
<div class="main">
<h1>TASK 2</h1>
  <table>
    <tr>
      <td>ID</td>
      <td>Title</td>
      <td>Description</td>
    </tr>

    <?php   foreach($lecture_Results as $lecture){ 
      $id=$lecture->ID;
      $lecture_Name=$lecture->lectureName;
      $lecture_Description=$lecture->lectureDescription;
      ?>

    <tr>
      <td><?php echo $id ?></td>
      <td><?php echo $lecture_Name ?></td>
      <td><?php echo $lecture_Description ?></td>
    </tr>

    <?php   }  ?>
  </table>
</div>