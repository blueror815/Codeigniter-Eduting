
<div class="main-content">
  <section class="layer1">
    <div class="content">
      <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">

        <table width="100%" style="color: white; cursor:pointer;" class="plan_tbl">
          <colgroup width="33.33%" id="" class="" align="center" valign="middle" title="" width="1*" span="1" style="background-color:rgba(0, 0, 0, 0);" />
          <colgroup width="33.33%" id="" class="" align="center" valign="middle" title="" width="1*" span="1" style="background-color:#e93545;" />
          <colgroup width="33.33%" id="" class="" align="center" valign="middle" title="" width="1*" span="1" style="background-color:#fcb03c;" />
          <thead>
            <tr>
              <th scope="col" colspan="3">
                <div class="" style="display: table; width:100%; margin-bottom: -3px;">
                  <img src="<?php echo $this->config->item('base_url') ?>/assets/signup/img/table_logo.png" alt="" class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-4 col-sm-offset-6 col-xs-4 col-xs-offset-6" />
                </div>           
              </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td></td>
              <td><font color="#b12228">FREE PROFILE</font></td>
              <td>PREMIUM PROFILE</td>
            </tr>
            
            <tr>
              <td>Number of Cuisines</td>
              <td>1</td>
              <td>Unlimited</td>
            </tr>
            
            <tr>
              <td>Number of menu's per cuisine</td>
              <td>5</td>
              <td>Unlimited</td>
            </tr>
            
            <tr>
              <td>Deals that the chef can advertise</td>
              <td>5</td>
              <td>Unlimited</td>
            </tr>
            
            <tr>
              <td>Videos</td>
              <td>None</td>
              <td>5</td>
            </tr>

            <tr>
              <td>Blog</td>
              <td>None</td>
              <td>Gets a free blog, from us, Inbuilt blog</td>
            </tr>

            <tr>
              <td>Images with Logos etc. Includes deals image</td>
              <td>None</td>
              <td>Unlimited</td>
            </tr>

            <tr>
              <td>Notifiying chefs when Clientele posts orders</td>
              <td>
                None
              </td>
              <td>Yes</td>
            </tr>

          </tbody>
          
          <tfoot>
            <tr style="height: 65px;">
              <td>
                Price
              </td>
              <td style="background-color: #b12228;">
                Free
                <br />
                <input type="radio" name="plan" value="free_month" checked><i>per month</i></input>
                <input type="radio" name="plan" value="free_year"><i>per year</i></input>
              </td>
              <td>
                Premium
                <br />
                <input type="radio" name="plan" value="premium_month"><i>per month</i>
                <input type="radio" name="plan" value="premium_year"><i>per year</i>
              </td>
            </tr>
            
            <tr>
              <td></td>
              <td>
                <input class="btn btn-primary input-lg btnFreePlan" type="button" value="SELECT PLAN">
              </td>
              <td>                      
                <input class="btn btn-primary input-lg btnPremiumPlan" type="button" value="SELECT PLAN">
              </td>
            </tr>
          </tfoot>
        </table>
      </div>          
    </div>
  </section>

	<?php echo $template['partials']['college_slider'] ?>

</div>

<div class="signup_dialog col-lg-8 col-lg-offset-2  <?php echo $show_form; ?>">
  <?php echo form_open('signuppage/create_user', array('class' => 'form-signup', 'role' => 'form')) ?>
    <div style="padding: 5px 30px;">
      <h3><strong>CREATE AN ACCOUNT</strong></h3>
	  <p style="color:red">* Essential Required Input Field</p>
      <span class="close_button glyphicon glyphicon-remove-sign"></span>
    </div>
	<?php echo $template['partials']['flash_messages'] ?>
    <div style="background: #e5e5e5; display: inline-block; padding: 15px 5px; width : 100%;">
      <div class="col-lg-6">
        <label>SELECTED PLAN</label>
        <select name="plan" class="plan_select form-control input-lg">
          <option value="free_month">FREE PER MONTH</option>
          <option value="free_year">FREE PER YEAR</option>
          <option value="premium_month">PREMIUM PER MONTH</option>
          <option value="premium_year">PREMIUM PER YEAR</option>
        </select>
      </div>
      <div class="col-lg-6">
        <label>EDUCATION LEVEL</label>
        <select name="ed_level" class="educ_select form-control input-lg">
          <option value="C1">BEFORE MIDDLE SCHOOL</option>
          <option value="C2">MIDDLE SCHOOL STUDENT</option>
          <option value="C3" selected>HIGH SCHOOL STUDENT</option>
          <option value="C4">COLLEGE STUDENT</option>
          <option value="C5">GOLLEGE GRADUATE</option>
        </select>

      </div>
    </div>
    
    <div style="padding: 20px 10px;">

        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="padding: 0 20px;">
			<?php echo form_input($nickname) ?>
			<?php echo form_error('nickname') ?>  
          
			<?php echo form_input($email) ?>
			<?php echo form_error('email') ?>       
          
			<?php echo form_input($password) ?>
			<?php echo form_error('password') ?> 
          
			<?php echo form_input($cpassword) ?>
			<?php echo form_error('cpassword') ?>

          <select name="gender" class="gender form-control input-lg">
				<option value="M" selected>Male</option>
				<option value="F">Female</option>
          </select>
          
          <select name="national" class="national form-control input-lg">
				<option value="-1" selected>NATIONALITY</option>
				<?php foreach ($national as $key => $value) { ?>
				<option value="<?php echo $key ; ?>"><?php echo $value; ?></option> 
				<?php } ?>
          </select>
		   <?php echo form_error('national') ?>

          <?php echo form_input($lang) ?>
        </div>
        
        <div class="col-lg-5" style="border-left: 1px solid #f0f0f0; padding:0 20px; display:inline-block;">
          <div class="social_button fb_button">Sign In with Facebook</div> 
          <div class="social_button linkedin_button">Join with Linkedin</div> 
          <div class="social_button gplus_button">Sign In with Google+</div> 
          <div class="social_box">
            <p style="font-size: 16px;"><strong>BENEFITS</strong></p>
            <p>Create a profile and submit your comments.
            Review, Rate and Recommend Schools, Universities, Colleges etc. Receive alerts when a new schools or a videos is added.</p>
          </div> 
        </div>

        <div style="padding : 10px; display: inline-block; width: 100%; text-align: left">
          <input class="btn btn-primary input-lg col-lg-2 col-md-2 col-sm-4 col-xs-6 submit_button" type="submit" value="SUBMIT">
        </div>
        
        <div style="padding : 10px; display: inline-block; width: 100%; text-align: center">
          <p><strong>Already Member,<a href="<?php echo base_url(); ?>login"><font color="#f05426">Sign In</font></a></strong></p>
        </div>

    </div>
  <?php echo form_close() ?>
</div>
