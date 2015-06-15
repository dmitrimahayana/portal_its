<?php
$params = array();
$params['all_media'] = $all_media;
$params['media_id'] = '#media_id';
$params['display_id'] = '#display_id';
$params['lebar_id'] = '#lebar_id';
$params['tinggi_id'] = '#tinggi_id';
$params['canvas_id'] = '#canvas_id';
$params['media_en'] = '#media_en';
$params['display_en'] = '#display_en';
$params['lebar_en'] = '#lebar_en';
$params['tinggi_en'] = '#tinggi_en';
$params['canvas_en'] = '#canvas_en';
$params['checkbox_same'] = '#same';
$params['row_media_en'] = '#row_media_en';
?>
<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td>
			<input type="text" id="name" class="input size290 required" maxlength="30" placeholder="Nama Interaktif" value="<?php echo $fill->name;?>" disabled="disabled" />
		</td>
	</tr>
        <tr>
		<td>Deskripsi</td>
		<td>
			<textarea name="deskripsi" id="deskripsi" class="input size290 required" placeholder="Deskripsi Singkat" value="<?php echo $fill->deskripsi;?>" ><?php echo $fill->deskripsi;?></textarea>
		</td>
	</tr>
	</tr>
        <tr>
		<td>Deskripsi English</td>
		<td>
			<textarea name="deskripsi_en" id="deskripsi_en" class="input size290 required" placeholder="Deskripsi Singkat Bahasa Inggris" value="<?php echo $fill->deskripsi_en;?>" ><?php echo $fill->deskripsi_en;?></textarea>
		</td>
	</tr>
	<tr>
		<td>URL</td>
		<td>
			<input type="text" name="url" id="url" class="input size290" placeholder="URL Menu Interaktif" value="<?php echo $fill->url;?>" />
		</td>
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
		<td>Tampilan Indonesia</td>
		<td>
			<input type="text" name="name_id" id="name_id" class="input size290"  placeholder="Teks Bahasa Indonesia" <?php if($fill_id!=null):?>value="<?php echo $fill_id->text;?>"<?php endif;?> />
		</td>
	</tr>
	<tr>
		<td>Tampilan Inggris</td>
		<td>
			<input type="text" name="name_en" id="name_en" class="input size290"  placeholder="Teks Bahasa Inggris" <?php if($fill_en!=null):?>value="<?php echo $fill_en->text;?>"<?php endif;?> />
		</td>
	</tr>
	<tr>
		<td>Tanggal Mulai</td>
		<td>
			<input type="text" name="date_start" id="date_start" class="input size290" maxlength="50" placeholder="Tanggal Mulai Tampil" value="<?php echo date('d-m-Y', $fill->date_start)?>" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Akhir</td>
		<td>
			<input type="text" name="date_end" id="date_end" class="input size290" maxlength="50" placeholder="Tanggal Akhir Tampil" value="<?php echo date('d-m-Y', $fill->date_end)?>" />
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<span style="margin-left: 30px;">
				<a href="<?php echo base_url();?>beranda/add/media-images" style="color: #000;" target="_blank">Masukkan Media</a>
			</span>
		</td>
	</tr>
	<tr>
		<td>Media Indonesia (*) (**)</td>
		<td>
			<?php if($fill!=null):?>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, $fill_id->media, "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
			<?php else:?>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, '', "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
			<?php endif;?>
			<input type="checkbox" name="same" id="same"/> Media Inggris sama
		</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2">
			<?php
			$snippet = array();
			$snippet['span_id'] = $params['display_id'];
			$snippet['canvas_id'] = $params['canvas_id'];
			$snippet['lebar_id'] = $params['lebar_id'];
			$snippet['tinggi_id'] = $params['tinggi_id'];
			$this->load->view('helper/canvas_snippet', $snippet);
			?>
		</td>
	</tr>
	<tr id="row_media_en">
		<td>Media Inggris</td>
		<td>
			<?php if($fill_en!=null):?>
			<?php echo form_dropdown('media_en', $options_media, $fill_en->media, 'id="media_en" class="input size300"'); ?>
			<?php else:?>
			<?php echo form_dropdown('media_en', $options_media, '', 'id="media_en" class="input size300"'); ?>
			<?php endif;?>
		</td>
	</tr>
	<tr id="row_media_en">
		<td></td>
		<td colspan="2">
			<?php
			$snippet = array();
			$snippet['span_id'] = $params['display_en'];
			$snippet['canvas_id'] = $params['canvas_en'];
			$snippet['lebar_id'] = $params['lebar_en'];
			$snippet['tinggi_id'] = $params['tinggi_en'];
			$this->load->view('helper/canvas_snippet', $snippet);
			?>
		</td>
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
<?php
$this->load->view('helper/canvas', $params);
?>
<?php
$date_params = array();
$date_params['date_start'] 	= '#date_start';
$date_params['date_end'] 	= '#date_end';
$this->load->view('helper/date_picker', $date_params);
?>
<script>
<!--
$(document).ready(function(){
	/* Jquery validator */
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
				}
			}
		}
	);
});
-->
</script>