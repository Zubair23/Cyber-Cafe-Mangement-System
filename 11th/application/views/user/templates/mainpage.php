<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ucfirst($page_id)." | The Titania Van"; ?> </title>
	<link href = "<?php echo base_url().ADM_DIR_IMG ;?>favicon.ico" rel = "shortcut icon" type = "image/x-icon">
	<?php $this->load->view('admin/templates/header');?>
</head>
<body class="<?php echo ($page_id == 'login' || $page_id == 'forgotpassword' || $page_id == 'resetpassword' || $page_id == 'signup')?'login-background':'nav-md'?>">
<?php
	if($page_id == 'login' || $page_id == 'forgotpassword' || $page_id == 'resetpassword' || $page_id == 'signup')
	{
	}
	else
	{
?>		
	<div class="container body">
        <div class="main_container">
			<?php $this->load->view('admin/templates/header_nav');?>
			<?php $this->load->view('admin/templates/left_panel');
	}
	?>
			<?php
				if(file_exists(APPPATH.'views/admin/pages/'.$page_id.'.php'))
				{
					$this->load->view("admin/pages/".$page_id);
				}
				else
				{
					echo "display 404 page Not Found" ;
				}
			?>
			<?php ($page_id == 'login' || $page_id == 'forgotpassword' || $page_id == 'resetpassword' || $page_id == 'signup')?"":$this->load->view('admin/templates/footer');?>
		</div>
	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
		</ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>
</body>	
</html>