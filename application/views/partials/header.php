
<header class="edut-header col-xs-12">
  <!-- Logo -->
  <div class="col-xs-4 col-sm-3 col-lg-2 pull-left">
    <div href="" class="logo">
      <span class="logo-lg"><img src="<?php echo $this->config->item('base_url') ?>/assets/common/dist/img/logo.png" alt="The Education Company" width="100%" /></span>
    </div>
  </div>
  
  <div class="col-xs-7 col-sm-3 col-lg-4 pull-right">
    <nav class="pull-right navbar navbar-static-top" role="navigation">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="phone-menu hidden-xs hidden-sm hidden-md">
            <a href="tel:+3125083878">312-508-3878</a>
          </li>
			
          <li class="signup-menu menu-button <?php echo ($this->bLogin? 'hide':'show') ?>">
             <a href="<?php echo site_url('signup') ?>" >SIGN UP</a>
          </li>
          
          <li class="signin-menu menu-button <?php echo ($this->bLogin? 'hide':'show') ?>">
              <a href="<?php echo site_url('login') ?>" >SIGN IN</a>
          </li>
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu <?php echo ($this->bLogin? 'show':'hide') ?>">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $this->config->item('base_url') ?>/assets/common/dist/img/avatar.png" class="user-image" alt="User Image"/>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <p class="hidden-xs hidden-sm" style="max-width:150px; white-space: nowrap; overflow-x:hidden;"><?php echo $this->userdata['username'] ?></p>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li class="user-body">
                <a class="account_btn" href="">MY ACCOUNT</a>
                <a class="profile_btn" href="<?php echo site_url('user/profile') ?>">MY PROFILE</a>
                <a class="signout_btn" href="<?php echo site_url('logout') ?>">SIGN OUT</a>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li class="toggle-menu show hidden-lg hidden-md ">  <!-- toggle menu -->
            <div class="toggle-panel">
              <a class="sidebar-toggle" role="button" data-toggle="offcanvas" href="#">
                <span class="sr-only">Toggle navigation</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>


  <form class="search_form col-lg-4 col-sm-5 hidden-xs <?php echo ($this->show_searchbar? 'show':'hide') ?>" role="form" accept-charset="utf-8" method="post" action="<?php echo site_url("dashboard") ?>">  
          <ul class="nav nav-tabs">
              <li class="search_tap active col-lg-3 col-sm-3" tag="c">
                <a href="#about_school_tab" data-toggle="tab">ABOUT SCHOOL</a>
              </li>
              <li class="search_tap col-lg-4 col-sm-4" tag="p">
                <a href="#about_people_tab" data-toggle="tab">TALK TO PEOPLE</a>
              </li>
              <li class="search_tap col-lg-5 col-sm-5" tag="j">
                <a href="#about_job_tab" data-toggle="tab">ABOUT MAJORS AND JOBS</a>
              </li>
            </ul>
            
            <div class="tab-content">
                <div  role="tabpanel" class="tab-pane active" id="about_school_tab">
                  <div class="col-sm-4 col-md -3 col-lg-2" style="padding: 0px;">
                    <select class="school_cat form-control input-lg" onchange="search_autocomplete('college')">
                      <option value="1" >All</option>
                      <optgroup label="USA Colleges">
                        <option value="01">National University</option>
                        <option value="02" selected>Liberal Arts</option>
                        <option value="03">Performance</option>
                        <option value="04">Arts and Creative</option>
                      </optgroup>
                      <option value="2">World Colleges</option>
                      <option value="3">Boarding Schools</option>
                    </select>
                  </div>
                  
                  <div class="col-sm-8 col-md -9 col-lg-10" style="padding: 0;">
                    <input id="search_word" class="form-control input-lg search_word" type="text" name="search_word" placeholder="Enter your Search">
                  </div>
                </div>
                
                <div  role="tabpanel" class="tab-pane" id="about_people_tab">
                  <div class="col-sm-4 col-md -3 col-lg-2" style="padding: 0px;">
                    <select class="people_cat form-control input-lg" onchange="search_autocomplete('people')">
                      <option value="1">College Counselors</option>
                      <option value="2">Tutors</option>
                      <option value="3">Essay Revisors</option>
                      <option value="4">Teachers</option>
                      <option value="5">Student</option>
                    </select>
                  </div>

                  <div class="col-sm-4 col-md -3 col-lg-10" style="padding: 0px;">
                    <input id="people_word" class="form-control input-lg search_word" type="text" name="people_word" placeholder="Enter your Search">
                  </div>
                </div>
                
                <div  role="tabpanel" class="tab-pane" id="about_job_tab" onclick="search_autocomplete('job')">
                  <div class="col-lg-12"  style="padding: 0px;">
                    <input id="job_word" class="form-control input-lg search_word" type="text" name="job_word" placeholder="Enter your Search">
                  </div>
                </div>
				
				<input type="hidden" class="search_type" name="search_type" value="">
				<input type="hidden" class="detail_code" name="detail_code" value="">
            </div>

			  <input class="btn btn-primary go_button" type="submit" value="Go">

  </form>
</header>
