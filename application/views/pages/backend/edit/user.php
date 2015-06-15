<?php
echo form_hidden('name', $fill->username);
?>
<table>
<?php
$level = $this->session->userdata('user_level');
if($level < $fill->level)
{
	// Tidak berhak mengakses
	show_404();
}
?>
<?php
$username = $this->session->userdata('username');
if($username === $fill->username):
?>
	<tr>
		<td>Tampilan Nama Pengguna (*)</td>
		<td>
			<input type="text" name="screen_name" id="screen_name" class="input size290 required" maxlength="50" placeholder="Tampilan Nama Pengguna" value="<?php echo $fill->screen_name; ?>" />
		</td>
	</tr>
	<tr>
		<td>Kata Sandi Lama(*)</td>
		<td>
			<input type="password" name="password2" id="password2" class="input size290 required" maxlength="30" value="" />
		</td>
	</tr>
	<tr>
		<td>Kata Sandi Baru(*)</td>
		<td>
			<input type="password" name="password" id="password" class="input size290 required" maxlength="30" value="" />
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" id="email" class="input size290" maxlength="150" placeholder="Email" value="<?php echo $fill->email; ?>" /></td>
	</tr>
	<tr>
		<td>Jenis Pengguna (**)</td>
		<td><?php echo form_dropdown('group', $options_group, $fill->id_group, 'id="group" class="input size300"'); ?></td>
	</tr>
<?php
else:
echo form_hidden('password', EMPTY_STRING);
echo form_hidden('password2', EMPTY_STRING);
echo form_hidden('screen_name', $fill->screen_name);
echo form_hidden('email', $fill->email);
?>
<?php
endif;
?>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
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