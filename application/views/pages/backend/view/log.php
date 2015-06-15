<div id="view-panel">
	<!-- start message- -->
	<?php
	if($this->session->flashdata('message_error')!=null):
	?>
	<div id="message-red" class="messages">
	<?php echo $this->session->flashdata('message_error'); ?>
	</div>
	<?php
	endif;
	?>
	
	<?php
	if($this->session->flashdata('message_warning')!=null):
	?>
	<div id="message-yellow" class="messages">
	<?php echo $this->session->flashdata('message_warning'); ?>
	</div>
	<?php
	endif;
	?>

	<?php
	if($this->session->flashdata('message_normal')!=null):
	?>
	<div id="message-blue" class="messages">
	<?php echo $this->session->flashdata('message_normal'); ?>
	</div>
	<?php
	endif;
	?>
	
	<?php
	if($this->session->flashdata('message_info')!=null):
	?>
	<div id="message-green" class="messages">
	<?php echo $this->session->flashdata('message_info'); ?>
	</div>
	<?php
	endif;
	?>
	
	<div class="clear"></div>
	<!--  end message- -->
	<div class="info-tooltip">
		<span>Catatan untuk pengguna : <b><u><span id="label-username"><?php echo $username; ?></span></u></b></span>
		<span style="margin-left: 10px; padding: 0 5px;"><a href="javascript:show_list_pengguna();">Lihat catatan pengguna lainnya</a></span>
		<span id="pilihan-pengguna" style="margin-left: 10px; padding: 0 5px;"></span>
	</div>	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" class="full">
	<tr>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
			<!--  start table-content  -->
			<div id="table-content">			
				<!--  start table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="view-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-menu line-left" style="width: 150px;">Waktu</th>
					<th class="table-header-options line-left">Catatan</th>
				</tr>
				<?php
					$count = 0;
					foreach($model as $row):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
					<td><?php $datestring = "%h:%i %a [%d-%m-%Y]"; echo mdate($datestring, $row->time); ?></td>
					<td><?php echo $row->log; ?></td>
				</tr>
				<?php
						$count++;
					endforeach;
				?>
				<?php
					// Mengisi sisanya dengan baris kosong
					while($count++ < PAGINATION_MULTIPLY):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox" disabled="disabled"/></td>
					<td></td>
					<td></td>
				</tr>
				<?php
					endwhile;
				?>
				</table>
				<!--  end table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
	</tr>
	</table>
	<div class="clear"></div>
	<?php 
		echo $this->pagination->create_links();
	?>
</div>
<script type="text/javascript">
<!--
	function show_list_pengguna()
	{
		var level = <?php echo $this->session->userdata('user_level') ?>;
		var name = "<?php echo $this->session->userdata('username') ?>";
		$('span#pilihan-pengguna').html('');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>ajax/ajax_list_user/"+Math.random()*10/10,
			cache:false,
			dataType: "json",
			success: function(msg) {
				var html_builder = "<select id=\"daftar-username\" style=\"font-size: 11px; height: 18px;\">"
				$.each(msg, function(index, data) {
					if(level>data.level || name==data.username)
					{
						if(name==data.username)
						{
								html_builder += (
								'<option value=\"'+data.id_user+'\" selected="selected">'+
								 data.username+
								'</option>'
							);

						}
						else
						{
							html_builder += (
								'<option value=\"'+data.id_user+'\">'+
								 data.username+
								'</option>'
							);
						}
					}
				});
				html_builder += "</select>"
				$('span#pilihan-pengguna').html(html_builder);
			}
		});
	}
-->
</script>