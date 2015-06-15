<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" name="name" id="name" class="input size290" maxlength="30" placeholder="Nama Pengaturan"/></td>
	</tr>
	<tr>
		<td>Nilai (*)</td>
		<td><input type="text" name="value" id="value" class="input size290" maxlength="30" placeholder="Nilai Pengaturan"/></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td>(**) Tidak boleh diisi NULL</td>
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