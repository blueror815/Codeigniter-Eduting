<?php 
    $this->load->view("partials/top_menus");
    var_dump($this);
?>

<div class="container-fluid">
  <div class="row">
   <?php $this->load->view("partials/aside_menus"); ?>
    <div class="col-xs-10 main tab-content">
    
    <?php
    
        if(!$all_data) {
            ?>
            <div id="infoMessage" class="alert alert-danger"><?php echo "There is no result.";?></div>
            <?php
        } else {
            ?>
                <table class="table table-bordered table-striped" border="1">
                <tr>
                    <th>
                        S_NO
                    </th>
                    <th>
                        First Name
                    </th>
                    <th>
                        Middle Name
                    </th>
                    <th>
                        Last Name
                    </th>
                    <th>
                        Email
                    </th>
                </tr>
                <?php 
                foreach($all_data as $user) {
                ?>
                <tr class="table_row">
                    <td>
                        <a href="<?php echo base_url(); ?>user/edit/<?php echo $user['s_no']; ?>">
                            <?php echo $user['s_no']; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $user['first_name']; ?>
                    </td>
                    <td>
                        <?php echo $user['middle_name']; ?>
                    </td>
                    <td>
                        <?php echo $user['last_name']; ?>
                    </td>
                    <td>
                        <?php echo $user['email']; ?>
                    </td>
                </tr>
                <?php
                }
                ?>
                </table>
                <br>
                <div id="pagination">
                    <ul class="tsc_pagination">
                        <?php
                            foreach ($links as $link) {
                                echo "<li>". $link."</li>";
                            } 
                        ?>
                    </ul>
                </div>
            <?php
        }
    ?>
    </div>
  
  </div>
</div>