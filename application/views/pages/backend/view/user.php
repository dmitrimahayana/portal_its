				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Nama Pengguna</th>
					<th class="table-header-options line-left">Tampilan Nama Pengguna</th>
					<th class="table-header-options line-left">Jenis Pengguna</th>
					<th class="table-header-options line-left">Email</th>
					<th class="table-header-options line-left">Tanggal Pendaftaran</th>
					<th class="table-header-options line-left">Aktivitas Terakhir</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus pengguna \""+nama+"\" ?")
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
						if($this->session->userdata('user_level') > $row->level or $this->session->userdata('username') == $row->username):
				?>
				<tr>
					<td><input type="checkbox" class="checkbox"/></td>
					<td><?php echo $row->username; ?></td>
					<td><?php echo $row->screen_name; ?></td>
					<td><?php echo $row->group_name; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php if($row->join_date != null) {echo date('j-F-Y, g:i a', $row->join_date);} ?></td>
					<td><?php if($row->last_visit != null) {echo date('j-F-Y, g:i a', $row->last_visit);} ?></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/edit/<?php echo $info;?>/<?php echo $row->id_user;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<?php
						$level = $this->session->userdata('user_level');
						if($level > $row->level):
						?>
						<a href="#" id="delete<?php echo $row->id_user; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id_user;?>','<?php echo $row->screen_name;?>')"></a>
						<?php
						endif;
						?>
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