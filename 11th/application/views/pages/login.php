
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="index.php/dashboard" method="POST">
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
