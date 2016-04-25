<div class="">
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
			<section class="login_content">
				<form  name="form_signup" id="form_signup" action="<?php echo base_url()."index.php/admin/signup"; ?>"	method="post">
					<input type="hidden" name="action" value="submit_signup" />
					<h1>Create Account</h1>
					<div>
						<input type="text" class="form-control" name="firstname" placeholder="Firstname" required="" />
					</div>
					<div>
						<input type="text" class="form-control" name="lastname" placeholder="Lastname" required="" />
					</div>
					<div>
						<input type="email" class="form-control" name="email" placeholder="Email" required="" />
					</div>
					<div>
						<input type="password" class="form-control" name="password" placeholder="Password" required="" />
					</div>
					<div>
						<input type="password" class="form-control" name="repassword" placeholder="Re-Type Password" required="" />
					</div>
					<div>
					   <input type="submit" class="btn btn-primary submit" name="signup" value="Sign Up">
					</div>
					<div class="clearfix"></div>
					<div class="separator">

						<p class="change_link">Already a member ?
							<a href="<?php echo base_url()."admin/"; ?>"> Log in </a>
						</p>
						<div class="clearfix"></div>
						<br />
						<div>
							<h1><i class="fa fa-cab" style="font-size: 26px;"></i> The Titania Van</h1>

							<p>©2015 <a href = "<?php echo base_url(); ?>">The Titania Van.</a> All Rights Reserved.</p>
						</div>
					</div>
				</form>
				<!-- form -->
			</section>
			<!-- content -->
		</div>
	</div>
</div>