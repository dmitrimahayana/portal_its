<table>
	<tr>
		<td>Jurusan</td>
		<td>
                    <select name="jurusan" id="jurusan" class="input size290 required">
                        <!--<option value="<?php echo $row->fakultas; ?>"><?php echo $row->fakultas; ?></option>-->
                        <?php 
                        if(isset($jurusan)){
                            foreach ($jurusan as $row3) { ?>
                            <option value="<?php echo $row3->idJur; ?>"><?php echo $row3->namaJurusan; ?></option>
                        <?php
                            }
                    } ?>
                    </select>
                </td>
	</tr>
        <tr><td><br/>Url Indonesia</td></tr>
        <tr>
		<td> Program Studi </td>
		<td>
			<input type="text" name="kurikulumID" id="kurikulumID" class="input size290 required" maxlength="150" placeholder="Program Studi" />
		</td>
	</tr>
        <tr>
		<td> Laboratorium </td>
		<td>
			<input type="text" name="laboratoriumID" id="laboratoriumID" class="input size290 required" maxlength="150" placeholder="laboratorium" />
		</td>
	</tr>
        <tr>
		<td> Dosen </td>
		<td>
			<input type="text" name="dosenID" id="dosenID" class="input size290 required" maxlength="150" placeholder="Dosen" />
		</td>
	</tr>
        <tr>
		<td> Publikasi Terpilih </td>
		<td>
			<input type="text" name="publikasiID" id="publikasiID" class="input size290 required" maxlength="150" placeholder="Publikasi Terpilih" />
		</td>
	</tr>
        <tr>
		<td> Penghargaan </td>
		<td>
			<input type="text" name="penghargaanID" id="penghargaanID" class="input size290 required" maxlength="150" placeholder="penghargaan" />
		</td>
	</tr>
        <tr>
		<td> Kerjasama </td>
		<td>
			<input type="text" name="kerjasamaID" id="kerjasamaID" class="input size290 required" maxlength="150" placeholder="kerjasama" />
		</td>
	</tr>
        <tr><td><br/>Url Inggris</td></tr>
        <tr>
		<td> Program Studi </td>
		<td>
			<input type="text" name="kurikulumEN" id="kurikulumEN" class="input size290 required" maxlength="150" placeholder="Program Studi" />
		</td>
	</tr>
        <tr>
		<td> Laboratorium </td>
		<td>
			<input type="text" name="laboratoriumEN" id="laboratoriumEN" class="input size290 required" maxlength="150" placeholder="laboratorium" />
		</td>
	</tr>
        <tr>
        <td> Dosen </td>
		<td>
			<input type="text" name="dosenEN" id="dosenEN" class="input size290 required" maxlength="150" placeholder="Dosen" />
		</td>
        </tr>
        <tr>
		<td> Publikasi Terpilih </td>
		<td>
			<input type="text" name="publikasiEN" id="publikasiEN" class="input size290 required" maxlength="150" placeholder="Publikasi Terpilih" />
		</td>
	</tr>
        <tr>
		<td> Penghargaan </td>
		<td>
			<input type="text" name="penghargaanEN" id="penghargaanEN" class="input size290 required" maxlength="150" placeholder="penghargaan" />
		</td>
	</tr>
        <tr>
		<td> Kerjasama </td>
		<td>
			<input type="text" name="kerjasamaEN" id="kerjasamaEN" class="input size290 required" maxlength="150" placeholder="kerjasama" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Masukkan', 'class="submit corner-right"');?></td>
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