				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Jurusan</th>
					<th class="table-header-options line-left">Link Program Studi</th>
					<th class="table-header-options line-left">Link Laboratorium</th>
					<th class="table-header-options line-left">Link Dosen</th>
					<th class="table-header-options line-left">Link Publikasi Terpilih</th>
					<th class="table-header-options line-left">Link Penghargaan</th>
					<th class="table-header-options line-left">Link Kerjasama</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus halaman \""+nama+"\" ?")
					if (answer==true)
					{
						window.location.replace("<?php echo base_url().'beranda/manageNew/delete/'.$info.'/' ?>"+id);
					}
					else { return false; }
				}
				-->
				</script>
				<?php
					$count = 0;
					foreach($resultView as $row):
                                            if($row->jurusan%2==0):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
					<td><?php echo $row->namaJur ?></td>
					<td><?php echo $row->kurikulum; ?></td>
					<td><?php echo $row->laboratorium; ?></td>
					<td><?php echo $row->dosen; ?></td>
					<td><?php echo $row->publikasi; ?></td>
					<td><?php echo $row->penghargaan; ?></td>
					<td><?php echo $row->kerjasama; ?></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/manageNew/edit/<?php echo $info;?>/<?php echo $row->id;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->id; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id;?>','<?php echo $row->namaJur;?>')"></a>
					</td>
				</tr>
				<?php
						$count++;
                                            endif;
					endforeach;
				?>
				<?php
					// Mengisi sisanya dengan baris kosong
					while($count++ < PAGINATION_MULTIPLY):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox" disabled="disabled"/></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php
					endwhile;
				?>