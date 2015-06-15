	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		<style type="text/css">
			#entry_form { background-color: white; padding: 20px; }
			#entry_form table td { padding: 5px; }
			#entry_form table td input[type=text], form table td textarea { width: 100%; }
			#entry_form .entry_guide {
				margin: 0px;
				color: #007dc5;
				font-size: 12px;
				margin-top: 5px;
			}
			#validation_error { margin-bottom: 20px; }
			#validation_error p { margin: 0px; margin-bottom: 5px; color: red; font-size: 12px;  }
			.success_message { margin-top:30px; color: green; }
			.error_message { color: red; }
		</style>
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php echo $lang=='id' ? 'Umpan Balik' : 'Feedback'; ?></h1>
			<?php if(!isset($frm_msg)){ ?>
			<form method="post" id="entry_form">
				<div id="validation_error">
				<?php echo validation_errors(); ?>
				</div>
				<p>
				Bapak Ibu dan rekan-rekan mahasiswa ITS sekalian, dalam rangka peningkatan <br>
				kualitas layanan di lingkungan ITS, Badan Koordinasi, Pengendalian dan <br>
				Komunikasi Program (BKPKP) ITS telah menyediakan formulir ini sebagai<br>
				wadah untuk menampung aspirasi berupa umpan balik permasalahan atau<br>
				usulan dari civitas akademika ITS (dosen, tenaga kependidikan dan mahasiswa). <br>
				<br>
				Umpan balik ini diharapkan berupa permasalahan atau usulan perbaikan<br>
				terhadap proses layanan yang dilakukan oleh unit-unit kerja di Lingkungan ITS. <br>
				Semua umpan balik ini bersifat rahasia, dan akan dikompilasi di BKPKP dan <br>
				dikoordinasikan dengan unit-unit kerja terkait di ITS untuk mendapatkan solusi.<br>
				<br>
				Terima kasih atas perhatian yang diberikan<br>
				</p>
				<table width="100%">
					<tbody>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Topik Permasalahan / Usulan' : 'Topik Permasalahan / Usulan'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="topic" maxlength="100" value="<?php echo set_value('topic'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Topik Permasalahan / Usulan' : 'Masukkan Topik Permasalahan / Usulan'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Unit Kerja di ITS terkait' : 'Unit Kerja di ITS terkait'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="unit" maxlength="100" value="<?php echo set_value('unit'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Unit Kerja di ITS terkait' : 'Masukkan Unit Kerja di ITS terkait'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Nama' : 'Nama'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="nama" maxlength="100" value="<?php echo set_value('nama'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan nama' : 'Enter nama'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Status' : 'Status'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="radio" name="status" value="Dosen ITS">Dosen ITS<br>
								<input type="radio" name="status" value="Tenaga Kependidikan/Karyawan ITS">Tenaga Kependidikan/Karyawan ITS<br>
								<input type="radio" name="status" value="Mahasiswa ITS">Mahasiswa ITS<br>
								<input type="radio" name="status" value="Alumni">Alumni<br>
								<input type="radio" name="status" value="Umum">Umum<br>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Pilih status' : 'Pilih status'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'NIP / NRP' : 'NIP / NRP'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="nip" maxlength="100" value="<?php echo set_value('nip'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan NIP / NRP' : 'Masukkan NIP / NRP'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'E-mail' : 'E-mail'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan E-mail' : 'Masukkan E-mail'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Telp / HP' : 'Telp / HP'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="telp" maxlength="100" value="<?php echo set_value('telp'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Telp / HP' : 'Masukkan Telp / HP'; ?></p>
							</td>
						</tr>
						<tr>
							<td width="50px"><?php echo $lang=='id' ? 'Unit afiliasi di ITS' : 'Unit affiliation'; ?></td>
							<td width="10px">:</td>
							<td>
								<input type="text" name="afiliasi" maxlength="100" value="<?php echo set_value('afiliasi'); ?>"/>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Unit afiliasi di ITS' : 'Masukkan Unit afiliasi di ITS'; ?></p>
							</td>
						</tr>
						<tr>
							<td><?php echo $lang=='id' ? 'Deskripsi Permasalahan / Usulan ' : 'Problem Description'; ?></td>
							<td>:</td>
							<td>
								<textarea name="problem" maxlength="2048" rows="5" cols="60"><?php echo set_value('problem'); ?></textarea>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Deskripsi Permasalahan / Usulan' : 'Masukkan Deskripsi Permasalahan / Usulan'; ?></p>
							</td>
						</tr>
						<tr>
							<td><?php echo $lang=='id' ? 'Usulan Solusi' : 'Solution'; ?></td>
							<td>:</td>
							<td>
								<textarea name="solusi" maxlength="2048" rows="5" cols="60"><?php echo set_value('solusi'); ?></textarea>
								<p class="entry_guide"><?php echo $lang=='id' ? 'Masukkan Usulan Solusi' : 'Masukkan Usulan Solusi'; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<script type="text/javascript"
									 src="https://www.google.com/recaptcha/api/challenge?k=6LfRgOYSAAAAAI_lr7bNl1RViLSgOri-dCaCpR1q">
								</script>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<input type="submit" class="btn btn-default" value="<?php echo $lang=='id'?'Simpan':'Save'; ?>"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			<?php }else{ ?>
			<h5 class="success_message <?php if($error_send) echo "error_message"; ?>"><?php echo $frm_msg; ?></h5>
			<?php } ?>
		</div>
	</div><!-- row for nav+banner area -->
</div>