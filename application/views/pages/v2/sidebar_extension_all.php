<nav id="nav" class="menu-area">
	<ul id="main-menu">
		<?php
			// Inisialisasi
			$menuNavigasi = array();
			$menuNavigasi[0] = $resultFixed;
			$menuNavigasi[1] = $resultSidebar;
			$menuNavigasi[2] = $resultExtend;
			
			for($i=0; $i<sizeof($menuNavigasi); $i++){
				foreach ($menuNavigasi[$i] as $row){
				if($row->id_parent == null){
		?>
		<li>
			<a href="<?php echo $row->link;?>">
				<?php
					if($row->title!=null or $row->title != '') echo strtoupper($row->title);
					else echo 'HOME';
				?>
			</a>
			<?php 
				/* ui dev v2, edited by Doni Setio Pambudi */
				$childCount = 0;
				foreach ($resultSidebar as $row2){
					if($row2->id_parent != null && $row->id_page != null && $row2->id_parent == $row->id_page ){
						$childCount++;
					}
				}
				if($row->ada != null && $childCount > 0){ /* end edit */ ?>
			<ul class="sub-menu">
				<li class="sub-menu-title">
				<?php
					if($row->title!=null or $row->title != '') echo strtoupper($row->title);
					else echo 'HOME';
				?>
				</li>
				<?php
					foreach ($resultSidebar as $row2){
						if($row2->id_parent != null && $row->id_page != null && $row2->id_parent == $row->id_page ){
				?>
				<li>
					<a href="<?php echo $row2->link;?>">
						<?php
							if($row2->title!=null or $row2->title != '') echo strtoupper($row2->title);
							else echo 'HOME';
						?>
					</a>
				</li>
				<?php
						}
					}
				?>
			</ul>
			<?php } ?>
			
			</li>
			<?php } } ?>
			
			<li class="spacer"></li>
		<?php } ?>
	</ul>
</nav>
<!-- end menu navigation -->