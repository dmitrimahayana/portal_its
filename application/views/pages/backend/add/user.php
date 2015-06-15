<table>
	<tr>
		<td>Nama Pengguna (*)</td>
		<td>
			<input type="text" name="name" id="name" class="input size290 required" maxlength="30" placeholder="Nama Pengguna" />
		</td>
	</tr>
	<tr>
		<td>Tampilan Nama Pengguna (*)</td>
		<td>
			<input type="text" name="screen_name" id="screen_name" class="input size290 required" maxlength="50" placeholder="Tampilan Nama Pengguna" />
		</td>
	</tr>
	<tr>
		<td>Kata Sandi (*)</td>
		<td>
			<input type="password" name="password" id="password" class="input size290 required" maxlength="30"/>
		</td>
	</tr>
	<tr>
		<td>Ulangi Kata Sandi (*)</td>
		<td>
			<input type="password" name="password2" id="password2" class="input size290 required" maxlength="30"/>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" id="email" class="input size290" maxlength="150" placeholder="Email" value="" /></td>
	</tr>
	<tr>
		<td>Jenis Pengguna (**)</td>
		<td><?php echo form_dropdown('group', $options_group, '', 'id="group" class="input size300"'); ?></td>
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
				name: {
					required: true,
					minlength: 5,
					maxlength: 30
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
				  equalTo: "#password"
				},
				email: {
					email: true
				},
				group: {
					min: 1
				},
				screen_name: {
					required: true,
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>