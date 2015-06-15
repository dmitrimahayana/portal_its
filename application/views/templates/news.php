<div class="article content-based left corner-top">
	<?php
	if($beritaLengkap != null):
	?>
    <div class="column right" style="float: left;margin-top: 50px;">
		<?php
		if( !empty($beritaLengkap->newspict)):
		?>
        <img src="data:image/jpg;base64,<?php echo $beritaLengkap->newspict;?>" id="gambar-berita" class="right column" />
		<?php
		endif;
		?>
	</div>
    <div class="left <?php if( !empty($beritaLengkap->newspict)) { echo 'news-title';} ?>" style="width: 380px;">
		<h1><?php echo $beritaLengkap->newstitle; ?></h1>
	</div>
	<div class="left <?php if( !empty($beritaLengkap->newspict)) { echo 'news-head';} ?>" style="width: 380px;">
		<h4><?php echo $beritaLengkap->newshead; ?></h4>
	</div>
	<div class="clear"><br /></div>
	<div id="news-body">
		<?php echo $beritaLengkap->newsbody; ?>
	</div>
	<br/>
	<div id="news-place">
		Sumber: <?php echo $beritaLengkap->newsplace; ?>
	</div>
	<?php
	endif;
	?>
</div>
