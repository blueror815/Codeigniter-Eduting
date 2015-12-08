<?php 
    $this->load->view("partials/top_menus"); 
?>

<div class="container-fluid">
  <div class="row">
   <?php $this->load->view("partials/aside_menus"); ?>
    <div class="col-xs-10 main tab-content">
        <table class="table table-bordered table-striped" >
        <tr class="table_row" style="background: #eee;">
            <th>
                No
            </th>
            <th>
                College Name
            </th>
            <th>
                College Type
            </th>
            <th>
                State
            </th>
            <th>
                City
            </th>
            <th>
                # of Majors
            </th>
            <th>
                Common App.
            </th>
            <th>
                School Own App.
            </th>
        </tr>
            <?php 
            foreach ($all_data as $row) {
                ?>
                <tr class="table_row">
                    <td>
                        <?php echo 1; ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url();?>university/edit/<?php echo $row['college_code']; ?>"><?php echo $row['college_name']; ?></a>
                    </td>
                    
                    <td>
                        <?php echo $row['college_type_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['state_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['city']; ?>
                    </td>
                    <td>
                        <?php echo $row['major_count']; ?>
                    </td>
                    <td>
                        <?php
                            if (!empty($row['ca_org_file_name'])) {
                                ?>
                                <a href="<?php // echo $row['ca_org_file_name'];?>#">
                                    <img src="<?php echo base_url()?>images/icon_pdf.gif" />
                                </a>
                                <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if (!empty($row['soa_org_file_name'])) {
                                ?>
                                <a href="<?php // echo $row['ca_org_file_name'];?>#">
                                    <img src="<?php echo base_url()?>images/icon_pdf.gif" />
                                </a>
                                <?php
                            }
                        ?>
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
    </div>
  
  </div>
</div>