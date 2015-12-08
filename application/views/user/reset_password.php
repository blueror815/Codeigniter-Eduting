<div class="main-content">
	<section class="layer1">
		<div class="content">
			<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">

					<?php echo form_open('user/reset_password/' . $code, array('class' => 'form-reset-password'));?>

						<h1 class="form-reset-heading">Forgot password</h1>
						<br />
						
						<!--div id="infoMessage"><?php //echo $message;?></div-->
						<?php echo $template['partials']['flash_messages'] ?>

						<p>Please enter new password.</p>
						
						<div class="control-group <?php echo (form_error('new')) ? 'error' : '' ?>">
							<div class="controls">
								<label class="control-label" for="new"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
								<?php echo form_input($new) ?>
								<?php echo form_error('new') ?>
							</div>
						</div>
						<br />
						<div class="control-group <?php echo (form_error('new_confirm')) ? 'error' : '' ?>">
							<div class="controls">
								<label  class="control-label" for="new_confirm"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?></label>
								<?php echo form_input($new_confirm) ?>
								<?php echo form_error('new_confirm') ?>
							</div>
						</div>

						<?php echo form_input($user_id);?>

						<br />
						<div class="form-actions">
							<div style="text-align: center;">
								<input class="btn btn-primary input-lg submit_button" type="submit" value="Reset Password" />
							</div>
						</div>

					<?php echo form_close();?>
					
			</div>
		</div>
	</section>
</div>
					