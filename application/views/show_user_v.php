<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>List User</title>

		<!-- Bootstrap CSS -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" >
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<style type="text/css">
		    .bs-example{
		    	margin: 20px;
		    }
		</style>
	</head>
	<body>
		<div class="container-fluid " style="margin-top:40px;">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">List User</h3>
						</div>
						<div class="panel-body">
							<div id="div_show_user"></div>
							<?php echo form_submit('login', 'Add User', 'class="btn btn-primary"') ?>					
						</div>
						<div class="panel-body">
							<div id="div_show_user_detail"></div>						
						</div>		
						<div class="panel-body">
							<div id="div_edit_user_detail"></div>						
						</div>
					</div>				
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Group</h3>
						</div>
						<div class="panel-body">
							<div id="div_group"></div>
							<?php echo form_submit('login', 'Add User', 'class="btn btn-primary"') ?>					
						</div>
						<div class="panel-body">
							<div id="div_show_group_detail"></div>						
						</div>		
						<div class="panel-body">
							<div id="div_edit_group_detail"></div>						
						</div>
					</div>					
				</div>
			</div>
		</div>	
	</body>
</html>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		show_user();
		show_group();
	  	$('#join_date').datepicker({dateFormat: 'dd/mm/yy',changeMonth: true,changeYear: true});
		$('#entry_date').datepicker({dateFormat: 'dd/mm/yy',changeMonth: true,changeYear: true});
	});

/* 
	USER
*/
	function show_user(){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/show_user',
			cache: false,
			success: function(msg){
				$('#div_show_user').html(msg);	
			}
		});
	}

	function show_user_detail(ic){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/show_user_detail',
			data: 'ic='+ic,
			cache: false,
			success: function(msg){
				$('#div_show_user_detail').html(msg);	
				$('#div_edit_user_detail').html('');
			}
		});
	}

	function edit_user_detail(ic){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/edit_user_detail',
			data: 'ic='+ic,
			cache: false,
			success: function(msg){
				$('#div_edit_user_detail').html(msg);	
			}
		});
	}

	function simpan_user(form){
		var dataform = $('#div_edit_user_detail').serializeArray();

		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/edit_user_detail',
			data: dataform,
			cache: false,
			success: function(msg){
				show_user();
				$('#div_show_user_detail').html('');
				$('#div_edit_user_detail').html('');
			}
		});
	}	

/* 
	GROUP
*/
	function show_group(){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/show_group',
			cache: false,
			success: function(msg){
				$('#div_group').html(msg);	
			}
		});
	}

	function show_group_detail(ic){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/show_group_detail',
			data: 'ic='+ic,
			cache: false,
			success: function(msg){
				$('#div_show_group_detail').html(msg);	
				$('#div_edit_group_detail').html('');
			}
		});
	}

	function edit_group_detail(ic){
		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/edit_group_detail',
			data: 'ic='+ic,
			cache: false,
			success: function(msg){
				$('#div_edit_group_detail').html(msg);	
			}
		});
	}

	function simpan_group(form){
		var dataform = $('#div_edit_group_detail').serializeArray();

		$.ajax({
			type: 'post',
			url: '<?php echo site_url();?>/show_user_c/edit_group_detail',
			data: dataform,
			cache: false,
			success: function(msg){
				show_user();
				$('#div_show_group_detail').html('');
				$('#div_edit_group_detail').html('');
			}
		});
	}		
</script>