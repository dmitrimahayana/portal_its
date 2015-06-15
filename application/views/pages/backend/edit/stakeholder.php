<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<input type="hidden" id="list_menu" name="list_menu" />
<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" id="name" class="input size290 required" maxlength="30" placeholder="Nama Stakeholder" value="<?php echo $name;?>" disabled="disabled" />
		</td>
	</tr>
	<tr>
		<td>Nama Indonesia (*)</td>
		<td><input type="text" name="name_id" id="name_id" class="input size290" maxlength="50" placeholder="Nama Stakeholder dalam Bahasa Indonesia" value="<?php echo $name_id;?>" /></td>
	</tr>
	<tr>
		<td>Nama Inggris </td>
		<td><input type="text" name="name_en" id="name_en" class="input size290" maxlength="50" placeholder="Nama Stakeholder dalam Bahasa Inggris" value="<?php echo $name_en;?>" /></td>
	</tr>
	<tr>
		<td>Menu Stakeholder</td>
		<td>
			<?php echo form_dropdown('options_menu', $options_menu, '', 'id="options_menu" class="input size200"'); ?>
			<input type="button" value="Tambahkan" id="btn_add_menu" />
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<select class="input size300" size="5" id="menus_stakeholder" name="menus_stakeholder">
				<?php
					foreach($fill as $row):
				?>
				<option value="<?php echo $row->id_stakeholder_menu;?>"><?php echo $row->name;?></option>
				<?php
					endforeach;
				?>
			</select>
			<br />
			<input type="button" value="Hapus" id="btn_del_menu" class="input" />
			<input type="button" value="Hapus Semua" id="btn_clear_menu" class="input" />
		</td>
	</tr>
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
	/* Event untuk button tambahkan menu */
	var daftar = "";
	<?php
		foreach($fill as $row):
	?>
	daftar += "<?php echo $row->id_stakeholder_menu;?> ";
	<?php
		endforeach;
	?>
	$("#list_menu").val(daftar);
	$("#btn_add_menu").click(function(){
		var text = $("#options_menu option:selected").text();
		var value = $("#options_menu option:selected").val();
		if(value>0 && daftar.indexOf(value)==-1)
		{
			$("<option value="+value+">"+text+"</option>").appendTo("#menus_stakeholder");
			daftar += value + " ";
			$("#list_menu").val(daftar);
		}
	});
	$("#btn_del_menu").click(function(){
		var value = $("#menus_stakeholder option:selected").val();
		if(value>0)
		{		
			$("#menus_stakeholder option:selected").remove();
			daftar = daftar.replace(value, "");
			$("#list_menu").val(daftar);
		}
	});
	$("#btn_clear_menu").click(function(){
		$("#menus_stakeholder").html("");
		daftar = "";
		$("#list_menu").val(daftar);
	});
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