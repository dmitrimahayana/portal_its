				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left">Nama</th>
					<th class="table-header-options line-left">Status Online</th>
					<!--<th class="table-header-options line-left">Date Start</th>
					<th class="table-header-options line-left">Date End</th>-->
					<th class="table-header-options line-left">Gambar</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus Doodle \""+nama+"\" ?")
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
					<td><?php echo $row->name; ?></td>
                                        <td>
                                            <?php 
                                            if(strtotime($row->now)>=$row->date_start && strtotime($row->now)<=$row->date_end){
                                                echo 'Aktif'; 
                                            }
                                            else {
                                                echo 'Tidak Aktif';
                                            }
                                            ?></td>
                                        <!--<td><?php echo $row->date_start; ?></td>
					<td><?php echo $row->date_end; ?></td>-->
					<td><img src="<?php echo base_url();?>files/<?php echo $row->link_thumb; ?>"/></td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/manageNew/edit/<?php echo $info;?>/<?php echo $row->id;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->id_interactive; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id;?>','<?php echo $row->name;?>')"></a>
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
				</tr>
				<?php
					endwhile;
				?>