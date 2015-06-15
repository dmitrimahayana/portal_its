				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Nama</th>
					<th class="table-header-options line-left">Judul Indonesia</th>
					<th class="table-header-options line-left">Judul Inggris</th>
					<th class="table-header-options line-left">Link</th>
					<th class="table-header-options line-left">Foto</th>
					<th class="table-header-options line-left">Update Terakhir</th>
					<th class="table-header-options line-left">Waktu Mulai</th>
					<th class="table-header-options line-left">Waktu Akhir</th>
					<th class="table-header-options line-left">Online</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus Catatan Sukolilo \""+nama+"\" ?")
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
					<td><?php echo $row->title_id; ?></td>
					<td><?php echo $row->title_en; ?></td>
					<td><?php echo $row->link; ?></td>
					<td><?php if($row->link_thumb != null): ?><img src="<?php echo base_url(); ?>files/<?php echo $row->link_thumb; ?>" /><?php endif; ?></td>
					<td><?php if($row->last_update) {echo date('j-F-Y, g:i a', $row->last_update);} ?></td>
					<td><?php if($row->start_date) {echo date('j-F-Y, g:i a', $row->start_date);} ?></td>
					<td><?php if($row->end_date) {echo date('j-F-Y, g:i a', $row->end_date);} ?></td>
					<td><?php echo $row->online; ?></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/edit/<?php echo $info;?>/<?php echo $row->id_sukolilo_notes;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->id_sukolilo_notes; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id_sukolilo_notes;?>','<?php echo $row->name;?>')"></a>
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
					<td></td>
				</tr>
				<?php
					endwhile;
				?>