<div class="main-content">
	<section class="layer1">
		<div class="content">
			<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			
				<?php echo form_open('user/forgot_password', array('class' => 'form-password-forgot')) ?>
					
					<h1 class="form-forgot-heading">Forgot password</h1>
					<br />
					<?php echo $template['partials']['flash_messages'] ?>
					
					<p>Please enter your email address so we can send you an email to reset your password.</p>

					<div class="control-group <?php echo (form_error('email')) ? 'error' : '' ?>">
						<div class="controls">
							<label class="control-label" for="email">Email</label>
							<?php echo form_input($email) ?>
							<?php echo form_error('email') ?>
						</div>
					</div>
					<br />
					<div class="form-actions">
						<div style="text-align: center;">
							<input class="btn btn-primary input-lg submit_button" type="submit" value="Send me a new one" />
						</div>
					</div>

				<?php echo form_close() ?>
			</div>
		</div>
	</section>
	
	<?php echo $template['partials']['college_slider'] ?>
</div>
			