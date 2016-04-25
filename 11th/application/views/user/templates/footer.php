<!-- footer content -->

<footer>
	<div class="">
		<p class="pull-right">
			<span>Developed By: 
				<a href="http://sukhadaam.com" title="sukhadaam-web-developement-codeigniter-vanbooking" alt="sukhadaam-web-developement-codeigniter-vanbooking" >
					Sukhadaam Infotech
				</a>
			</span>
		</p>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
<script src="<?php echo base_url().ADM_DIR_JS ;?>jquery.min.js"></script>
<script src="<?php echo base_url().ADM_DIR_JS ;?>pnotify.custom.js"></script>
<script src="<?php echo base_url().ADM_DIR_JS ;?>material.min.js"></script>

<script src="<?php echo base_url().ADM_DIR_JS ;?>bootstrap.min.js"></script>
<script src="<?php echo base_url().ADM_DIR_JS ;?>summernote.min.js"></script>
<script src="<?php echo base_url().ADM_DIR_JS ;?>datatables/js/jquery.dataTables.js"></script>

<script src="<?php echo base_url().ADM_DIR_JS ;?>custom.js"></script>
	
	<!--Loading Summernote 
	<script>
		$(document).ready(function() {
		  $('.summernote').summernote({
			  height: 200,                 // set editor height

			  minHeight: null,             // set minimum height of editor
			  maxHeight: null,             // set maximum height of editor

			  focus: true,                 // set focus to editable area after initializing summernote
			});
		});
	</script>
	 Summernote Loaded -->

	<script>
		$(document).ready(function() {
			 $('#sortcontent').DataTable( {
					"aoColumns": [
					  {"bSortable":false},						
					  {"bSortable":false},
					  {"bSortable":false},
					  {"bSortable":false},						
					  {"bSortable":false}
					]
				} );
		} );
	</script>
	
	<script>
		$(document).ready(function() {
			 $('#sortuser').DataTable( {
					"aoColumns": [
					  {"bSortable":false},						
					  {"bSortable":false},
					  {"bSortable":false},
					  {"bSortable":false},						
					  {"bSortable":false}
					]
				} );
		} );
	</script>
	
	<script>
		$(document).ready(function() {
			 $('#sortcontact').DataTable( {
					"aoColumns": [
					  {"bSortable":false},						
					  {"bSortable":false},
					  {"bSortable":false},
					  {"bSortable":false},						
					  {"bSortable":false}
					]
				} );
		} );
	</script>
	<!--
	<script>
		$(document).ready(function() {
			 $('#sortdocument').DataTable( {
					"aoColumns": [
					  {"bSortable":false},						
					  {"bSortable":false},
					  {"bSortable":false},
					  {"bSortable":false},						
					  {"bSortable":false},						
					  {"bSortable":false},						
					  {"bSortable":false},						
					  {"bSortable":false}
					]
				} );
		} );
	</script>
	-->
	<script>
		$(document).ready(function() {
			 $('#sortbooking').DataTable( {
					"aoColumns": [
					  {"bSortable":false},						
					  {"bSortable":false},
					  {"bSortable":false},
					  {"bSortable":false},						
					  {"bSortable":false},						
					  {"bSortable":false}
					]
				} );
		} );
	</script>
	
<!-- Summernote Error Correction Code Starts-->
	<script type="text/javascript">
	 $('.summernote').each(function () {
	  toolbar: [
			  ['group1', ['fontstyle']], //This does not appear
			  ['group2', ['fontsize']], //This does not work
			  ['style', ['bold', 'italic', 'underline', 'clear']],
			  ['color', ['color']],
			  ['para', ['ul', 'ol', 'paragraph']],
			  ['height', ['height']]
			]
	 
		var $textArea = $(this);
	  $textArea.summernote({
	   onKeyup: function (e) {
		$textArea.val($(this).code());
		$textArea.change(); //To update any action binded on the control
	   }
	  });
	 });
	 //$textArea.val().strip(); 
	 
	 String.prototype.strip = function()
	 {
		var tmpDiv = document.createElement("div");
		tmpDiv.innerHTML = this;
		return tmpDiv.textContent || tmpDiv.innerText || "";
	 }
	 $('.summernote').summernote({height: 200});
	 
	  $('.note-editable').on("blur", function(){
		   $('textarea[name="editpagedes"]').html($('.summernote').code());
	  });

	 </script>
<!-- Summernote Error Correction Code Ends-->

<!--PNotify Code Starts-->
	<script>
		function dyn_notice()
		{
			var percent = 0;
			var notice = new PNotify({
				title: "Please Wait",
				type: 'info',
				icon: 'fa fa-spinner fa-spin',
				hide: false,
				buttons: {
					closer: false,
					sticker: false
				},
				opacity: .75,
				shadow: false,
				width: "170px"
			});

			setTimeout(function() {
				notice.update({
					title: false
				});
				var interval = setInterval(function() {
					percent += 2;
					var options = {
						text: percent + "% complete."
					};
					if (percent == 80) options.title = "Almost There";
					if (percent >= 100) {
						window.clearInterval(interval);
						options.title = "Done!";
						options.type = "success";
						options.hide = true;
						options.buttons = {
							closer: true,
							sticker: true
						};
						options.icon = 'picon picon-task-complete';
						options.opacity = 1;
						options.shadow = true;
						options.width = PNotify.prototype.options.width;
					}
					notice.update(options);
				}, 60);
			}, 50);
		}
</script>
<!--PNotify Code Ends-->

<!-- Ajax Delete Code Starts (It should be after custom.js)-->
<!--
<script>
	$('.btn_delete_booking').on('click',function(){
		var message = confirm('Are you sure to delete?');
		var str = $(this).data('rowid');
		var element = '#'+$(this).data('remove');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxbooking/del/"+str+"/"+message,{},function(data, status){
			if(data['status'] == 'true'){
				//dyn_notice();
				$(element).hide();
			}
		},'json');
	});
</script>
-->
<script>
	$('.btn_delete_sms').on('click',function(){
		var message = confirm('Are you sure to delete?');
		var str = $(this).data('rowid');
		var element = '#'+$(this).data('remove');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxmanagesms/del/"+str+"/"+message,{},function(data, status){
			if(data['status'] == 'true'){
				//dyn_notice();
				$(element).hide();
			}
		},'json');
	});
</script>
<script>
	$('.btn_delete_email').on('click',function(){
		var message = confirm('Are you sure to delete?');
		var str = $(this).data('rowid');
		var element = '#'+$(this).data('remove');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxmanageemail/del/"+str+"/"+message,{},function(data, status){
			if(data['status'] == 'true'){
				//dyn_notice();
				$(element).hide();
			}
		},'json');
	});
</script>
<script>
	$('.btn_delete_faq').on('click',function(){
		var message = confirm('Are you sure to delete?');
		var str = $(this).data('rowid');
		var element = '#'+$(this).data('remove');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxmanagefaq/del/"+str+"/"+message,{},function(data, status){
			if(data['status'] == 'true'){
				//dyn_notice();
				$(element).hide();
			}
		},'json');
	});
</script>
<script>
	$('.btn_delete').on('click',function(){
		var message = confirm('Are you sure to delete?');
		var str = $(this).data('rowid');
		var element = '#'+$(this).data('remove');
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo2/ajaxcontentsetting/del/"+str+"/"+message,{},function(data, status){
			if(data['status'] == 'true'){
				//dyn_notice();
				$(element).hide();
			}
		},'json');
	});
</script>
<!-- Ajax Delete Code Ends-->

<!-- /footer content-->