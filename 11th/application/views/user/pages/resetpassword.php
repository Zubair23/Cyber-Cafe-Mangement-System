<div class="">
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
			<section class="login_content">
				<form name="form_resetpassword" id="form_resetpassword" action="" method="post">
					<input type="hidden" name="action" value="submit_resetpassword" />
					<h1>Reset Password</h1>
					<input type="hidden" name="email" value = "<?php echo $this->email;?>" />
					 <div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
					</div>
					<div>
						<input type="password" class="form-control" name="repass" id="repass" placeholder="Re-Type Password" required="" />
					</div>
					<div>
						<input type="submit" class="btn btn-primary submit" name="submit" value="Submit">
					</div>                       
					<div class="separator">
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