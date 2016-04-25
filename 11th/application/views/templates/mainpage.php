<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title><?php echo ucfirst($page_id)." | Cyber Cafe Management"; ?> </title>
	<?php $this->load->view('templates/header');?>
</head>
<body>
<?php
	if($page_id == 'login')
	{
		
	}
	else
	{
?>		
	<div class="container body">
        <div class="main_container">
			<?php $this->load->view('templates/header_nav');?>
			<?php $this->load->view('templates/left_panel');
	}
	?>
			<?php
				if(file_exists(APPPATH.'views/pages/'.$page_id.'.php'))
				{
					// die($page_id);
					$this->load->view("pages/".$page_id);
				}
				else
				{
					echo "display 404 page Not Found" ;
				}
			?>
			<?php ($page_id == 'login')?"":$this->load->view('templates/footer');?>
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