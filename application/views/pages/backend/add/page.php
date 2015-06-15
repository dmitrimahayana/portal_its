<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" name="name" id="name" class="input size290 required" maxlength="30" placeholder="Nama Halaman" />
		</td>
	</tr>
	<tr>
		<td>Induk</td>
		<td><?php echo form_dropdown('parent', $options_parent, '', 'id="parent" class="input size300"'); ?></td>
	</tr>
	<tr>
		<td>Urutan (*)</td>
		<td><input type="text" name="order" id="order" class="input size290" maxlength="5" placeholder="Urutan" value="9999" /></td>
	</tr>
	<tr>
		<td>Link (*)</td>
		<td><input type="text" name="link" id="link" class="input size290" maxlength="150" placeholder="Link" value="#" /></td>
	</tr>
	<tr>
		<td>Kategori (**)</td>
		<td><?php echo form_dropdown('category', $options_category, '', 'id="category" class="input size300"'); ?></td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', TRUE, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td>Nama Indonesia (*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="50" placeholder="Nama Halaman dalam Bahasa Indonesia" /></td>
	</tr>
	<tr>
		<td>Nama Inggris</td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="50" placeholder="Nama Halaman dalam Bahasa Inggris" /></td>
	</tr>
	<tr>
		<td>Metadata (***)</td>
		<td><input type="text" name="metadata" id="metadata" class="input size290" placeholder="Metadata pencarian" /></td>
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
				category: {
					min: 1
				},
				name_id: {
					required: true,
					maxlength: 50
				},
				name_en: {
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>