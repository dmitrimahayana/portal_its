<header id="top" class="clearfix">
	<div class="option-search">
		<div class="langs">
			<?php
				foreach ($resultLanguage as $row){
					if($lang != $row->lang){
			?>
						<a href="<?php echo $row->link; ?>"><img src="<?php echo base_url(); ?>images/v2/<?php echo $row->lang; ?>.png" alt="Switch <?php echo ucfirst($row->name); ?>"></a>
			<?php 
					}
				}	
			?>
		</div>
		<div class="search">
			<form action="<?php echo base_url(); ?>pencarian/<?php echo $lang ?>" method="post">
				<input type="text" placeholder="<?php echo $terms['search'];?>" name="keyword">
				<input type="hidden" name="offset" value="0">
				<input class="ir" type="submit">
			</form>
		</div>
	</div>                     
</header><!-- /header -->