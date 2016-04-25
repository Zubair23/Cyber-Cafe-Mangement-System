<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
		<div id="login" class="animate form">
			<section class="login_content">
				<form name="form_forgotpassword" id="form_forgotpassword" action="<?php echo base_url().'admin/forgotpassword'; ?>" method="post">
					<input type="hidden" name="action" value="submit_forgotpassword" />
					<h1>Forgot Password</h1>
					<div>
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" required="" />
					</div>                      
					<div>
						<input type="submit" class="btn btn-primary submit" name="submit" value="Submit">
					</div>                       
					<div class="separator"> 
						<br />
						<div>
							<h1><i class="fa fa-cab" style="font-size: 26px;"></i> The Titania Van</h1>

							<p>©2015 <a href = "<?php echo base_url(); ?>">The Titania Van.</a> All Rights Reserved. </p>
						</div>
					</div>
				</form>
				<!-- form -->
			</section>
			<!-- content -->
		</div>          
        </div>
    </div>