<html>
	<head>
		<title>Admin Dashboard</title>
		<link type='text/css' href="<?php echo base_url();?>css/bootstrap.css" rel='Stylesheet' />
		<link type='text/css' href="<?php echo base_url();?>css/dashboard.css" rel='Stylesheet' />
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.vertical-tabs.css">
		<script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Search Data</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2">
          <ul class="nav nav-tabs tabs-left">
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=universities">College/World University</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=graduat_school_major">Graduate School Major</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=manage_users">Manage Users</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=jobs">Jobs</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=general_major">General Major</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=pr_teacher">PR Teacher</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=college_esl_program">College ESL Program</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=boarding_school">Boarding School</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=occupation">Occupation</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=ad">AD</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=upload_photo">Upload Video</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=manage_college_score">Manage College Scores</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=college_info_request">College Info Requests</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=country">Country</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=coins_tranaction">Coins Transaction</a></li>
          </ul>
        </div>

        <div class="col-xs-10 main tab-content">
            <?php
                $university = $this->db->get_where("college", array('college_code'=>$_REQUEST['college_code']));
                $university_result = $university->result_array()[0];
            ?>
            <?php var_dump($university_result); ?>
            
            <table border=1>
            
                    <td align="center" colspan="4"> 
                        <a href="<?php echo base_url()?>admin?param=manage_users"><img alt="" src="../../images/cancel.gif">Cancel</a> &nbsp;  
                        <a href="<?php echo base_url()?>admin?param=manage_users"><input type="image"  alt="" src="../../images/ok.gif">OK</a>
                    </td>
                  </tr>
            </table>
        </div>
      </div>
    </div>
	</body>
</html>
