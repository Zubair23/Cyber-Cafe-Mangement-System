<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            <div class="row">
			<?php
			$query="SELECT * from pc_info";
			$select=mysql_query($query);
			$i=1;
			while($data=mysql_fetch_assoc($select))
			{
			?>
                <div class="col-md-3">
                    <div class="panel <?php if($data['status']==0) 
												echo 'panel-success';
											else
												echo 'panel-danger';?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-center">
                                    <div class="huge">PC- <?php echo $i;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php
			$i++;
			}
			?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	include('inc/footer.php');
?>

                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
