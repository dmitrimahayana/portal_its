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
		<td>Title</td>
		<td>
			<input type="text" name="title" id="title" class="input size290 required" maxlength="60" value="<?php echo $row->title; ?>"/>
		</td>
	</tr>
        <tr>
		<td>Link</td>
		<td>
			<input type="text" name="link" id="link" class="input size290 required" maxlength="255" value="<?php echo $row->link; ?>" />
		</td>
	</tr>
		<td>Cover Image  (*) (**)</td>
		<td>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, $row->cover_image, "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
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
		<td colspan="2"><?php echo form_submit('submit', 'Simpan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus bahasa indonesia</td>
		<td>(**) Harus bahasa inggris</td>
	</tr>
        <?php }} ?>
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
	jQuery.validator.messages.min = " Pilihan tidak boleh NULL";
	jQuery.validator.messages.email = " Masukkan email sesuai dengan standar (contoh: nama@perusahaan.co.id)";
	jQuery.validator.messages.equalTo = " Masukkan password harus sama";
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
			<?php
			if($username === $fill->username):
			?>
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5
				},
				email: {
					email: true
				},
				screen_name: {
					required: true,
					maxlength: 50
				},
			<?php
			endif;
			?>
				group: {
					min: 1
				}
			}
		}
	);
});
-->
</script>