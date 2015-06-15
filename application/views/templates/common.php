<div class="article left corner-top content-based" style="margin-top: -35px;width: 600px;">
	<?php if($article->title != null):?>
	<h1><?php echo $article->title; ?></h1>
	<?php endif; ?>
	<div id="content">
		<?php
			echo $article->content;
		?>
	</div>
</div>