<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" name="name" id="name" class="input size290" maxlength="30" placeholder="Nama Highlight"/></td>
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
		<td>Isi Indonesia (*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="100" placeholder="Isi Highlight dalam Bahasa Indonesia" /></td>
	</tr>
	<tr>
		<td>Isi Inggris</td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="100" placeholder="Isi Highlight dalam Bahasa Inggris" /></td>
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
				},
				order: {
					range: [1, 9999]
				},
				name_id: {
					required: true,
					maxlength: 100
				},
				name_en: {
					maxlength: 100
				}
			}
		}
	);
});
-->
</script>