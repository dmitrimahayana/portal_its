<input name="terms" value="<?php echo $fill->terms ?>" type="hidden">
<table>
	<tr>
		<td>Kode Istilah (*) (**)</td>
		<td><input disabled="disabled" type="text" id="terms" class="input size290" maxlength="50" placeholder="Kode istilah" value="<?php echo $fill->terms; ?>" disabled="disabled" /></td>
	</tr>
	<tr>
		<td>Istilah Indonesia (*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="255" placeholder="Nama Istilah dalam Bahasa Indonesia" value="<?php echo $fill_id->text; ?>" /></td>
	</tr>
	<tr>
		<td>Istilah Inggris</td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="255" placeholder="Nama Istilah dalam Bahasa Inggris" value="<?php echo $fill_en->text; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
		<!--<td colspan="2"><input id="submit" type="button" value="Perbarui" /></td>-->
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td>(**) Harus bersifat unik</td>
	</tr>
	<tr class="hide" id="loading">
		<td>Loading</td>
		<td>...</td>
	</tr>
</table>
</form>
</div>
<script>
<!--
$(document).ready(function(){
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
				terms: {
					required: true,
					minlength: 3,
					maxlength: 50
				},
				name_id: {
					required: true,
					maxlength: 255
				},
				name_en: {
					maxlength: 255
				}
			}
		}
	);
});
-->
</script>