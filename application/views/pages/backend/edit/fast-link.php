<?php
$params = array();
$params['all_media'] = $all_media;
$params['media_id'] = '#icon';
$params['display_id'] = '#display_id';
$params['lebar_id'] = '#lebar_id';
$params['tinggi_id'] = '#tinggi_id';
$params['canvas_id'] = '#canvas_id';
?>
<table>
	<tr>
		<td>Nama Indonesia(*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="30" placeholder="Nama Menu Cepat Indonesia" value="<?php echo $fill_id->text;?>"/></td>
	</tr>
	<tr>
		<td>Nama Inggris</td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="30" placeholder="Nama Menu Cepat Inggris" value="<?php echo $fill_en->text;?>"/></td>
	</tr>
	<tr>
		<td>URL (*)</td>
		<td><input type="text" name="url" id="url" class="input size290" placeholder="URL Menu Cepat" value="<?php echo $fill->url;?>" /></td>
	</tr>
	<tr>
		<td>Urutan (*)</td>
		<td><input type="text" name="order" id="order" class="input size290" maxlength="5" placeholder="Urutan" value="<?php echo $fill->order;?>" /></td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', $fill->online==1, 'id="online" class="input"'); ?></td>
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
		<td>Icon</td>
		<td>
			<?php if($fill!=null):?>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, $fill->icon, "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
			<?php else:?>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, '', "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
			<?php endif;?>
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
		<td></td>
	</tr>
</table>
</form>
</div>
<?php
$this->load->view('helper/canvas', $params);
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
				order: { range: [1, 9999] },
				name_id: { required: true, maxlength: 30 },
				name_en: { maxlength: 30 },
				url: { required: true}
			}
		}
	);
});
-->
</script>