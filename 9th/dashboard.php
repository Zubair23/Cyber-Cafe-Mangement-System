<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
    include('inc/functions.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            <div class="row" >
			<?php
			$query="SELECT * from pc_info";
			$select=mysql_query($query);
			$i=1;
			while($data=mysql_fetch_assoc($select))
			{
                $pc_id=$data['id'];                                           
			?>
                 
                <div class="col-md-3 well" style="padding-left:45px">
                <button type="button" class="btn <?php if($data['status']==0) 
                                                echo 'btn-success';
                                            else
                                                echo 'btn-danger';?>" data-toggle="collapse" data-target="#demo<?php echo $i;?>" style="padding-top:24px">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-center">
                                    <div class="huge" style="color:gray">PC- <?php echo $i;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
               </button>

                 <div id="demo<?php echo $i;?>" class="collapse">
                    <?php
                        $row=SelectAllWhere('gp_customer','pc_id',$pc_id);
                        foreach($row as $rw)
                        {
                            extract($rw);
							// echo "HHHH";
                            // echo $cust_name; 							
							// echo $cust_mobile; 
							// echo $cust_entry;
							// echo $cust_out;
                        }
                    ?>
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
