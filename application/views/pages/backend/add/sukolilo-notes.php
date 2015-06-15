<?php
$params = array();
$params['all_media'] = $all_media;
$params['media_id'] = '#photo';
$params['display_id'] = '#display_id';
$params['lebar_id'] = '#lebar_id';
$params['tinggi_id'] = '#tinggi_id';
$params['canvas_id'] = '#canvas_id';
?>
<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" name="name" id="name" class="input size290" maxlength="30" placeholder="Nama Sukolilo Notes"/></td>
	</tr>
	<tr>
		<td>Judul Indonesia(*)</td>
		<td><input type="text" name="title_id" id="title_id" class="input size290" maxlength="30" placeholder="Judul Indonesia"/></td>
	</tr>
	<tr>
		<td>Judul Inggris(*)</td>
		<td><input type="text" name="title_en" id="title_en" class="input size290" maxlength="30" placeholder="Judul Inggris"/></td>
	</tr>
	<tr>
		<td>Konten Indonesia(*)</td>
		<td><input type="text" name="content_id" id="content_id" class="input size290" maxlength="75" placeholder="Konten Indonesia"/></td>
	</tr>
	<tr>
		<td>Konten Inggris(*)</td>
		<td><input type="text" name="content_en" id="content_en" class="input size290" maxlength="75" placeholder="Konten Inggris"/></td>
	</tr>
	<tr>
		<td>Link (*)</td>
		<td><input type="text" name="link" id="link" class="input size290" placeholder="Link Sukolilo Notes"/></td>
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
		<td>Foto</td>
		<td>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, '', "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
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
		<td>Tanggal Mulai</td>
		<td>
			<input type="text" name="date_start" id="date_start" class="input size290" maxlength="50" placeholder="Tanggal Mulai Tampil" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Akhir</td>
		<td>
			<input type="text" name="date_end" id="date_end" class="input size290" maxlength="50" placeholder="Tanggal Akhir Tampil" />
		</td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', TRUE, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td></td>
	</tr>
</table>
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
					maxlength: 50
				},
				title_id: {
					required: true,
					maxlength: 30
				},
				content_id: {
					required: true,
					maxlength: 75
				}
			}
		}
	);
});
-->
</script>