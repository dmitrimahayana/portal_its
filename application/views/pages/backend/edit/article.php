<?php
	$this->load->view('helper/tiny_mce');
?>
<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" id="name" class="input size290 required" maxlength="30" placeholder="Nama Artikel" value="<?php echo $fill->name;?>" disabled="disabled"/>
		</td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', $fill->online==1, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td>Metadata</td>
		<td>
			<input type="text" name="metadata" id="metadata" class="input size290" maxlength="30" placeholder="Metadata" value="<?php echo $fill->metadata;?>" />
		</td>
	</tr>
	<tr>
		<td>Judul Artikel Indonesia</td>
		<td>
			<input type="text" name="title_id" id="title_id" class="input size290" placeholder="Judul Artikel Indonesia" value="<?php echo $fill_id->title;?>" />
		</td>
	</tr>
	<tr>
		<td>Isi Artikel Indonesia (*)</td>
		<td style="padding-left: 30px; width: 500px;">
		<textarea cols="80" class="ckeditor required" id="name_id" name="name_id" rows="3">
		<?php echo $fill_id->content;?>
		</textarea>
		</td>
	</tr>
	<tr>
		<td>Judul Artikel Inggris</td>
		<td>
			<input type="text" name="title_en" id="title_en" class="input size290" placeholder="Judul Artikel Inggris" value="<?php echo $fill_en->title;?>" />
		</td>
	</tr>
	<tr>
		<td>Isi Artikel Inggris
		</td>
		<td style="padding-left: 30px; width: 500px;">
		<textarea cols="80" class="ckeditor" id="name_en" name="name_en" rows="3">
		<?php echo $fill_en->content;?>
		</textarea>
		</td>
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
<script type="text/javascript">
CKEDITOR.replace( 'name_id',
	{
		removePlugins : 'maximize,resize'
	} );
CKEDITOR.replace( 'name_en',
	{
		removePlugins : 'maximize,resize'
	} );
</script>