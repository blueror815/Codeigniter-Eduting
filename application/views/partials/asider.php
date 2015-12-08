<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar  <?php echo $this->bLogin; echo ($this->bLogin? 'show':'hide'); ?>">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <div class="toggle-panel hidden-xs"  style="border-bottom: 1px solid #f2f2f2;">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>                    
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      
      <li class="active">
        <a href="dashboard">
          <i  class="sm_dashboard"></i> <span>DASHBOARD</span>
        </a>
      </li>
      
      <li>
        <a href="#">
          <i class='sm_tution'></i> <span>$/TUITION/LOAN</span>
        </a>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class='sm_academic'></i> <span>ACADEMICS</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">GPA</a></li>
          <li><a href="#">TEST</a></li>
          <li><a href="#">ESSAYS</a></li>
          <li><a href="#">PORTFOLIO</a></li>
          <li><a href="#">SCHEDULE</a></li>
          <li><a href="#">RESUME</a></li>
          <li><a href="#">RECOMMENDATION</a></li>
        </ul>
      </li>
      
      <li>
        <a href="#">
          <i class='sm_career'></i> <span>CAREER</span>
        </a>
      </li>
      
      <li>
        <a href="#">
          <i class='sm_eduting'></i> <span>EDUTING</span>
        </a>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class='sm_favorite'></i> <span>MY FAVOURITE</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">COLLEGES</a></li>
          <li><a href="#">JOBS</a></li>
          <li><a href="#">MAJORS</a></li>
          <li><a href="#">PEOPLE</a></li>
          <li><a href="#">VIDEOS</a></li>
        </ul>
      </li>
      
      <li>
        <a href="#">
          <i class='sm_buysell'></i> <span>BUY/SELL/FREE</span>
        </a>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class='sm_conner'></i> <span>CONNERS</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">SCHOOLS</a></li>
          <li><a href="#">RYANS</a></li>
        </ul>
      </li>
      
    </ul><!-- /.sidebar-menu -->
  </section><!-- /.sidebar -->

</aside>
