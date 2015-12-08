<?php 
    $this->load->view("partials/top_menus");
?>
<script>
    $(function() {
        $("#search_now").click(function() {
            alert($("#search_key").val());
            window.location.href = "<?php echo base_url()?>user/search/" + $("#search_key").val();
        });
        
    })
</script>
<div class="container-fluid">
  <div class="row">
   <?php $this->load->view("partials/aside_menus"); ?>
    <div class="col-xs-10 main tab-content">
        <div>
            User Search (By S_No, First Name, Last Name):&nbsp;&nbsp;&nbsp;<input type="text" id="search_key" placeholder="Please input search key...">
            <input type="button" id="search_now" value="Find">
            <input type="button" id="add_now" value="Add">
        </div>
        
        <br>
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
            } ?>
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
    </div>
  
  </div>
</div>
