<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" id="name" class="input size290" maxlength="30" placeholder="Nama Pengaturan" value="<?php echo $fill->name; ?>" disabled="disabled" /></td>
	</tr>
	<tr>
		<td>Nilai (*)</td>
		<td><input type="text" name="value" id="value" class="input size290" maxlength="30" placeholder="Nilai Pengaturan" value="<?php echo $fill->value; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td></td>
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
				name: {
					required: true,
					minlength: 3,
					maxlength: 30
				}
				value: {
					required: true,
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>