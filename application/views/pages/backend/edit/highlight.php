<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" id="name" class="input size290" maxlength="30" placeholder="Nama Highlight" value="<?php echo $fill->name;?>" disabled="disabled"/></td>
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
		<td>Isi Indonesia (*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="100" placeholder="Isi Highlight dalam Bahasa Indonesia"  value="<?php echo $fill_id->text;?>" /></td>
	</tr>
	<tr>
		<td>Isi Inggris</td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="100" placeholder="Isi Highlight dalam Bahasa Inggris" value="<?php echo $fill_en->text;?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
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