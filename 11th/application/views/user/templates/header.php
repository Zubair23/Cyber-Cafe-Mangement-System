<!-- Bootstrap core CSS -->
<link href="<?php echo base_url().ADM_DIR_CSS ;?>bootstrap.min.css" rel="stylesheet">	
<?php
	if($page_id == "login" || $page_id == "forgotpassword" || $page_id == "resetpassword" || $page_id == "signup")
	{}
	else
	{
?>
		<link href="<?php echo base_url().ADM_DIR_CSS ;?>material.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().ADM_DIR_CSS ;?>material-fullpalette.css" rel="stylesheet">	
<?php
	}
?>
<link href="<?php echo base_url().ADM_DIR_FONT ;?>css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url().ADM_DIR_CSS ;?>animate.min.css" rel="stylesheet">

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url().ADM_DIR_CSS ;?>custom.css" rel="stylesheet">	
<link href="<?php echo base_url().ADM_DIR_CSS ;?>summernote.css" rel="stylesheet">
<link href="<?php echo base_url().ADM_DIR_CSS ;?>pnotify.custom.css" rel="stylesheet">
<link href="<?php echo base_url().ADM_DIR_CSS ;?>maps/jquery-jvectormap-2.0.1.css"  rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().ADM_DIR_CSS ;?>icheck/flat/green.css" rel="stylesheet" />
<link href="<?php echo base_url().ADM_DIR_CSS ;?>floatexamples.css" rel="stylesheet" type="text/css" />