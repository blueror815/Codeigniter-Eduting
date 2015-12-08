      <div class="main-content">
        <section class="layer1">
            <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer1.png" />
        </section>
        
        <section class="layer2">

            <?php echo form_open(site_url('login'), array('class' => 'form-signin', 'role' => 'form', 'style' => "text-align:center;")) ?>
              <div class="content">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<?php echo form_input($identity) ?>
						<?php echo form_error('identity') ?>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<?php echo form_input($password) ?>
						<?php echo form_error('password') ?>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<a class="forgot_password" href="<?php echo site_url('user/forgot_password') ?>">Forgot your password?</a>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
						<input class="btn btn-primary input-lg submit_button" type="submit" value="SIGN IN" />
                </div>
              </div>
            <?php echo form_close() ?>
        </section>
        
        <section class="layer3">
          <div style="text-align: center;">
            <div class="content" style="width:70%; padding:40px;">
              <h4><strong style="font-size: 18px;">SYSTEM OF EDUTING IS EASY AND FAST TO SEARCH VIDEO AND SCHOOLS.</strong></h4>
              <p style="font-size: 16px;">
                Lost of information about the University, College, Boarding School, ESL, International School, Job, Major people are contained on Eduting.com. 
                <strong style="color: #666;">You will find information easily and also can upload your videos.</strong>
              </p>
            </div>
          </div>
        </section>
      
        <section class="layer4" style="text-align: center;">
          <div class="content" style="width: 85%">
            <h1 style="padding: 20px; padding-bottom: 45px"><strong>HOW IT WORKS</strong></h1>

            <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer4_img.png" width="100%" height="auto" />  

            <div style="padding-top: 51px; padding-bottom:70px">
              <a class="link-button" href="#" >VIEW ALL CATEGORIES</a>
            </div>
          </div>
        </section>
        
        <section class="layer5" style="text-align: center;">
          <div class="content" style="width: 80%">
            <h1 style="padding: 20px;"><strong>3 STEPS AWAY FROM YOUR DREAM COllEGE</strong></h1>
            <div class="row" style="padding-left: 8%; padding-right: 8%;  padding-bottom: 43px">
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="item">
                  <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer5_1.png" />
                  <p>Register yourself with Eduting</p>  
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="item">
                  <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer5_2.png" />  
                  <p>Search best college with all information</p>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="item">
                  <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer5_3.png" />
                  <p>Enroll yourself in listed college/Universities</p>  
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <section class="layer6">
          <div class="content">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <p>WE ARE A DYNAMIC GLOBAL ONLINE EDUCTAION PROVIDER SPECIALIZING IN <strong>SEARCHES AND ACADEMIC MANAGEMENT WITH RELATED SERVICES.</strong></p>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_1.png" width="100%" /></div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_2.png" width="100%" /></div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_3.png" width="100%" /></div>
              </div>
              
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_4.png" width="100%" /></div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_5.png" width="100%" /></div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item"><img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_6.png" width="100%" /></div>
              </div>

            </div>
            <br clear="both" />
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer6_7.png" width="100%" />
            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
              <p style="font-family: FontAwesome; color:#333333;">Since 1992, Eduting collected data from the world-renowned colleges from US to world colleges in different countries such as Korea, Japan, China, Britain, France, India, Germany, and more. While working with students and parents and in schools offline or face-to-face meetings, we found ourselves the limitation by offering our services to the only privileged. Since then, we have decided to take it up to the global level via World-Wide-Web.</p>  
            </div>
            
          </div>
        </section>
        
        <section class="layer7" style="text-align: center;">
          <div class="content">
            <div class="logo_deco"><img src="<?php echo $this->config->item('base_url') ?>/assets/common/dist/img/logo_mini.png" width="85" height="48" /></div>
            <p style="color:#f15b28; font-size:22px; padding: 20px;"><strong>Services</strong></p>
            
            <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer7.png" width="100%" heigh=""/>
          </div>
        
        </section>
        
        <section class="layer8">
          <div class="col-xs-8 col-sm-5 col-md-4 col-lg-3" style="padding: 0px;">
            <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer8_1.png"  width="100%" />
          </div>
          <div class="content">

            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"
                  <div class="" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        WHAT IS EDUTING.COM?
                      </a>
                      <div id="collapseOne" class="panel-collapse collapse">
                        <div class="box-body">
                          Our standard CPL rate $5.00 for a single run. You can lower your CPL rate with a longer--term, multi--buy commitment (i.e. you want to do three consecutive runs).
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        HOW DOES IT WORK?
                      </a>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
                          2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        HOW DO I GET STARTED?
                      </a>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body">
                          3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        WHAT KIND OF SERVICE EDUTING.COM PROVIDE?
                      </a>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="box-body">
                         4 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    
                    <div style="padding: 20px 0 20px 45px;">
                      <!--input type="button" class="btn btn-primary input-lg btn_view_faq" value="VIEW ALL FAQS" -->
                      <a class="link-button" href="faq">VIEW ALL FAQS</a>
                    </div>
                    
                  </div>

          	</div>
          </div>
        </section>
        
        <section class="layer9" style="text-align: center;">
          <div class="content">
            <div style="padding: 60px 30px 30px 30px;">
              <div class="row">
                <img src="<?php echo $this->config->item('base_url') ?>/assets/homepage/img/home_page_layer9_news.png"
              </div>
              
              <div class="row">
                <h1>SUBSCRIBER OUR NEWSLETTER</h1>
              </div>
              
              <div class="row">
                <p>To get all the latest news about colleges, universities and discounts</p>
              </div>

            </div>
            
            <form role="form" style="display: table; width: 100%; margin: 10px auto;">
              <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-3 col-lg-5 col-lg-offset-3" style="padding: 15px;">
                <input type="email" class="form-control input-lg pull-right" id="user_email" placeholder="your email address here">
              </div>
              
              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="padding: 15px;">
                <input type="button" class="btn btn-primary input-lg pull-left" value="SUBSCRIBE" >
              </div>
            </form>
          </div>
        </section>
        
				<?php echo $template['partials']['college_slider'] ?>
        
      </div>
 </div><!-- Main Body -->