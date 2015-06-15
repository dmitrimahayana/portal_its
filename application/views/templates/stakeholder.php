<div id="stakeholder-page" class="left corner-top content-based">
<h2><?php echo $terms['welcome'];?> <?php echo $stakeholder_name; ?></h2>
<ul id="list-menu-stakeholder">
	<?php
		foreach($menu as $row):
	?>
	<li>
		<a href="<?php echo $row->link; ?>">
			<?php
				if(!empty($row->icon)):
			?>
			<img src="<?php echo base_url().'files/images/'.$row->icon;?>" class="left icon-menu-stakeholder" />
			<?php
				else:
			?>
			<img src="<?php echo base_url();?>images/blank.png" class="left icon-menu-stakeholder" />
			<?php
				endif;
			?>
			<?php echo $row->title; ?>
		</a>
	</li>
	<?php
		endforeach;
	?>
</ul>
</div>