<?php

function employee_insert()
{
    //echo "insert page";
    ?>
<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
        <div style="margin:100px">
    <tr>
        <td>Title:</td>
        <td><input type="text" name="nm"></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td><input type="text" name="adrs"></td>
    </tr>
    
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins"></td>
    </tr>
</div>
    </form>
    </tbody>

</table>
<?php
    if(isset($_POST['ins'])){
        global $wpdb;
        $nm=$_POST['nm'];
        $ad=$_POST['adrs'];
       
        $table_name = $wpdb->prefix . 'employee_list1';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'address' => $ad,
                
            )
        );
        echo " Data inserted";
      // wp_redirect( admin_url('admin.php?page=page=Employee_List'),301 );

        //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
      //  header("http://google.com");
   
       // <meta http-equiv="refresh" content="1; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing" />     ?>
        <?php
        exit;
    }
}
add_shortcode('short_employee_insert', 'employee_insert');

?>