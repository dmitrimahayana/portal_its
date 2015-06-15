<?php
$params = array();
$params['all_media'] = $all_media;
$params['media_id'] = '#media_id';
$params['display_id'] = '#display_id';
$params['lebar_id'] = '#lebar_id';
$params['tinggi_id'] = '#tinggi_id';
$params['canvas_id'] = '#canvas_id';
if(isset ($result)) {
    foreach ($result as $row){
        if(isset ($result2)) {
            foreach ($result2 as $row2){
    ?>
<table>
        <tr>
		<td>Nama Jurusan (*)</td>
		<td>
			<input type="text" name="namaJurID" id="namaJurID" class="input size290 required" maxlength="150" value="<?php echo $row->namaJurusan; ?>"/>
		</td>
	</tr>
        <tr>
		<td>Department Name (**)</td>
		<td>
			<input type="text" name="namaJurEN" id="namaJurEN" class="input size290 required" maxlength="150" value="<?php echo $row2->namaJurusan; ?>" />
		</td>
	</tr>
        <tr>
		<td>No Urut</td>
		<td>
			<input type="text" name="no_urut" id="no_urut" class="input size290 required" maxlength="150" value="<?php echo $row->no_urut; ?>" />
		</td>
	</tr>
        <tr>
		<td>Nama Fakultas (*)</td>
		<td>
                    <select name="fakultasID" id="fakultasID" class="input size290 required">
                        <option value="<?php echo $row->fakultas; ?>"><?php echo $row->fakultas; ?></option>
                        <?php 
                        if(isset($get_fakultas)){
                            foreach ($get_fakultasID as $row3) { ?>
                            <option value="<?php echo $row3->namaFakultas; ?>"><?php echo $row3->namaFakultas; ?></option>
                        <?php
                            }
                    } ?>
                    </select>
                </td>
	</tr>
        <tr>
		<td>Faculty Name (**)</td>
		<td>
                    <select name="fakultasEN" id="fakultasEN" class="input size290 required">
                        <option value="<?php echo $row2->fakultas; ?>"><?php echo $row2->fakultas; ?></option>
                        <?php
                        if(isset($get_fakultas)){ 
                            foreach ($get_fakultasEN as $row4) { ?>
                            <option value="<?php echo $row4->namaFakultas; ?>"><?php echo $row4->namaFakultas; ?></option>
                            <?php
                                }
                        } ?>
                    </select>
                </td>
	</tr>
	<tr>
		<td>Alamat (*)</td>
		<td>
			<input type="text" name="alamatID" id="alamatID" class="input size290 required" maxlength="150" value="<?php echo $row->alamat; ?>" />
		</td>
	</tr>
        <tr>
		<td>Address (**)</td>
		<td>
			<input type="text" name="alamatEN" id="alamatEN" class="input size290 required" maxlength="150" value="<?php echo $row2->alamat; ?>" />
		</td>
	</tr>
	<tr>
		<td>Telp (*)</td>
		<td>
			<input type="text" name="telp" id="telp" class="input size290 required" maxlength="30" value="<?php echo $row->telp; ?>" />
		</td>
	</tr>
	<tr>
		<td>Fax (*)</td>
		<td>
			<input type="text" name="fax" id="fax" class="input size290" maxlength="30" value="<?php echo $row->fax; ?>" />
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" id="email" class="input size290 required" maxlength="150" value="<?php echo $row->email; ?>" /></td>
	</tr>
        <tr>
		<td>Website</td>
		<td><input type="text" name="website" id="website" class="input size290 required" maxlength="150"  value="<?php echo $row->website; ?>" /></td>
	</tr>
        <tr>
		<td>Tentang (*)</td>
		<td><textarea name="aboutID" id="aboutID" class="input size300" minlength="100"  value="<?php echo $row->about; ?>" /><?php echo $row->about; ?></textarea></td>
	</tr>
        <tr>
		<td>About (**)</td>
		<td><textarea name="aboutEN" id="aboutEN" class="input size300" minlength="100" value="<?php echo $row2->about; ?>" /><?php echo $row2->about; ?></textarea></td>
	</tr>
        <tr>
		<td>Head of Department</td>
		<td><input type="text" name="headOfDept" id="dean" class="input size290" maxlength="150" value="<?php echo $row->headOfDept; ?>" /></td>
	</tr>
        <tr>
		<td>Media  (*) (**)</td>
		<td>
			<?php echo form_dropdown(preg_replace('/#/', '', $params['media_id']), $options_media, $row->mediaImages, "id=\"".preg_replace('/#/', '', $params['media_id'])."\" class=\"input size300\""); ?>
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
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Simpan', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus bahasa indonesia</td>
		<td>(**) Harus bahasa inggris</td>
	</tr>
        <?php }}}} ?>
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