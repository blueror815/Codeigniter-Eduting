<html>
	<head>
		<title>Admin Dashboard</title>
		<link type='text/css' href="<?php echo base_url();?>css/bootstrap.css" rel='Stylesheet' />
		<link type='text/css' href="<?php echo base_url();?>css/dashboard.css" rel='Stylesheet' />
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.vertical-tabs.css">
		<script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Search Data</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2">
          <ul class="nav nav-tabs tabs-left">
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=universities">College/World University</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=graduat_school_major">Graduate School Major</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=manage_users">Manage Users</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=jobs">Jobs</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=general_major">General Major</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=pr_teacher">PR Teacher</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=college_esl_program">College ESL Program</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=boarding_school">Boarding School</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=occupation">Occupation</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=ad">AD</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=upload_photo">Upload Video</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=manage_college_score">Manage College Scores</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=college_info_request">College Info Requests</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=country">Country</a></li>
            <li><a class="dashboard_link" href="<?php echo base_url();?>admin?param=coins_tranaction">Coins Transaction</a></li>
          </ul>
        </div>

        <div class="col-xs-10 main tab-content">
        
        	<table border=1>
	        	<tr>
	        		<td>
	        			Nickname:
	        		</td>
	        		<td>
	        			<input type="text" value="<?php echo $result_user['nickname'];?>" style="width:200px;" class="inputtext" id="nickname" name="nickname">
	        		</td>
	        		<td>
	        			<b>Gender : &nbsp; &nbsp;  <input type="radio" checked="" value="M" name="gender"> Male             &nbsp; &nbsp; <input type="radio" value="F" name="gender">   Female</b>
	        		</td>
	        		<td>
	        			 &nbsp; <input alt="" value="upload" name="file" id="file" align="absmiddle" type="file"> &nbsp; <img src="../../upload/student/profile/" alt="" align="absmiddle" height="60px" width="60px"><br>
	        		</td>
	        	</tr>
	        	
	        	<tr>
	    				<td>
	    					<b>Birth Date :</b>
							</td>
	    				<td>
	    					<select style="width:65px" id="month" name="month">
									<option value="0">Month</option>
						      <option value="1">January</option>
						      <option value="2">February</option>
						      <option selected="" value="3">March</option>
						      <option value="4">April</option>
						      <option value="5">May</option>
						      <option value="6">June</option>
						      <option value="7">July</option>
						      <option value="8">August</option>
						      <option value="9">September</option>
						      <option value="10">October</option>
						      <option value="11">November</option>
						      <option value="12">December</option>
	             	</select>&nbsp; 
	              <select style="width:65px" id="day" name="day">
	              	<option value="0">Day</option>
	              	<?php
	              		for ($i = 1; $i < 31; $i++) {
	              			?>
	              				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	              			<?php
	              		}
	              	?>
	              </select>
	              <select style="width:65px" id="year" name="year">
						   		<option value="0">Year</option>
						   		<?php
						   			for ($i = 2011; $i > 1950; $i--) {
						   				?>
						   					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						   				<?php		
						   			}
						   		?>
	              </select>
	            </td>
					    <td><b>Nationality :</b></td>
					    <td>
								<select style="width:205px;" id="national" name="national">
	                <option value="0004"> Afghanistan</option>
	                <option value="0005"> Albania</option>
	                <option value="0006"> Algeria</option>
	                <option value="0007"> American Samoa</option>
	                <option value="0008"> Andorra</option>
	                <option value="0009"> Angola</option>
	                <option value="0010"> Anguilla</option>
	                <option value="0011"> Antigua and Barbuda</option>
	                <option value="0012"> Argentina</option>
	                <option value="0013"> Armenia</option>
	                <option value="0014"> Aruba</option>
	                <option value="0015"> Australia</option>
	                <option value="0016"> Austria</option>
	                <option value="0017"> Azerbaijan Republic</option>
	                <option value="0018"> Bahamas</option>
	                <option value="0019"> Bahrain</option>
	                <option value="0020"> Bangladesh</option>
	                <option value="0021"> Barbados</option>
	                <option value="0022"> Belarus</option>
	                <option value="0023"> Belgium</option>
	                <option value="0024"> Belize</option>
	                <option value="0025"> Benin</option>
	                <option value="0026"> Bermuda</option>
	                <option value="0027"> Bhutan</option>
	                <option value="0028"> Bolivia</option>
	                <option value="0029"> Bosnia and Herzegovina</option>
	                <option value="0030"> Botswana</option>
	                <option value="0031"> Brazil</option>
	                <option value="0032"> British Virgin Islands</option>
	                <option value="0033"> Brunei Darussalam</option>
	                <option value="0034"> Bulgaria</option>
	                <option value="0035"> Burkina Faso</option>
	                <option value="0036"> Burma</option>
	                <option value="0037"> Burundi</option>
	                <option value="0038"> Cambodia</option>
	                <option value="0039"> Cameroon</option>
	                <option value="0002"> Canada</option>
	                <option value="0041"> Cape Verde Islands</option>
	                <option value="0042"> Cayman Islands</option>
	                <option value="0043"> Central African Republic</option>
	                <option value="0044"> Chad</option>
	                <option value="0045"> Chile</option>
	                <option value="0046"> China</option>
	                <option value="0047"> Colombia</option>
	                <option value="0048"> Comoros</option>
	                <option value="0049"> Congo, Democratic Republic of the</option>
	                <option value="0050"> Congo, Republic of the</option>
	                <option value="0051"> Cook Islands</option>
	                <option value="0052"> Costa Rica</option>
	                <option value="0053"> Cote d Ivoire (Ivory Coast)</option>
	                <option value="0054"> Croatia, Republic of</option>
	                <option value="0055"> Cyprus</option>
	                <option value="0056"> Czech Republic</option>
	                <option value="0057"> Denmark</option>
	                <option value="0058"> Djibouti</option>
	                <option value="0059"> Dominica</option>
	                <option value="0060"> Dominican Republic</option>
	                <option value="0061"> Ecuador</option>
	                <option value="0062"> Egypt</option>
	                <option value="0063"> El Salvador</option>
	                <option value="0064"> Equatorial Guinea</option>
	                <option value="0065"> Eritrea</option>
	                <option value="0066"> Estonia</option>
	                <option value="0067"> Ethiopia</option>
	                <option value="0068"> Falkland Islands (Islas Malvinas)</option>
	                <option value="0069"> Fiji</option>
	                <option value="0070"> Finland</option>
	                <option value="0071"> France</option>
	                <option value="0072"> French Guiana</option>
	                <option value="0073"> French Polynesia</option>
	                <option value="0074"> Gabon Republic</option>
	                <option value="0075"> Gambia</option>
	                <option value="0076"> Georgia</option>
	                <option value="0077"> Germany</option>
	                <option value="0078"> Ghana</option>
	                <option value="0079"> Gibraltar</option>
	                <option value="0080"> Greece</option>
	                <option value="0081"> Greenland</option>
	                <option value="0082"> Grenada</option>
	                <option value="0083"> Guadeloupe</option>
	                <option value="0084"> Guam</option>
	                <option value="0085"> Guatemala</option>
	                <option value="0086"> Guernsey</option>
	                <option value="0087"> Guinea</option>
	                <option value="0088"> Guinea-Bissau</option>
	                <option value="0089"> Guyana</option>
	                <option value="0090"> Haiti</option>
	                <option value="0091"> Honduras</option>
	                <option value="0092"> Hong Kong</option>
	                <option value="0093"> Hungary</option>
	                <option value="0094"> Iceland</option>
	                <option value="0095"> India</option>
	                <option value="0096"> Indonesia</option>
	                <option value="0097"> Ireland</option>
	                <option value="0098"> Israel</option>
	                <option value="0099"> Italy</option>
	                <option value="0100"> Jamaica</option>
	                <option value="0101"> Jan Mayen</option>
	                <option value="0102"> Japan</option>
	                <option value="0103"> Jersey</option>
	                <option value="0104"> Jordan</option>
	                <option value="0105"> Kazakhstan</option>
	                <option value="0106"> Kenya</option>
	                <option value="0107"> Kiribati</option>
	                <option value="0108"> Korea, Republic of</option>
	                <option value="0221"> Korea, Democratic People's Rep.</option>
	                <option value="0109"> Kuwait</option>
	                <option value="0110"> Kyrgyzstan</option>
	                <option value="0111"> Laos</option>
	                <option value="0112"> Latvia</option>
	                <option value="0113"> Lebanon</option>
	                <option value="0114"> Liechtenstein</option>
	                <option value="0115"> Lithuania</option>
	                <option value="0116"> Luxembourg</option>
	                <option value="0117"> Macau</option>
	                <option value="0118"> Macedonia</option>
	                <option value="0119"> Madagascar</option>
	                <option value="0120"> Malawi</option>
	                <option value="0121"> Malaysia</option>
	                <option value="0122"> Maldives</option>
	                <option value="0123"> Mali</option>
	                <option value="0124"> Malta</option>
	                <option value="0125"> Marshall Islands</option>
	                <option value="0126"> Martinique</option>
	                <option value="0127"> Mauritania</option>
	                <option value="0128"> Mauritius</option>
	                <option value="0129"> Mayotte</option>
	                <option value="0130"> Mexico</option>
	                <option value="0131"> Micronesia</option>
	                <option value="0132"> Moldova</option>
	                <option value="0133"> Monaco</option>
	                <option value="0134"> Mongolia</option>
	                <option value="0135"> Montserrat</option>
	                <option value="0136"> Morocco</option>
	                <option value="0137"> Mozambique</option>
	                <option value="0138"> Namibia</option>
	                <option value="0139"> Nauru</option>
	                <option value="0140"> Nepal</option>
	                <option value="0141"> Netherlands</option>
	                <option value="0142"> Netherlands Antilles</option>
	                <option value="0143"> New Caledonia</option>
	                <option value="0144"> New Zealand</option>
	                <option value="0145"> Nicaragua</option>
	                <option value="0146"> Niger</option>
	                <option value="0147"> Nigeria</option>
	                <option value="0148"> Niue</option>
	                <option value="0149"> Norway</option>
	                <option value="0150"> Oman</option>
	                <option value="0151"> Pakistan</option>
	                <option value="0152"> Palau</option>
	                <option value="0153"> Panama</option>
	                <option value="0154"> Papua New Guinea</option>
	                <option value="0155"> Paraguay</option>
	                <option value="0156"> Peru</option>
	                <option value="0157"> Philippines</option>
	                <option value="0158"> Poland</option>
	                <option value="0159"> Portugal</option>
	                <option value="0160"> Puerto Rico</option>
	                <option value="0161"> Qatar</option>
	                <option selected="" value="0162"> Romania</option>
	                <option value="0163"> Russian Federation</option>
	                <option value="0164"> Rwanda</option>
	                <option value="0165"> Saint Helena</option>
	                <option value="0166"> Saint Kitts-Nevis</option>
	                <option value="0167"> Saint Lucia</option>
	                <option value="0168"> Saint Pierre and Miquelon</option>
	                <option value="0169"> Saint Vincent and the Grenadines</option>
	                <option value="0170"> San Marino</option>
	                <option value="0171"> Saudi Arabia</option>
	                <option value="0172"> Senegal</option>
	                <option value="0173"> Seychelles</option>
	                <option value="0174"> Sierra Leone</option>
	                <option value="0175"> Singapore</option>
	                <option value="0176"> Slovakia</option>
	                <option value="0177"> Slovenia</option>
	                <option value="0178"> Solomon Islands</option>
	                <option value="0179"> Somalia</option>
	                <option value="0180"> South Africa</option>
	                <option value="0181"> Spain</option>
	                <option value="0182"> Sri Lanka</option>
	                <option value="0183"> Suriname</option>
	                <option value="0184"> Svalbard</option>
	                <option value="0185"> Swaziland</option>
	                <option value="0186"> Sweden</option>
	                <option value="0187"> Switzerland</option>
	                <option value="0188"> Syria</option>
	                <option value="0189"> Tahiti</option>
	                <option value="0190"> Taiwan</option>
	                <option value="0191"> Tajikistan</option>
	                <option value="0192"> Tanzania</option>
	                <option value="0193"> Thailand</option>
	                <option value="0194"> Togo</option>
	                <option value="0195"> Tonga</option>
	                <option value="0196"> Trinidad and Tobago</option>
	                <option value="0197"> Tunisia</option>
	                <option value="0198"> Turkey</option>
	                <option value="0199"> Turkmenistan</option>
	                <option value="0201"> Tuvalu</option>
	                <option value="0202"> Uganda</option>
	                <option value="0203"> Ukraine</option>
	                <option value="0204"> United Arab Emirates</option>
	                <option value="0003"> United Kingdom</option>
	                <option value="0001"> United States</option>
	                <option value="0200"> urks and Caicos Islands</option>
	                <option value="0207"> Uruguay</option>
	                <option value="0208"> Uzbekistan</option>
	                <option value="0209"> Vanuatu</option>
	                <option value="0210"> Vatican City State</option>
	                <option value="0211"> Venezuela</option>
	                <option value="0212"> Vietnam</option>
	                <option value="0213"> Virgin Islands (U.S.)</option>
	                <option value="0214"> Wallis and Futuna</option>
	                <option value="0215"> Western Sahara</option>
	                <option value="0216"> Western Samoa</option>
	                <option value="0217"> Yemen</option>
	                <option value="0218"> Yugoslavia</option>
	                <option value="0219"> Zambia</option>
	                <option value="0220"> Zimbabwe</option>
	              </select>
	            </td>
	  				</tr>
	  				
	  				<tr>
	  					
    					<td>
    						<b>Address :</b>
    					</td>
					    <td>
					    	<input name="address" id="address" class="inputtext" style="width:200px;" value="Addr1" type="text">
					    </td>
					    <td>
					    	<input value="State" name="city" id="city" class="inputtext" style="width:100px;" onclick="clearfield();" type="text"> &nbsp; 
								<select name="state" id="state" style="width:100px">
									<option>State</option>
									<option value="0001"> Alabama</option>
									<option value="0050"> Alaska</option>
									<option value="0002" selected=""> Arizona</option>
									<option value="0003"> Arkansas</option>
									<option value="0004"> California</option>
									<option value="0005"> Colorado</option>
									<option value="0006"> Connecticut</option>
									<option value="0007"> Delaware</option>
									<option value="0008"> District of Columbia</option>
									<option value="0009"> Florida</option>
									<option value="0010"> Georgia</option>
									<option value="0011"> Hawaii</option>
									<option value="0012"> Idaho</option>
									<option value="0013"> Illinois</option>
									<option value="0014"> Indiana</option>
									<option value="0015"> Iowa</option>
									<option value="0016"> Kansas</option>
									<option value="0017"> Kentucky</option>
									<option value="0018"> Louisiana</option>
									<option value="0047"> Maine</option>
									<option value="0019"> Maryland</option>
									<option value="0020"> Massachusetts</option>
									<option value="0021"> Michigan</option>
									<option value="0022"> Minnesota</option>
									<option value="0023"> Mississippi</option>
									<option value="0024"> Missouri</option>
									<option value="0025"> Montana</option>
									<option value="0026"> Nebraska</option>
									<option value="0051"> Nevada</option>
									<option value="0027"> New Hampshire</option>
									<option value="0028"> New Jersey</option>
									<option value="0029"> New Mexico</option>
									<option value="0030"> New York</option>
									<option value="0031"> North Carolina</option>
									<option value="0049"> North Dakota</option>
									<option value="0032"> Ohio</option>
									<option value="0033"> Oklahoma</option>
									<option value="0034"> Oregon</option>
									<option value="0035"> Pennsylvania</option>
									<option value="0037"> Rhode Island</option>
									<option value="0038"> South Carolina</option>
									<option value="0052"> South Dakota</option>
									<option value="0039"> Tennessee</option>
									<option value="0040"> Texas</option>
									<option value="0041"> Utah</option>
									<option value="0042"> Vermont</option>
									<option value="0043"> Virginia</option>
									<option value="0044"> Washington</option>
									<option value="0048"> West Virginia</option>
									<option value="0045"> Wisconsin</option>
									<option value="0046"> Wyoming</option>
								</select>
                    </td>
                    <td>
    						<select name="country" id="country" style="width:205px;">
									<option value="0">Country</option>
									<option value="0004"> Afghanistan</option>
									<option value="0005"> Albania</option>
									<option value="0006"> Algeria</option>
									<option value="0007"> American Samoa</option>
									<option value="0008"> Andorra</option>
									<option value="0009"> Angola</option>
									<option value="0010"> Anguilla</option>
									<option value="0011"> Antigua and Barbuda</option>
									<option value="0012"> Argentina</option>
									<option value="0013"> Armenia</option>
									<option value="0014"> Aruba</option>
									<option value="0015"> Australia</option>
									<option value="0016"> Austria</option>
									<option value="0017"> Azerbaijan Republic</option>
									<option value="0018"> Bahamas</option>
									<option value="0019"> Bahrain</option>
									<option value="0020"> Bangladesh</option>
									<option value="0021"> Barbados</option>
									<option value="0022"> Belarus</option>
									<option value="0023"> Belgium</option>
									<option value="0024"> Belize</option>
									<option value="0025"> Benin</option>
									<option value="0026"> Bermuda</option>
									<option value="0027"> Bhutan</option>
									<option value="0028"> Bolivia</option>
									<option value="0029"> Bosnia and Herzegovina</option>
									<option value="0030"> Botswana</option>
									<option value="0031"> Brazil</option>
									<option value="0032"> British Virgin Islands</option>
									<option value="0033"> Brunei Darussalam</option>
									<option value="0034"> Bulgaria</option>
									<option value="0035"> Burkina Faso</option>
									<option value="0036"> Burma</option>
									<option value="0037"> Burundi</option>
									<option value="0038"> Cambodia</option>
									<option value="0039"> Cameroon</option>
									<option value="0002"> Canada</option>
									<option value="0041"> Cape Verde Islands</option>
									<option value="0042"> Cayman Islands</option>
									<option value="0043"> Central African Republic</option>
									<option value="0044"> Chad</option>
									<option value="0045"> Chile</option>
									<option value="0046"> China</option>
									<option value="0047"> Colombia</option>
									<option value="0048"> Comoros</option>
									<option value="0049"> Congo, Democratic Republic of the</option>
									<option value="0050"> Congo, Republic of the</option>
									<option value="0051"> Cook Islands</option>
									<option value="0052"> Costa Rica</option>
									<option value="0053"> Cote d Ivoire (Ivory Coast)</option>
									<option value="0054"> Croatia, Republic of</option>
									<option value="0055"> Cyprus</option>
									<option value="0056"> Czech Republic</option>
									<option value="0057"> Denmark</option>
									<option value="0058"> Djibouti</option>
									<option value="0059"> Dominica</option>
									<option value="0060"> Dominican Republic</option>
									<option value="0061"> Ecuador</option>
									<option value="0062"> Egypt</option>
									<option value="0063"> El Salvador</option>
									<option value="0064"> Equatorial Guinea</option>
									<option value="0065"> Eritrea</option>
									<option value="0066"> Estonia</option>
									<option value="0067"> Ethiopia</option>
									<option value="0068"> Falkland Islands (Islas Malvinas)</option>
									<option value="0069"> Fiji</option>
									<option value="0070"> Finland</option>
									<option value="0071"> France</option>
									<option value="0072"> French Guiana</option>
									<option value="0073"> French Polynesia</option>
									<option value="0074"> Gabon Republic</option>
									<option value="0075"> Gambia</option>
									<option value="0076"> Georgia</option>
									<option value="0077"> Germany</option>
									<option value="0078"> Ghana</option>
									<option value="0079"> Gibraltar</option>
									<option value="0080"> Greece</option>
									<option value="0081"> Greenland</option>
									<option value="0082"> Grenada</option>
									<option value="0083"> Guadeloupe</option>
									<option value="0084"> Guam</option>
									<option value="0085"> Guatemala</option>
									<option value="0086"> Guernsey</option>
									<option value="0087"> Guinea</option>
									<option value="0088"> Guinea-Bissau</option>
									<option value="0089"> Guyana</option>
									<option value="0090"> Haiti</option>
									<option value="0091"> Honduras</option>
									<option value="0092"> Hong Kong</option>
									<option value="0093"> Hungary</option>
									<option value="0094"> Iceland</option>
									<option value="0095"> India</option>
									<option value="0096"> Indonesia</option>
									<option value="0097"> Ireland</option>
									<option value="0098"> Israel</option>
									<option value="0099"> Italy</option>
									<option value="0100" selected=""> Jamaica</option>
									<option value="0101"> Jan Mayen</option>
									<option value="0102"> Japan</option>
									<option value="0103"> Jersey</option>
									<option value="0104"> Jordan</option>
									<option value="0105"> Kazakhstan</option>
									<option value="0106"> Kenya</option>
									<option value="0107"> Kiribati</option>
									<option value="0108"> Korea, Republic of</option>
									<option value="0221"> Korea, Democratic People's Rep.</option>
									<option value="0109"> Kuwait</option>
									<option value="0110"> Kyrgyzstan</option>
									<option value="0111"> Laos</option>
									<option value="0112"> Latvia</option>
									<option value="0113"> Lebanon</option>
									<option value="0114"> Liechtenstein</option>
									<option value="0115"> Lithuania</option>
									<option value="0116"> Luxembourg</option>
									<option value="0117"> Macau</option>
									<option value="0118"> Macedonia</option>
									<option value="0119"> Madagascar</option>
									<option value="0120"> Malawi</option>
									<option value="0121"> Malaysia</option>
									<option value="0122"> Maldives</option>
									<option value="0123"> Mali</option>
									<option value="0124"> Malta</option>
									<option value="0125"> Marshall Islands</option>
									<option value="0126"> Martinique</option>
									<option value="0127"> Mauritania</option>
									<option value="0128"> Mauritius</option>
									<option value="0129"> Mayotte</option>
									<option value="0130"> Mexico</option>
									<option value="0131"> Micronesia</option>
									<option value="0132"> Moldova</option>
									<option value="0133"> Monaco</option>
									<option value="0134"> Mongolia</option>
									<option value="0135"> Montserrat</option>
									<option value="0136"> Morocco</option>
									<option value="0137"> Mozambique</option>
									<option value="0138"> Namibia</option>
									<option value="0139"> Nauru</option>
									<option value="0140"> Nepal</option>
									<option value="0141"> Netherlands</option>
									<option value="0142"> Netherlands Antilles</option>
									<option value="0143"> New Caledonia</option>
									<option value="0144"> New Zealand</option>
									<option value="0145"> Nicaragua</option>
									<option value="0146"> Niger</option>
									<option value="0147"> Nigeria</option>
									<option value="0148"> Niue</option>
									<option value="0149"> Norway</option>
									<option value="0150"> Oman</option>
									<option value="0151"> Pakistan</option>
									<option value="0152"> Palau</option>
									<option value="0153"> Panama</option>
									<option value="0154"> Papua New Guinea</option>
									<option value="0155"> Paraguay</option>
									<option value="0156"> Peru</option>
									<option value="0157"> Philippines</option>
									<option value="0158"> Poland</option>
									<option value="0159"> Portugal</option>
									<option value="0160"> Puerto Rico</option>
									<option value="0161"> Qatar</option>
									<option value="0162"> Romania</option>
									<option value="0163"> Russian Federation</option>
									<option value="0164"> Rwanda</option>
									<option value="0165"> Saint Helena</option>
									<option value="0166"> Saint Kitts-Nevis</option>
									<option value="0167"> Saint Lucia</option>
									<option value="0168"> Saint Pierre and Miquelon</option>
									<option value="0169"> Saint Vincent and the Grenadines</option>
									<option value="0170"> San Marino</option>
									<option value="0171"> Saudi Arabia</option>
									<option value="0172"> Senegal</option>
									<option value="0173"> Seychelles</option>
									<option value="0174"> Sierra Leone</option>
									<option value="0175"> Singapore</option>
									<option value="0176"> Slovakia</option>
									<option value="0177"> Slovenia</option>
									<option value="0178"> Solomon Islands</option>
									<option value="0179"> Somalia</option>
									<option value="0180"> South Africa</option>
									<option value="0181"> Spain</option>
									<option value="0182"> Sri Lanka</option>
									<option value="0183"> Suriname</option>
									<option value="0184"> Svalbard</option>
									<option value="0185"> Swaziland</option>
									<option value="0186"> Sweden</option>
									<option value="0187"> Switzerland</option>
									<option value="0188"> Syria</option>
									<option value="0189"> Tahiti</option>
									<option value="0190"> Taiwan</option>
									<option value="0191"> Tajikistan</option>
									<option value="0192"> Tanzania</option>
									<option value="0193"> Thailand</option>
									<option value="0194"> Togo</option>
									<option value="0195"> Tonga</option>
									<option value="0196"> Trinidad and Tobago</option>
									<option value="0197"> Tunisia</option>
									<option value="0198"> Turkey</option>
									<option value="0199"> Turkmenistan</option>
									<option value="0201"> Tuvalu</option>
									<option value="0202"> Uganda</option>
									<option value="0203"> Ukraine</option>
									<option value="0204"> United Arab Emirates</option>
									<option value="0003"> United Kingdom</option>
									<option value="0001"> United States</option>
									<option value="0200"> urks and Caicos Islands</option>
									<option value="0207"> Uruguay</option>
									<option value="0208"> Uzbekistan</option>
									<option value="0209"> Vanuatu</option>
									<option value="0210"> Vatican City State</option>
									<option value="0211"> Venezuela</option>
									<option value="0212"> Vietnam</option>
									<option value="0213"> Virgin Islands (U.S.)</option>
									<option value="0214"> Wallis and Futuna</option>
									<option value="0215"> Western Sahara</option>
									<option value="0216"> Western Samoa</option>
									<option value="0217"> Yemen</option>
									<option value="0218"> Yugoslavia</option>
									<option value="0219"> Zambia</option>
									<option value="0220"> Zimbabwe</option>
								</select>
                    </td>
	  				</tr>
	  				<tr>
					    <td>
					    	<b>Graduation Year:</b>
					    </td>
					    <td>
					    	<select style="width:200px" id="graduation" name="graduation">
					    		<option>Year</option>
									<option value="0">Year</option>
						   		<?php
						   			for ($i = 2011; $i > 1980; $i--) {
						   				?>
						   					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						   				<?php		
						   			}
						   		?>
						   	</select>
						  </td>
					    <td>
					    	<b>Areas of Interests :</b>
					    </td>
					    <td>
					    	<input type="text" value="" style="width:200px;" class="inputtext" id="interest" name="interest">
					    </td>
					  </tr>
					  
					  <tr>
					    <td><b>Occupation of Interests :</b></td>
					    <td><input type="text" value="" style="width:200px;" class="inputtext" name="occupation_of_interests"></td>
					    <td><b>Religion :</b></td>
					    <td><input type="text" value="" style="width:200px;" class="inputtext" name="religion"></td>
					  </tr>
					  
					  <tr>
					    <td><b>Spoken Language(s) :</b></td>
					    <td><input type="text" value="english" style="width:200px;" class="inputtext" id="language" name="language"></td>
					    <td><b>Currently Attending School :</b></td>
					    <td><input type="text" value="GIT" style="width:200px;" class="inputtext" id="school" name="school"></td>
					  </tr>
					  
					  <tr>
						  <td><b>Legacy :</b></td>
						  <td><input type="text" value="" style="width:200px;" class="inputtext" name="legacy"></td>
						  <td><b>Finance :</b></td>
						  <td><input type="text" value="" style="width:200px;" class="inputtext" name="finance"></td>
						</tr>
						
						<tr bgcolor="#ffffff">
	            <td bgcolor="#efefe7" align="center"><font class="bbstitle">User Type </font></td>
	            <td>&nbsp;
		            <input type="radio" value="1" name="user_type"> College Counselor             &nbsp; &nbsp; 
		            <input type="radio" value="2" name="user_type"> Tutor             &nbsp; &nbsp; 
		            <input type="radio" value="3" name="user_type"> Essay Revisor   	&nbsp; &nbsp; 
		            <input type="radio" value="4" name="user_type"> Teacher             &nbsp; &nbsp; 
		            <input type="radio" value="5" name="user_type"> Student             &nbsp; &nbsp; 
							</td>
						</tr>
						
						<tr>
					    <td><b>Major :</b></td>
					    <td><input type="text" value="major" style="width:200px;" class="inputtext" name="major"></td>
					    <td><b>Minor :</b></td>
					    <td><input type="text" value="minor" style="width:200px;" class="inputtext" name="minor"></td>
						</tr>
						
						<tr>
					    <td><b>Ethnicity :</b></td>
					    <td>
						    <select name="ethnicity"> 
									<option></option>
									<option value="01">American Indian/Alaskan Native</option>
									<option value="02">Asian/Pacific Islander</option>
									<option value="03">Black/Non-Hispanic</option>
									<option value="04">Hispanic</option>
									<option value="05">White/Non-Hispanic</option>
									<option value="06">Non-Resident Alien</option>
									<option value="07">Race/ethnicity Unreported</option>
								</select>
					    </td>
					    <td><b>Password :</b></td>
					    <td>
					    	<input type="text" value="newstudent" style="width:200px;" class="inputtext" name="pass">
					    </td>
					  </tr>
					  
		  			<tr bgcolor="#ffffff">
	          	<td bgcolor="#efefe7" align="center">
	          		<font class="bbstitle">School Representative</font>
	          	</td>
						  <td>
						  	<input type="hidden" value="" name="college_code" id="school_rep">
						  	&nbsp;<input type="text" value="" readonly="" size="40" name="college_name" id="school_rep_name">
						  	<input type="button" onclick="" value="Search">
						  	<a onclick="" href="javascript:void(0)">clear</a>
						  </td>
					  </tr>
					  
					  <tr>
					  	<td align="center" colspan="4"> 
					  		<a href="<?php echo base_url()?>admin?param=manage_users"><img alt="" src="../../images/cancel.gif">Cancel</a> &nbsp;  
					  		<a href="<?php echo base_url()?>admin?param=manage_users"><input type="image"  alt="" src="../../images/ok.gif">OK</a>
					  	</td>
					  </tr>
	  			</table>
        </div>
      </div>
    </div>
	</body>
</html>
