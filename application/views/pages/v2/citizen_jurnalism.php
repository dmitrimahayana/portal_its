	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		<style type="text/css">
			#entry_form { background-color: white; padding: 20px; }
			#entry_form table td { padding: 5px; }
			#entry_form table td input[type=text], form table td textarea { width: 100%; }
			#entry_form .entry_guide {
				margin: 0px;
				color: #007dc5;
				font-size: 12px;
				margin-top: 5px;
			}
			#validation_error { margin-bottom: 20px; }
			#validation_error p { margin: 0px; margin-bottom: 5px; color: red; font-size: 12px;  }
			.success_message { margin-top:30px; color: green; }
			.error_message { color: red; }
		</style>
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php echo $lang=='id' ? 'Jurnalisme Warga' : 'Citizen Jurnalism'; ?></h1>
			<?php if(!isset($frm_msg)){ ?>
			<form method="post" id="entry_form">
				<div id="validation_error">
				<?php echo validation_errors(); ?>
				</div>
				<table width="100%">
					<tbody>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Judul' : 'Title'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="judul" maxlength="100" value="<?php echo set_value('judul'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan judul artikel' : 'Enter article title'; ?></p>
							</td>
						</tr>
						<tr>
							<td><?php echo $lang=='id' ? 'Foto' : 'Photo'; ?></td>
							<td>:</td>
							<td>
								<input type="text" name="foto" maxlength="255" value="<?php echo set_value('foto'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan url foto' : 'Enter photo url'; ?></p>
							</td>
						</tr>
						<tr>
							<td><?php echo $lang=='id' ? 'Isi' : 'Content'; ?></td>
							<td>:</td>
							<td>
								<textarea name="isi" maxlength="2048" rows="5" cols="60"><?php echo set_value('isi'); ?></textarea>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan isi artikel (min 30 karakter)' : 'Enter article content (at least 30 character)'; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<script type="text/javascript"
									 src="https://www.google.com/recaptcha/api/challenge?k=6LfRgOYSAAAAAI_lr7bNl1RViLSgOri-dCaCpR1q">
								</script>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<input type="submit" class="btn btn-default" value="<?php echo $lang=='id'?'Simpan':'Save'; ?>"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			<?php }else{ ?>
			<h5 class="success_message <?php if($error_send) echo "error_message"; ?>"><?php echo $frm_msg; ?></h5>
			<?php } ?>
		</div>
	</div><!-- row for nav+banner area -->
</div>
