<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-book"></i>
				Booking Management
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortbooking">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Customer Name</th>
						<th class = "col-lg-2">Pickup Date</th>
						<th class = "col-lg-2">Driver Email</th>
						<th class = "col-lg-2">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM booking_info WHERE 1 ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result_array() as $val)
						{							
							if($val['is_active'] != 'd')
							{
								// dbo598959020@%
					?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val['firstname']; ?></td>
									<td><?php echo $val['pickup_date']; ?></td>
									<td><?php echo $val['driver_email']; ?></td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($val['is_active'] == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "ycheck<?php echo $val['id']; ?>" onclick = 'ycheck(<?php echo $val['id'];?>)'>
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "ncheck<?php echo $val['id']; ?>" onclick = 'ncheck(<?php echo $val['id']; ?>)'>
												<?php 
												} 
												?>
												<span class="checkbox-material">
													<span class="check">
													</span>
												</span>
												Active / Block
											</label>
										</div>
									</td>
									<td>
										<button class = 'btn btn-material-purple-500' name = 'view' data-toggle='modal' 
											onclick = 'showbooking(<?php echo $val['id']; ?>)' data-target='#view'>
											<i class='fa fa-eye'></i>
										</button>
										<button class = 'btn btn-material-red-700' name = 'delete' 
											onclick = 'deletebooking(<?php echo $val['id']; ?>)'>
											<i class='fa fa-trash'></i>
										</button>
										<!-- Use of data-rowid and data-remove to call AJAX
										<span class = 'btn btn-material-red-700 btn_delete_booking' name = 'delete' data-rowid = '<?php echo $val['id']; ?>' data-remove="row_<?php echo $val['id'];?>">
											<i class='fa fa-trash'></i>
										</span> -->
									</td>
								</tr>
								<?php
								$i++;
							}
						}
					?>
				</tbody>
			</table>			
		</div>
	</div>
	<div class="modal fade" id="view" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>View Booking</h4>
			</div>
			<div class='modal-body'>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label for = "viewname">Customer Name</label>
							</td>
							<td id="viewname"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewemail">Customer Email-Id</label>
							</td>
							<td id="viewemail"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewcontact">Customer Contact Number</label>
							</td>
							<td id="viewcontact"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewsource">Source</label>
							</td>
							<td id="viewsource"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewdestination">Destination</label>
							</td>
							<td id="viewdestination"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewdate">Pickup Date</label>
							</td>
							<td id="viewdate"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewtime">Pickup Time</label>
							</td>
							<td id="viewtime"></td>
						</tr><tr>
							<td>
								<label for = "viewdriver">Driver Email</label>
							</td>
							<td id="viewdriver"></td>
						</tr><tr>
							<td>
								<label for = "viewvan">Van Type</label>
							</td>
							<td id="viewvan"></td>
						</tr><tr>
							<td>
								<label for = "viewhelp">Need Help</label>
							</td>
							<td id="viewhelp"></td>
						</tr><tr>
							<td>
								<label for = "viewduration">Van Duration</label>
							</td>
							<td id="viewduration"></td>
						</tr><tr>
							<td>
								<label for = "viewdescription">Booking Description</label>
							</td>
							<td id="viewdescription"></td>
						</tr><tr>
							<td>
								<label for = "viewstatus">Booking Status</label>
							</td>
							<td id="viewstatus"></td>
						</tr><tr>
							<td>
								<label for = "viewcallback">Customer Callback Time</label>
							</td>
							<td id="viewcallback"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewupdated">Updated On</label>
							</td>
							<td id="viewupdated"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class='modal-footer'>
			  <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
			</div>
		  </div>		  
		</div>
	</div>
</div>
<script>
"use strict";
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxbooking/activetrue/"+str,{},function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxbooking/activefalse/"+str,{},function(data, status){});
	}
	function showbooking(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxbooking/show/"+str,{},function(data,status){
			$("#viewname").html(data['result'][0]['firstname']);
			$("#viewemail").html(data['result'][0]['email_id']);
			$("#viewcontact").html(data['result'][0]['contact_no']);
			$("#viewsource").html(data['result'][0]['source']);
			$("#viewdestination").html(data['result'][0]['destination']);
			$("#viewdate").html(data['result'][0]['pickup_date']);
			$("#viewtime").html(data['result'][0]['pickup_time']);
			$("#viewdriver").html(data['result'][0]['driver_email']);
			$("#viewvan").html(data['result'][0]['van_type']);
			$("#viewhelp").html(data['result'][0]['need_help']);
			$("#viewduration").html(data['result'][0]['van_book_duration']);
			$("#viewdescription").html(data['result'][0]['booking_description']);
			$("#viewstatus").html(data['result'][0]['booking_status']);
			$("#viewcallback").html(data['result'][0]['call_back']);
			$("#viewupdated").html(data['result'][0]['updated_on']);
		},'json');
	}
	function deletebooking(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxbooking/del/"+str+"/"+message,{},function(data, status){window.location = ""; }
		);
	}
</script>