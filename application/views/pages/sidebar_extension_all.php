<div id="menu-navigation">
	<!--<h3 class="color-brown"><?php echo $terms['navigation'];?></h3>-->
	<ul class="menu-sidebar">
		<?php
			// Inisialisasi
			$menuNavigasi = array();
			$menuNavigasi[0] = $resultFixed;
			$menuNavigasi[1] = $resultSidebar;
			$menuNavigasi[2] = $resultExtend;
		?>
		<?php
			for($i=0; $i<sizeof($menuNavigasi); $i++):
				foreach ($menuNavigasi[$i] as $row):
				if($row->id_parent == null):
		?>
		<li class="menu-sidebar-item">
			<a href="<?php echo $row->link;?>" class="transition" target="_parent">
			<div>
				<?php
					if($row->ada != null) {}//echo '+';}
				?>
				<?php
					if($row->title!=null or $row->title != '')
						echo strtoupper($row->title);
					else echo 'HOME';
				?>
			</div>
			</a>
			<?php
				if($row->ada != null):
			?>
			<ul class="extend-sidebar">
				<?php
					foreach ($resultSidebar as $row2):
						if($row2->id_parent == $row->id_page and $row2->id_parent != null  and $row->id_page != null):
				?>
				<li class="menu-sidebar-item">
                                    <?php if($row->id_page==99){ ?>
                                    <a href="<?php echo $row2->link;?>" class="transition" target="_blank">
                                        <?php
						if($row2->ada != null) {}//echo '++';}
					?>
					<?php
						if($row2->title!=null or $row2->title != '')
							echo strtoupper($row2->title);
						else echo 'HOME';
					?>
					</a>
                                    <?php } 
                                    else { ?>
					<a href="<?php echo $row2->link;?>" class="transition" target="_parent">
					<?php
						if($row2->ada != null) {}//echo '++';}
					?>
					<?php
						if($row2->title!=null or $row2->title != '')
							echo strtoupper($row2->title);
						else echo 'HOME';
					?>
					</a>
                                    <?php } ?>
					<ul class="extend-sidebar-2">
						<?php
							foreach ($resultSidebar as $row3):
								if($row3->id_parent == $row2->id_page and $row3->id_parent != null  and $row2->id_page != null):
						?>
						<li class="menu-sidebar-item">
							<a href="<?php echo $row3->link;?>" class="transition" target="_parent">
							<?php
								if($row3->title!=null or $row3->title != '')
									echo strtoupper($row3->title);
								else echo 'HOME';
							?>
							</a>
						</li>
						<?php
								endif;
							endforeach;
						?>
					</ul>
				</li>
				<?php
						endif;
					endforeach;
				?>
			</ul>
			<?php
				endif;
			?>
		</li>
		<?php
				endif;
				endforeach;
		?>
		<br />
		<?php
			endfor;
		?>
	</ul>
</div>
<!-- end menu navigation -->