<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" name="name" id="name" class="input size290 required" maxlength="50" placeholder="Nama Video Eureka" />
		</td>
	</tr>
	<tr>
		<td>Judul (*)</td>
		<td>
			<input type="text" name="title" id="title" class="input size290 required" maxlength="150" placeholder="Judul Video Eureka" />
		</td>
	</tr>
	<tr>
		<td>ID Youtube (*)(**)</td>
		<td>
			<input type="text" name="youtube_id" id="youtube_id" class="input size290 required" maxlength="50" placeholder="ID Youtube" />
		</td>
	</tr>
	<!--
	<tr>
		<td>Link (*)</td>
		<td>
			<input type="text" name="name" id="name" class="input size290 required" maxlength="30" placeholder="Link Eureka" />
		</td>
	</tr>
	-->
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', TRUE, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td colspan="2">
		(*) Harus diisi
		<br/>
		(**) Contoh lokasi ID Youtube adalah sebagai berikut: 
		<br />
		http://www.youtube.com/embed/<b class="color-red">ID_YOUTUBE</b>
		<br />
		http://www.youtube.com/watch?v=<b class="color-red">ID_YOUTUBE</b>&feature=player_profilepage
		</td>
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
				name: {
					required: true,
					minlength: 3,
					maxlength: 50
				},
				title: {
					required: true,
					maxlength: 150
				},
				youtube_id: {
					required: true,
					maxlength: 50
				}
			}
		}
	);
});
-->
</script>