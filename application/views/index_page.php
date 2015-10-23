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
				<span>logging in...</span>
			</div>
		</div>
		

		<div class="login-progressbar">
			<div>
				
			</div>
		</div>
		<div class="login-form">
			<div class="login-content">
				<div class="form-login-error panel panel-dark">
					<div class="panel-heading">
						<div class="panel-title">Invalid login</div>
						<div class="panel-options">
							<a style="padding:0px" onclick="javascript:jQuery(function ($) {$('.form-login-error').hide('slow')})" ><i class="entypo-cancel" style="
    font-size: 20px;
"></i></a>
						</div>
					</div>
					<p id="form-login-error-msg" style="font-size:14px"> as login and password.</p>
				</div>

				<form method="post" role="form" id="form_login">

					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"> <i class="entypo-user"></i> </div>
							<input type="hidden"  id="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" /> </div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"> <i class="entypo-key"></i> </div>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" /> </div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block btn-login"> <i class="entypo-login"></i> Login In
								</button>
							</div>
							<div class="form-group">
								<em>- or -</em>
							</div>
							
							<div class="form-group">
							<div class=" btn-group btn-group-lg btn-block text-left" >
							<button type="button"  class="btn btn-lg btn-block  text-left btn btn-primary btn-block btn-login" data-toggle="dropdown"><i class="entypo-heart"></i>Sign Up</button>
							
							<ul class="dropdown-menu" style="width:100%" role="menu">
									 <li><a href="<?php echo base_url(); ?>index.php/register/alumni/" style="padding:15px">Alumni</a> </li>
									<li><a href="<?php echo base_url(); ?>index.php/register/faculty/" style="padding:15px">Faculty</a> </li> 
									<li><a href="<?php echo base_url(); ?>index.php/register/students/" style="padding:15px">Student</a> </li>
									
									
							</ul>
							</div>
							</div>
						</form>
						<div class="login-bottom-links">
							<a href="../forgot-password/forgot-password.html" class="link">Forgot your password?</a>
							<!-- <br /> <a href="login.html#">ToS</a> - <a href="login.html#">Privacy Policy</a> </div> -->
						</div>
					</div>
				</div>
			</div>
			<!-- <div style="padding-top:50px;margin-top:10px;"></div> -->
			<footer class="main index indexer">
				
					<div class="pull-left">
						© 2015 <a href="http://cep.ac.in" target="_blank">College of Engineering Poonjar</a>.All rights reserved.

					</div>
					<div class="pull-right">
						Developed by <a href="https://www.facebook.com/jithurjacob007" target="_blank">Jithu R Jacob</a>
					</div>
				
			</footer>