<style>
	.manage_user_table, .table_row, .table_row > th {
		text-align: center;
	}
</style>

<table class="manage_user_table" border="1" style="width: 90%;">
	<tr class="table_row" style="background: #eee;">
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
    if (isset($_REQUEST['pagination'])) {
        $page_num = (int)$_GET['pagination'];
        if ($page_num < 1) {
            $page_num = 1;
        } elseif ($page_num > 10){
            $page_num = 10;
        }
    } else {
        $page_num = 1;
    }

    $result = $this->db->get("user");
    $result_array = $result->result_array();
    $total_count = count($result_array);
    
    $result_users = array();
    $index = 0;
    for ($i = ($page_num-1) * 20 ; $i < $page_num * 20 && $i < $total_count; $i++) {
        $result_users[$index] = $result_array[$i];
        $index++;
    }
    
    foreach($result_users as $user) {
  	?>
  	<tr class="table_row">
  		<td>
  			<a href="<?php echo base_url(); ?>admin/manage_user?s_no=<?php echo $user['s_no']; ?>">
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
<nav>
  <ul class="pagination">
  
    <li>
      <a href="<?php echo base_url()?>admin?param=manage_users&pagination=<?php echo $page_num == 1 ? 1: $page_num - 1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    for ($pager = 1; $pager < $total_count / 20 + 1; $pager++) {
        ?>
        <li><a href="<?php echo base_url()?>admin?param=manage_users&pagination=<?php echo $pager;?>"><?php echo $pager; ?></a></li>
        <?php
    }
    ?>
    <li>
      <a href="<?php echo base_url()?>admin?param=manage_users&pagination=<?php echo $page_num >= $total_count / 20 ? $page_num : $page_num + 1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>