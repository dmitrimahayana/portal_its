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
		<td>Nama (*)</td>
		<td><input type="text" name="name" id="name" class="input size290" maxlength="50" placeholder="Nama Social Network"/></td>
	</tr>
	<tr>
		<td>Link (*)</td>
		<td><input type="text" name="link" id="link" class="input size290" placeholder="Link Social Network"/></td>
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
		<td>Urutan (*)</td>
		<td><input type="text" name="order" id="order" class="input size290" maxlength="5" placeholder="Urutan" value="9999" /></td>
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
				link: {
					required: true
				},
				order: {
					range: [1, 9999]
				}
			}
		}
	);
});
-->
</script>