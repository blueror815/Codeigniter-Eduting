<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" <?php echo ($this->bLogin==false? " style='margin-left:0 !important;'" : "") ?> >
  <section class="content_area story_menu_area">
    <div class="story_menu">
        <span class="prev_menu glyphicon glyphicon-chevron-left hidden-sm hidden-xs"></span>
        <span class="next_menu glyphicon glyphicon-chevron-right hidden-sm hidden-xs"></span>
        <ul class="nav nav-tabs story_non_dropdown hidden-xs hidden-sm">
            <li class="active col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionA">ALL</a></li>

            <li class="col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionB">NATIONAL UNIV.</a></li>
                               
            <li class="col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionC">LIVERAL ARTS</a></li>
            
            <li class="col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionD">PERFORMANCE</a></li>
            
            <li class="col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionE">ARTS &amp; CREATIVE</a></li>
            
            <li class="col-lg-2 col-md-2 non-dropdown hidden-xs hidden-sm"><a data-toggle="tab" href="#sectionF">MILITARY SCHOOL</a></li>
        </ul>

        <ul class="nav nav-tabs story_dropdown">
            <li class="dropdown hidden-lg hidden-md col-xs-12 col-sm-12">

                <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <b class="caret"></b></a>

                <ul class="dropdown-menu">
                    <li><a data-toggle="tab" href="#sectionA">ALL</a></li>
                    
                    <li><a data-toggle="tab" href="#sectionB">NATIONAL UNIV.</a></li>
                
                    <li><a data-toggle="tab" href="#sectionC">LIVERAL ARTS</a></li>

                    <li><a data-toggle="tab" href="#sectionD">PERFORMANCE</a></li>
                    
                    <li><a data-toggle="tab" href="#sectionE">ARTS &amp; CREATIVE</a></li>
                    
                    <li><a data-toggle="tab" href="#sectionF">MILITARY SCHOOL</a></li>
                </ul>

            </li>

        </ul>
        
    </div>
    
    <div class="cube story_menu_pad">
      <div class="tab-content">
        <div class="tab-pane fade in active  search-tab" id="sectionA">
           <div class="col-lg-10 col-md=10 col-sm-10 col-xs-10">
              <div class="alpha_box col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="">
                  <span class="alpha">A</span>
                  <span class="alpha">B</span>
                  <span class="alpha">C</span>
                  <span class="alpha">D</span>
                  <span class="alpha">E</span>
                  <span class="alpha">F</span>
                  <span class="alpha">G</span>
                  <span class="alpha">H</span>
                  <span class="alpha">I</span>
                  <span class="alpha">J</span>
                  <span class="alpha">K</span>
                  <span class="alpha">L</span>
                  <span class="alpha">M</span>
                </div>
                
                <div class="">
                  <span class="alpha">N</span>
                  <span class="alpha">O</span>
                  <span class="alpha">P</span>
                  <span class="alpha">Q</span>
                  <span class="alpha">R</span>
                  <span class="alpha">S</span>
                  <span class="alpha">T</span>
                  <span class="alpha">U</span>
                  <span class="alpha">V</span>
                  <span class="alpha">W</span>
                  <span class="alpha">X</span>
                  <span class="alpha">Y</span>
                  <span class="alpha">Z</span>
                </div>                    
              </div>
              
              <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 sbcn">
                Search by College Name
              </div>
           </div>
		   
		   <div class="col-lg-2 col-md=2 col-sm-2 col-xs-2">
				<span class="close_button glyphicon glyphicon-remove-sign"></span>
		   </div>
           
           <div class="cube col-lg-12 beta_lists">
              <div class="beta col-lg-4">Adelphi University (NY)</div>
           </div>
        </div>
        
        <div class="tab-pane fade search-tab"  id="sectionB">
        NATIONAL UNIV.
        </div>
        
        <div class="tab-pane fade search-tab"  id="sectionC">
        LIVERAL ARTS
        </div>
        
        <div class="tab-pane fade search-tab"  id="sectionD">
        PERFORMANCE                  
        </div>

        <div class="tab-pane fade search-tab"  id="sectionE">
        ARTS &amp; CREATIVE
        </div>
        
        <div class="tab-pane fade search-tab"  id="sectionF">
        MILITARY SCHOOL
        </div>
      </div>
    </div>        
  </section>
  <!-- Main content -->
  <section class="content_area story_lists">
	<?php 
		$odd_even = 0;
    $userno = $this->session->userdata("snum");
		foreach($videos as $v) {
  ?>
			<div class="cube <?php echo (++$odd_even%2 ? "odd" : "even"); ?> ">
					<div class="video_cube col-lg-4 col-md-4 ">
						<?php echo $v['embed']; ?>
					</div>
					
					<div class="detail_cube col-lg-5 col-md-4 ">
						<h4 class="uni_name"><strong><?php echo ($v['college_name']!="null"? $v['college_name'] : ""); ?> </strong></h4>
						<p class="uni_detail"><?php echo $v['title']; ?></p>
          <?php if($v['college_code']) { ?>
            <a class="video_detail_button" href="">SEE DETAILS <span class="glyphicon glyphicon-chevron-right"></span></a>
          <?php } ?>
         </div>

        <div class="favor_cube col-lg-3 col-md-4 ">
						<p class="st_category">CATEGORY</p>

						<h4 class="uppercase uni_category"><?php echo ($v['college_type_name']!=null? $v['college_type_name'] : ""); ?> </h4>
           <?php if($this->bLogin == true) { ?>
						<input type="button" class="btn btn-primary input-lg" value="ADD TO FAVORITE" onclick="add_to_favorite('<?php echo $search_type; ?>', '<?php echo $v['college_code']; ?>', '<?php echo $v['movie_code']; ?>' )" >
          <?php } ?>

						<p class="uni_last_online"><span class="glyphicon glyphicon-time"></span><?php echo $v['viewcount']; ?> visits </p>
				 </div>
			</div>

			<?php if($odd_even == 4) { ?>
				<div class="ad_cube">
          <a class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" href=""></a>
       </div>
			<?php } 
		}
    ?>
 

    
  </section><!-- /.content -->
  
  <section>
    <div class="ad_cube">
    <?php if(!$no_more) { ?>
        <input type="button" class="btn btn-primary input-lg load_more_button col-lg-4 col-lg-offset-4" 
        cate="<?php echo $search_type!=""? $search_type:""; ?>"
        code="<?php echo $detail_code!=""? $detail_code:""; ?>"
        word="<?php echo $search_word!=""? $search_word:""; ?>"
        rand="<?php echo $bRand; ?>" 
        page="<?php echo $pages; ?>" value="LOAD MORE..." >
        
        <div class="loading_gif"></div>
    <?php } ?>
      
    </div>
  </section>
</div><!-- /.content-wrapper -->