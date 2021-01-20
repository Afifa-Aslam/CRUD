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
  width: 40%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
<?php 
    require_once plugin_dir_path(__FILE__) . 'templates/leacture_data_show.php';

    ?>

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
          <td>User ID</td>
          <td>Name</td>
          <td>Marks</td>
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
    <?php  }  ?>
      </table>
    </div>