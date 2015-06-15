				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-options line-left size150">Nama</th>
					<th class="table-header-options line-left">Menu Stakeholder</th>
					<th class="table-header-menu line-left">Menu</th>
				</tr>
				<script type="text/javascript">
				<!--
				function confirm_delete(id, nama)
				{
					var answer = confirm("Apakah Anda ingin menghapus stakeholder \""+nama+"\" ?")
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
					<td>
						<?php
						foreach($this->stakeholder_model->get_stakeholder_and_menu($row->name, 0, MAX_INTEGER) as $menus):
						?>
						<span><?php echo $menus->name; ?></span>&nbsp;
						<?php
						endforeach;
						?>
					</td>
					<td>
						<a href="<?php echo base_url(); ?>beranda/edit/<?php echo $info;?>/<?php echo $row->id_stakeholder;?>" title="Edit" class="icon-edit info-tooltip"></a>
						<a href="#" id="delete<?php echo $row->id_stakeholder; ?>" title="Delete" class="icon-delete info-tooltip" onclick="confirm_delete('<?php echo $row->id_stakeholder;?>','<?php echo $row->name;?>')"></a>
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
				</tr>
				<?php
					endwhile;
				?>