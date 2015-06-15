				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Nama Jurusan</th>
					<th class="table-header-options line-left">Nama Fakultas</th>
					<th class="table-header-options line-left">Alamat</th>
					<th class="table-header-options line-left">Telp</th>
					<th class="table-header-options line-left">Fax</th>
					<th class="table-header-options line-left">Email</th>
					<th class="table-header-options line-left">Website</th>
					<th class="table-header-options line-left size290">Head of Dept</th>
					<th class="table-header-options line-left">Gambar</th>
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
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
                                        <td><?php echo $row->namaJurusan; ?></td>
					<td><?php echo $row->fakultas; ?></td>
					<td><?php echo $row->alamat; ?></td>
					<td><?php echo $row->telp; ?></td>
					<td><?php echo $row->fax; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->website; ?></td>
					<td><?php echo $row->headOfDept; ?></td>
                                        <td><img src="<?php echo base_url().'files/'.$row->link_thumb; ?>" /></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/manageNew/edit/<?php echo $info;?>/<?php echo $row->idJur;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->idJur; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->idJur;?>','<?php echo $row->namaJurusan;?>')"></a>
					</td>
				</tr>
				<?php
						$count++;
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
					<td></td>
					<td></td>
				</tr>
				<?php
					endwhile;
				?>