
<div class="main-content">
  <section class="layer1">
    <div class="content">
      <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">

				<?php echo form_open('login', array('class' => 'form-signin')) ?>
					
					<h1 class="form-signin-heading">Please sign in</h1>
					<br />
					<?php echo $template['partials']['flash_messages'] ?>
					<div class="control-group <?php echo (form_error('identity')) ? 'error' : '' ?>">
						<div class="controls">
							<label for="identity" class="control-label">Email</label>
							<?php echo form_input($identity) ?>
							<?php echo form_error('identity') ?>
						</div>
					</div>
					<br />
					<div class="control-group <?php echo (form_error('password')) ? 'error' : '' ?>">
						<div class="controls">
							<label for="password" class="control-label">Password</label>
							<?php echo form_input($password) ?>
							<?php echo form_error('password') ?>
						</div>
					</div>
					
					<div class="form-actions">
						<div class="col-lg-6" style="color:black;">
							<label class="checkbox cb_rememberme" style="font-size: 14px;">
								<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"') ?> Keep me logged in
							</label>
						</div>
						<div class="col-lg-6">
							<input class="btn btn-primary input-lg submit_button" type="submit" value="SIGN IN" />
						</div>
					</div>
				
				<?php echo form_close() ?>
				
				<br />
				<div class="section_forgot">
					&raquo; <a href="<?php echo site_url('forgot-password') ?>">Forgot your password?</a>
				</div>				
        
      </div>          
    </div>
  </section>

	<?php echo $template['partials']['college_slider'] ?>

</div>

