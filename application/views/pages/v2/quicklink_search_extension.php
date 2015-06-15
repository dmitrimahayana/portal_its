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
				<input class="ir" type="submit">
			</form>
		</div>
	</div>
	<nav class="quicklinks">
		<ul>
			<?php
				$countLink=0;
				foreach ($resultFast as $row){
					$countLink++;
					if ($countLink<=5){
			?>
			<li class="contain">
				<a href="<?php echo $row->url; ?>" class="card">
					<span class="front flip"><img src="<?php echo base_url(); ?>files/<?php echo $row->link_thumb; ?>" alt="<?php echo $row->text; ?>"></span>
					<span class="back flip"><strong><?php echo $row->text; ?></strong></span>
				</a>
			</li>
			<?php
					}
				}
			?>
		</ul>
	</nav>                        
</header><!-- /header -->