<?php 
    $this->load->view("partials/top_menus"); 
?>

<div class="container-fluid">
    <div class="row">
        <?php $this->load->view("partials/aside_menus"); ?>
        
        <form id="user_save" action="<?php echo base_url(); ?>user/save" method="post">
        
            <div class="col-xs-10 main tab-content">
                <table border=1 class="table table-bordered">
                    <tr>
                        <td>
                            Nickname:
                        </td>
                        <td>
                            <input type="text" value="<?php echo $user['s_no'];?>" id="nickname" name="s_no">
                            <input type="text" value="<?php echo $user['nickname'];?>" style="width:200px;" class="inputtext" id="nickname" name="nickname">
                        </td>
                        <td>
                        <?php
                            if ($user['gender'] == "M") {
                                echo '<b>Gender : &nbsp; &nbsp;  <input type="radio" checked="" value="M" name="gender"> Male
                            &nbsp; &nbsp; <input type="radio" value="F" name="gender">Female</b>';
                            } else {
                                echo '<b>Gender : &nbsp; &nbsp;  <input type="radio" value="M" name="gender"> Male
                            &nbsp; &nbsp; <input type="radio"  checked="" value="F" name="gender">Female</b>';
                            }
                        ?>
                        </td>
                        <td>
                            &nbsp; <input alt="" value="upload" name="file" id="file" align="absmiddle" type="file"> &nbsp; 
                            <img src="<?php echo base_url();?>upload/student/profile/" alt="" align="absmiddle" height="60px" width="60px"><br>
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <b>Birth Date :</b>
                        </td>
                        <td>
                            <select style="width:65px" id="month" name="month">
                                <?php
                                    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "Octorber", 
                                                    "November", "December");
                                    for($i = 1; $i < 13; $i++) {
                                        ?>
                                        <option value="<?php echo $i ;?>" <?php if($user['birthday_month']=="$i") {?>selected <?php }?>><?php echo $months[$i-1] ;?></option>
                                        <?php
                                    }
                                ?>
                            </select>&nbsp; 
                            <select style="width:65px" id="day" name="day">
                                <option value="0">Day</option>
                                <?php
                                    for ($i = 1; $i < 31; $i++) {
                                ?>
                                        <option value="<?php echo $i ;?>" <?php if($user['birthday_day']=="$i") {?>selected <?php }?>><?php echo $i ;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <select style="width:65px" id="year" name="year">
                                <option value="0">Year</option>
                                <?php
                                    for ($i = 2011; $i > 1950; $i--) {
                                ?>
                                        <option value="<?php echo $i ;?>" <?php if($user['birthday_year']=="$i") {?>selected <?php }?>><?php echo $i ;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>
                        
                        <td>
                            <b>Nationality :</b>
                        </td>
                        
                        <td>
                            <select style="width:205px;" id="national" name="national">
                                <?php
                                    foreach($nationality_list as $nation) {
                                        ?>
                                        <option value="<?php echo $nation["detail_code"]; ?>" <?php if ($user['nationality']==$nation["detail_code"]) {?> selected <?php }?> > <?php echo $nation["detail_name"]; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                            
                    <tr>

                        <td>
                            <b>Address :</b>
                        </td>
                            
                        <td>
                            <input type="text" name="address" id="address" class="inputtext" style="width:200px;" value="<?php echo $user['addr1'];?>">
                        </td>
                        
                        <td>
                            <input value="State" name="city" id="city" class="inputtext" style="width:100px;" type="text"> &nbsp; 
                            <select name="state" id="state" style="width:100px">
                                <?php 
                                foreach($state_list as $state) {
                                    ?>
                                        <option value="<?php echo $state["detail_code"]; ?>" <?php if($user['addr3']==$state["detail_code"]) { ?> selected <?php }?> > <?php echo $state["detail_name"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                        
                        <td>
                            <select name="country" id="country" style="width:205px;">
                            <?php
                                foreach($nationality_list as $nation) {
                                    ?>
                                    <option value="<?php echo $nation["detail_code"]; ?>" <?php if($user['country']==$nation["detail_code"]) { ?> selected <?php }?> > <?php echo $nation["detail_name"]; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b>Graduation Year:</b>
                        </td>
                        
                        <td>
                            <select style="width:200px" id="graduation" name="graduation">
                                <?php
                                for ($i = 2011; $i > 1980; $i--) {
                                ?>
                                    <option value="<?php echo $i ;?>" <?php if($user['graduation_year']=="$i") {?>selected <?php }?> ><?php echo $i ;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        
                        <td>
                            <b>Areas of Interests :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="interest" id="interest" class="inputtext" style="width:200px;" value="<?php echo $user['area_of_interests'];?>"/>
                        </td>
                    </tr>
                              
                    <tr>
                        <td>
                            <b>Occupation of Interests :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="interest1" id="interest1" class="inputtext" style="width:200px;" value="<?php echo $user['occupation_of_interests'];?>"/>
                        </td>
                        
                        <td>
                            <b>Religion :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="religion" class="inputtext" style="width:200px;" value="<?php echo $user['religion'];?>" />
                        </td>
                    </tr>
                              
                    <tr>
                        <td>
                            <b>Spoken Language(s) :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="language" id="language" class="inputtext" style="width:200px;" value="<?php echo $user['language']; ?>"/>
                        </td>
                        
                        <td>
                            <b>Currently Attending School :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="school" id="school" class="inputtext" style="width:200px;" value="<?php echo $user['currently_school']; ?>" />
                        </td>
                    </tr>
                            
                    <tr>
                        <td>
                            <b>Legacy :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="legacy" class="inputtext" style="width:200px;" value="<?php echo $user['legacy'];?>" />
                        </td>
                        
                        <td>
                            <b>Finance :</b>
                        </td>
                            
                        <td>
                            <input type="text" name="finance" class="inputtext" style="width:200px;" value="<?php echo $user['finance'];?>" />
                        </td>
                    </tr>
                            
                    <tr bgcolor="#ffffff">
                        <td bgcolor="#efefe7" align="center">
                            <font class="bbstitle">User Type </font>
                        </td>
                        
                        <td>&nbsp;
                            <input name="user_type" type="radio" value="1" <?php if($user['user_type']=="1") { ?>checked <?php } ?>/> College Counselor &nbsp; &nbsp; 
                            <input name="user_type" type="radio" value="2" <?php if($user['user_type']=="2") { ?>checked <?php } ?>/> Tutor             &nbsp; &nbsp; 
                            <input name="user_type" type="radio" value="3" <?php if($user['user_type']=="3") { ?>checked <?php } ?>/> Essay Revisor     &nbsp; &nbsp; 
                            <input name="user_type" type="radio" value="4" <?php if($user['user_type']=="4") { ?>checked <?php } ?>/> Teacher           &nbsp; &nbsp; 
                            <input name="user_type" type="radio" value="5" <?php if($user['user_type']=="5") { ?>checked <?php } ?>/> Student           &nbsp; &nbsp; 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Major :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="major" class="inputtext" style="width:200px;" value="<?php echo $user['major'];?>"  />
                        </td>
                        
                        <td>
                            <b>Minor :</b>
                        </td>
                        
                        <td>
                            <input type="text" name="minor" class="inputtext" style="width:200px;"  value="<?php echo $user['minor']; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Ethnicity :</b>
                        </td>
                        
                        <td>
                            <select name="ethnicity" >
                            <?php
                                echo "<option></option>";
                                foreach($ethnicity_list as $ethnicity) {
                                    if ($detail_code == $user['detail_code']) {
                                        $options .= '<option value="'.$ethnicity['detail_code'].'" selected>'.htmlspecialchars($ethnicity['eng_detail_name']).'</option>';
                                    } else {
                                        $options .= '<option value="'.$ethnicity['detail_code'].'">'.htmlspecialchars($ethnicity['eng_detail_name']).'</option>';
                                    }
                                }
                                echo $options;
                            ?>
                            </select>
                        </td>
                        
                        <td>
                            <b>Password :</b>
                        </td>
                        
                        <td>
                            <input type="password" name="pass" class="inputtext" readonly style="width:200px;"  value="<?php echo $user['pass'];?>" />
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td bgcolor="#efefe7" align="center">
                            <font class="bbstitle">School Representative</font>
                        </td>
                        <td>
                            <input type="hidden" id="school_rep" name="college_code" value="<?php htmlspecialchars($user['school_rep']); ?>">
                            &nbsp;<input type="text" id="school_rep_name" name="college_name" size="40" readonly value="<?php htmlspecialchars($user['school_rep_name']); ?>">
                            <input type="button" value="Search" > <a href="#">clear</a>
                        </td>
                    </tr>
                            
                    <tr>
                        <td align="center" colspan="4"> 
                            <a href="<?php echo base_url();?>user"><img alt="" src="../../images/cancel.gif">Cancel</a> &nbsp;
                            <input type="submit" value="OK" >
                        </td>
                    </tr>
                </table>
            </div>
    
        </form>
    </div>
</div>