<?php 
    $this->load->view("partials/top_menus"); 
?>
<script>
$(function() {
        alert(<?php echo base_url();?>);
});
</script>
<div class="container-fluid">
  <div class="row">
   <?php $this->load->view("partials/aside_menus"); ?>
    <div class="col-xs-10 main tab-content">
        <form id="searchForm" action="<?php echo base_url(); ?>university/search" method="post">
            <table cellSpacing=1 cellPadding=0 width="100%" border=0>
                <tr bgColor=#ffffff height=22>
                    <td width="13%" align="center" bgColor=#efefe7><font class=bbstitle>College Name </font></td>
                    <td width="33%">&nbsp;<input type="text" name="q_college_name" value=""></td>
                    <td width="13%" align="center"bgColor=#efefe7><font class=bbstitle>College Type  </font></td>
                    <td>&nbsp;<select name="q_college_type" >
                                    <option></option>
                                    <?php
                                    foreach($college_list as $college) {
                                        ?>
                                        <option value="<?php echo $college['detail_code']; ?>"><?php echo $college['detail_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                               </select>
                    </td>
                </tr>
                
                <tr bgColor=#ffffff height=22>
                    <td  align="center" width="13%" bgColor=#efefe7><font class=bbstitle>State</font>
                    </td>
                    <td>&nbsp;<select name="q_state" >
                                    <option></option>
                                    <?php
                                    foreach($state_list as $state) {
                                        ?>
                                        <option value="<?php echo $state['detail_code']; ?>"><?php echo $state['detail_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                              </select>
                    </td>
                    <td  align="center" bgColor=#efefe7><font class=bbstitle>Gender</font>
                    </td>
                    <td>&nbsp;<select name="q_gender" >
                                <option></option>
                                <?php
                                foreach($genders_list as $gender) {
                                    ?>
                                    <option value="<?php echo $gender['detail_code']; ?>"><?php echo $gender['detail_name']; ?></option>
                                    <?php
                                }
                                ?>
                              </select>
                     </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input type="submit" value="Search" >
                    </td>
                </tr>
            </table>
        </form>
        
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