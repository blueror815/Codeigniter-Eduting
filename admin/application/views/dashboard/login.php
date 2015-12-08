<div class="col-md-3 col-md-offset-4" style="top: 100px;">
    <div class="panel panel-default">

        <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
        <div class="panel-heading"> 
            <strong class="">Login</strong>
        </div>
        <div class="panel-body">
            <?php 
                $attributes = array('class' => 'form-horizontal', 'id' => 'loginform');
                echo form_open("login" , $attributes);
            ?>
                <div class="form-group">
                    
                    <label for="identity" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                    
                        <?php echo form_input($identity);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-9">
                        <?php echo form_input($password);?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                
                <div class="form-group last">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?php                             
                        echo form_submit('submit', 'Login');
                        ?>
                    </div>
                </div>
                <?php echo form_close();?>
        </div>
        <div class="panel-footer"><a href="forgot_password">Forgot your password?</a>
        </div>

    </div>
</div>
