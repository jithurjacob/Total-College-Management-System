<body class="page-body login-page login-form-fall" data-url="<?php echo base_url(); ?>">
	<div class="login-container">
		<div class="login-header login-caret">
			<div class="login-content" style="height:120px;width:1000px;max-width:100%;max-height:100%">
				<a href="" class="img-responsive">
					<img class="img-responsive center-block inline logo" style="max-width:100%;max-height:100%" src="<?php echo base_url();?>assets/images/logo@2x.png"  alt="" />
				</a>
				
			</div>
			<!-- progress bar indicator -->

			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>Registering in...</span>
			</div>
		</div>
		

		<div class="login-progressbar">
			<div>
				
			</div>
		</div>
		<div class="login-form">
			<div class="login-content">
				 <form method="post" role="form" id="form_register">
                    <div class="form-register-success"> <i class="entypo-check"></i>
                        <h3>You have been successfully registered.</h3>
                        <p>We have emailed you the confirmation link for your account.</p>
                    </div>
                    <div class="form-steps">
                        <div class="step current" id="step-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-user"></i> </div>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-mail"></i> </div>
                                    <input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-user"></i> </div>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" data-mask="[a-zA-Z0-9\.]+" data-is-regex="true" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-phone"></i> </div>
                                    <input type="text" class="form-control" name="mobno" id="mobno" placeholder="Mobile Number" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-calendar"></i> </div>
                                    <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth (DD/MM/YYYY)" data-mask="dd/mm/yyyy" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login"> <i class="entypo-right-open-mini"></i> Next Step
                                </button>
                            </div>
                            <div class="form-group">
                                Step 1 of 3
                            </div>
                        </div>
                        <div class="step" id="step-2">
                        	<div class="form-group">
                        	<div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-flow-branch"></i> </div>
									<select name="branch" id="branch" title="Please select a branch" data-first-option="false" class="selectboxit">
                                   	 <option value="null">Select branch</option>
                                   	   <?php  foreach ( $branches as $branch): ?>
                                        <option value="<?php  echo $branch['id'];?>"><?php  echo $branch['name'];?></option>
                                        <?php endforeach ?>
                                   	   
                                   	   </select>
                              
                              </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-paper-plane"></i> </div>
                                    <input type="text" class="form-control" name="admnno" id="admnno" placeholder="Admission Number (Optional)" data-mask="decimal" autocomplete="off" /> </div>
                            </div>
                             <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-leaf"></i> </div>
                                    <input type="text" class="form-control" name="regno" id="regno" placeholder="Register Number (Optional)" data-mask="decimal" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-calendar"></i> </div>
                                    <input type="text" class="form-control" name="yearofpass" id="yearofpass" placeholder="Year of Passing"  autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-right"></i> </div>
									<select name="lateral" id="lateral" data-first-option="false" class="selectboxit" required>
                                   	 <option value="null">Type of Admission</option>
                                   	  <option value="0">Regular Admission</option> 
                                   	  <option value="1">Lateral Admission</option> 
                                   	  
                                   	   
                                   	   </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <button type="button" data-step="step-3" class="btn btn-primary btn-block btn-login" onclick="<!-- if(document.getElementById('branch').selectedIndex==0)alert('Select branch value');else if(document.getElementById('lateral').selectedIndex==0)alert('Select admission type'); -->"> <i class="entypo-right-open-mini"></i> Next Step
                                </button>
                            </div>
                        	<div class="form-group">
                                Step 2 of 3
                            </div>
                        </div>
                        <div class="step" id="step-3">
                            
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-key"></i> </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="entypo-key"></i> </div>
                                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Retype Password" autocomplete="off" /> </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btn-login"> <i class="entypo-right-open-mini"></i> Complete Registration
                                </button>
                            </div>
                            <div class="form-group">
                                Step 3 of 3
                            </div>
                        </div>
                    </div>
                </form>
                <div class="login-bottom-links">
                    <a href="<?php echo base_url(); ?>" class="link"> <i class="entypo-lock"></i> Return to Login Page
                    </a>
                    <br />  </div>
					
				</div>
			</div>
			<footer class="main footer index">
				<div class="footer_wrap">
					<div class="pull-left">
						© 2015 <a href="http://cep.ac.in" target="_blank">College of Engineering Poonjar</a>.All rights reserved.

					</div>
					<div class="pull-right">
						Developed by <a href="https://www.facebook.com/jithurjacob007" target="_blank">Jithu R Jacob</a>
					</div>
				</div>
			</footer>