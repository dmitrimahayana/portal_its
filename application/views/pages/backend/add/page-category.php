<table>
	<tr>
		<td>Kode (*)</td>
		<td>
			<input type="text" name="code" id="code" class="input size290 required" maxlength="30" placeholder="Kode Kategori Halaman, harus unik" />
		</td>
	</tr>
	<tr>
		<td>Nama Kategori Halaman (*)</td>
		<td>
			<input type="text" name="name" id="name" class="input size290 required" maxlength="50" placeholder="Nama Kategori Halaman" />
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
<script>
<!--
$(document).ready(function(){
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
				code: {
					required: true,
					minlength: 5,
					maxlength: 30
				},
				name: {
					required: true,
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>