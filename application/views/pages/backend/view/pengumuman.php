				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Jenis</th>
					<th class="table-header-options line-left">Nama Indonesia</th>
					<th class="table-header-options line-left">Nama Inggris</th>
					<th class="table-header-options line-left">URL</th>
					<th class="table-header-options line-left">Date</th>
					<th class="table-header-options line-left">Tampilkan</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">

				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus Doodle \""+nama+"\" ?")
					if (answer==true)
					{
						window.location.replace("<?php echo base_url().'beranda/manageNew/delete/'.$info.'/' ?>"+id);
					}
					else { return false; }
				}

				</script>
				<?php
					$count = 0;
					foreach($resultView as $row):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
					<td><?php echo $row->jenis; ?></td>
                                        <td><?php echo $row->indonesia; ?></td>
                                        <td><?php echo $row->inggris; ?></td>
                                        <td><?php echo $row->url; ?></td>
                                        <td><?php echo $row->date; ?></td>
                                        <td><?php echo ($row->tampil==1)?"YES":"NO"; ?></td>
					<td>
                                            
                                            <a href="<?php echo base_url(); ?>beranda/manageNew/edit/<?php echo $info;?>/<?php echo $row->id;?>" title="Edit" class="icon-edit info-tooltip"></a>
                                            <a href="#" id="delete<?php echo $row->id; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id;?>','<?php echo $row->indonesia;?>')"></a>

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
				</tr>
				<?php
					endwhile;
				?>