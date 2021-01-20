<?php

function employee_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;


        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <h1>Data and Description</h1>
            <thead>
            <tr>
                <th>No</th>
                <th>Title </th>
                <th>Description</th>
               
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'employee_list1';
            $employees = $wpdb->get_results("SELECT id,name,address from $table_name");
            foreach ($employees as $employee) {
                ?>
                <tr>
                    <td><?= $employee->id; ?></td>
                    <td><?= $employee->name; ?></td>
                    <td><?= $employee->address; ?></td>
                    
                    
                </tr>
            <?php } ?>

            </tbody>
            <!--<tbody>
            <tr>
                <td>1</td>
                <td>Hardik K. Vyas</td>
                <td>Php Developer</td>
                <td>+91 940894578</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mark M. Knight</td>
                <td>Blog Writer</td>
                <td>630-531-9601</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Annie D. Naccarato</td>
                <td>Project Leader</td>
                <td>144-54-XXXX</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jayesh P. Patel</td>
                <td>Web Designer</td>
                <td>+91 98562315</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Alvin B. Reddick</td>
                <td>ifone Developer</td>
                <td>619-11-XXXX</td>
            </tr>
            </tbody>-->
        </table>
    </div>
    <?php

}
add_shortcode('short_employee_list', 'employee_list');
?>