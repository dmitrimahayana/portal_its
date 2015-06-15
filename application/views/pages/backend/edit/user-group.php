<input type="hidden" id="list_menu" name="list_menu" />
<input name="slug" value="<?php echo $fill->slug ?>" type="hidden">
<table>
	<tr>
		<td>Kode (*)</td>
		<td>
			<input type="text" id="slug" class="input size290 required" maxlength="30" placeholder="Kode Grup Pengguna" value="<?php echo $fill->slug; ?>" />
		</td>
		<td></td>
	</tr>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" name="group_name" id="group_name" class="input size290" maxlength="50" placeholder="Nama Grup Pengguna" value="<?php echo $fill->group_name; ?>" />
		</td>
		<td></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td><input type="text" name="description" id="description" class="input size290" maxlength="50" placeholder="Deskripsi Grup Pengguna" value="<?php echo $fill->description; ?>" />
		</td>
		<td></td>
	</tr>
	<tr>
		<td>Level (**) </td>
		<td><input type="text" name="level" id="level" class="input size290" maxlength="50" placeholder="Tingkat Grup Pengguna" value="<?php echo $fill->level; ?>" />
		</td>
		<td></td>
	</tr>
	<tr>
		<td>Hak Akses</td>
		<td>
			<?php echo form_dropdown('options_menu', $options_menu, '', 'id="options_menu" class="input size300" multiple="multiple" size="10"'); ?>
			<br />
			<input type="button" value="Tambahkan" id="btn_add_menu" class="input"/>
			<input type="button" value="Tambahkan Semua" id="btn_add_all_menu" class="input" />
		</td>
		<td>
			<!-- -->
			<select class="input size300" size="10" id="menus" name="menus">
				<?php
					foreach($fill_access as $row):
				?>
				<option value="<?php echo $row->id_backend_page;?>"><?php echo $row->name;?></option>
				<?php
					endforeach;
				?>
			</select>
			<br />
			<!-- -->
			<input type="button" value="Hapus" id="btn_del_menu" class="input" />
			<input type="button" value="Hapus Semua" id="btn_clear_menu" class="input" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td>(**) Berisi bilangan bulat menunjukkan tingkat dalam grup user</td>
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
	if($fill_access != null):
	foreach($fill_access as $row):
	?>
	daftar += "<?php echo $row->id_backend_page; ?> ";
	<?php
	endforeach;
	endif;
	?>
	function getSelectedValues(optid) {
		var selected = new Array();
		var i = 0;
		$(optid +' > :selected').each(function() {
            selected[i++] = $(this).val();
        }); 
		return selected;
	}
	function getSelectedText(optid) {
		var selected = new Array();
		var i = 0;
		$(optid +' > :selected').each(function() {
            selected[i++] = $(this).text();
        }); 
		return selected;
	}
	function getAllValues(optid) {
		var selected = new Array();
		var i = 0;
		$(optid + ' > option').each(function() {
            selected[i++] = $(this).val();
        }); 
		return selected;
	}
	function getAllText(optid) {
		var selected = new Array();
		var i = 0;
		$(optid + ' > option').each(function() {
            selected[i++] = $(this).text();
        }); 
		return selected;
	}
	$("#btn_add_menu").click(function(){
		var values = getSelectedValues("#options_menu");
		var texts = getSelectedText("#options_menu");
		var split = daftar.split(" ");
		var i = 0;
		for(i=0; i<values.length; i++)
		{
			var ok = true;
			var j;
			for(j=0; j<split.length; j++)
			{
				if(!ok)
				{
					break;
				}
				if(split[j] == values[i])
				{
					ok = false;
				}
			}
			if(values[i]>0 && ok)
			{
				$("<option value="+values[i]+">"+texts[i]+"</option>").appendTo("#menus");
				daftar += values[i] + " ";
				$("#list_menu").val(daftar);
			}
		}
	});
	$("#btn_add_all_menu").click(function(){
		var values = getAllValues("#options_menu");
		var texts = getAllText("#options_menu");
		var split = daftar.split(" ");
		var i = 0;
		for(i=0; i<values.length; i++)
		{
			var ok = true;
			var j;
			for(j=0; j<split.length; j++)
			{
				if(!ok)
				{
					break;
				}
				if(split[j] == values[i])
				{
					ok = false;
				}
			}
			if(values[i]>0 && ok)
			{
				$("<option value="+values[i]+">"+texts[i]+"</option>").appendTo("#menus");
				daftar += values[i] + " ";
				$("#list_menu").val(daftar);
			}
		}
	});
	$("#btn_del_menu").click(function(){
		var value = $("#menus option:selected").val();
		if(value>0)
		{		
			$("#menus option:selected").remove();
			daftar = daftar.replace(value, "");
			$("#list_menu").val(daftar);
		}
	});
	$("#btn_clear_menu").click(function(){
		$("#menus").html("");
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
				slug: {
					required: true,
					minlength: 3,
					maxlength: 25
				},
				group_name: {
					required: true,
					maxlength: 100
				},
				level: {
					range: [-99999, 99999]
				}
			}
		}
	);
});
-->
</script>