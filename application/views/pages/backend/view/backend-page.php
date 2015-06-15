				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Nama</th>
					<th class="table-header-options line-left">Tampilan Nama</th>
					<th class="table-header-options line-left">Urutan</th>
					<th class="table-header-options line-left">Online</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus halaman backend \""+nama+"\" ?")
					if (answer==true)
					{
						window.location.replace("<?php echo base_url().'beranda/func/delete/'.$info.'/' ?>"+id);
					}
					else { return false; }
				}
				-->
				</script>
				<?php
					$count = 0;
					foreach($model as $row):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->display_name; ?></td>
					<td><?php echo $row->order; ?></td>
					<td><?php echo $row->online; ?></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/edit/<?php echo $info;?>/<?php echo $row->id_backend_page;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->id_backend_page; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id_backend_page;?>','<?php echo $row->name;?>')"></a>
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
				</tr>
				<?php
					endwhile;
				?>