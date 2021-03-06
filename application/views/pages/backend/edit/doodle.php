<?php
$params = array();
$params['all_media'] = $all_media;
$params['media_id'] = '#media_id';
$params['display_id'] = '#display_id';
$params['lebar_id'] = '#lebar_id';
$params['tinggi_id'] = '#tinggi_id';
$params['canvas_id'] = '#canvas_id';
if(isset ($result)) {
    foreach ($result as $row){
?>
<table>
	<tr>
		<td>Nama Doodle</td>
		<td>
			<input type="text" value="<?php echo $row->name; ?>" name="name" id="name_id" class="input size290" maxlength="30" placeholder="Teks Bahasa Indonesia" <?php if($fill_id!=null):?>value="<?php echo $fill_id->text;?>"<?php endif;?> />
		</td>
	</tr>
	<tr>
		<td>Tanggal Mulai</td>
		<td>
			<input type="text" value="<?php echo $row->date_start; ?>" name="date_start" id="date_start" class="input size290" maxlength="50" placeholder="Tanggal Mulai Tampil" value="<?php echo date('d-m-Y', $fill->date_start)?>" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Akhir</td>
		<td>
			<input type="text" value="<?php echo $row->date_end; ?>" name="date_end" id="date_end" class="input size290" maxlength="50" placeholder="Tanggal Akhir Tampil" value="<?php echo date('d-m-Y', $fill->date_end)?>" />
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<span style="margin-left: 30px;">
				<a href="<?php echo base_url();?>beranda/add/media-images" style="color: #000;" target="_blank">Masukkan Media</a>
			</span>
		</td>
	</tr>
	<tr>
		<td>Media Indonesia (*) (**)</td>
		<td>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, $row->media_id, "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2">
			<?php
			$snippet = array();
			$snippet['span_id'] = $params['display_id'];
			$snippet['canvas_id'] = $params['canvas_id'];
			$snippet['lebar_id'] = $params['lebar_id'];
			$snippet['tinggi_id'] = $params['tinggi_id'];
			$this->load->view('helper/canvas_snippet', $snippet);
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td>(**) Tidak boleh diisi NULL</td>
	</tr>
</table>
<?php }} ?>
</form>
</div>
<?php
$this->load->view('helper/canvas', $params);
?>
<?php
$date_params = array();
$date_params['date_start'] 	= '#date_start';
$date_params['date_end'] 	= '#date_end';
$this->load->view('helper/date_picker', $date_params);
?>
<script>
<!--
$(document).ready(function(){
	/* Jquery validator */
	jQuery.validator.messages.min = " Pilihan tidak boleh NULL";
	$("form").validate(
		{
			invalidHandler: function(e, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
						? 'Anda belum mengisi 1 kolom. Kolom tersebut sudah disorot'
						: 'Anda belum mengisi ' + errors + ' kolom.  Kolom - kolom tersebut sudah disorot';
					$("div#message-yellow").html(message);
					$("div#message-yellow").show();
				} else {
					$("div#message-yellow").hide();
				}
			},
			onkeyup: false,
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 30
				},
				order: {
					range: [1, 9999]
				},
				name_id: {
					maxlength: 20
				},
				name_en: {
					maxlength: 20
				}
			}
		}
	);
});
-->
</script>