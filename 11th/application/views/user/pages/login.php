<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	
    <title>Cyber Cafe Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="themes/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="themes/css/cyber.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="themes/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
								<div class="form-group">
                                    <input class="btn btn-primary" name="login" type="submit" value="Login">
                                </div>
                            </fieldset>
                        </form>
						<?php
							if(isset($_POST['login']))
							{
								$username=$_POST['username'];
								$password=$_POST['password'];
								$query="select * from admin_info where username='$username' and password='$password'";
								$select=mysql_query($query);
								$row=mysql_num_rows($select);
								if($row>0)
								{
									$_SESSION['username']=$username;
									header('Location: dashboard.php');
								}
								else{
									echo "Wrong username or password";
								}
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="themes/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="themes/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="themes/js/sb-admin-2.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="themes/metisMenu/dist/metisMenu.min.js"></script>

</body>

</html>
