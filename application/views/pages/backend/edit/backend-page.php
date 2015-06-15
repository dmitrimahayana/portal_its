<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" id="name" class="input size290 required" maxlength="30" placeholder="Kode Halaman Backend" value="<?php echo $fill->name;?>" disabled="disabled" />
		</td>
	</tr>
	<tr>
		<td>Tampilan nama (*)</td>
		<td><input type="text" name="display_name" id="display_name" class="input size290" maxlength="50" placeholder="Nama Tampilan Halaman Backend" value="<?php echo $fill->display_name;?>" /></td>
	</tr>
	<tr>
		<td>Induk</td>
		<td><?php echo form_dropdown('parent', $options_parent, $fill->id_parent, 'id="parent" class="input size300"'); ?></td>
	</tr>
	<tr>
		<td>Urutan (*)</td>
		<td><input type="text" name="order" id="order" class="input size290" maxlength="5" placeholder="Urutan" value="<?php echo $fill->order;?>" /></td>
	</tr>
	<tr>
		<td>Link (*)</td>
		<td><input type="text" name="link" id="link" class="input size290" maxlength="150" placeholder="Link" value="<?php echo $fill->link;?>" /></td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', $fill->online==1, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td colspan="2">
		(*) Harus diisi
		(**) Tidak boleh diisi NULL
		(***) Digunakan untuk pencarian, dipisahkan dengan koma
		</td>
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
				link: {
					required: true
				},
				display_name: {
					required: true,
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>