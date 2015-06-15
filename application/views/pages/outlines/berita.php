<h3 class="box-title"><?php echo $judul;?></h3>
<?php
$count = 0;
if ($result != null):
	foreach ($result as $row):
?>
<div class="border-top-1-soft padding-top-5 padding-left-5 height75">
	<?php
		if( !empty($row->newspict)):
	?>
	<div class="left padding-right-5">
		<img src="data:image/jpg;base64,<?php echo $row->newspict;?>" height="60" width="80" />
	</div>
	<?php
		endif;
	?>
	<div style="font-size: 11px; font-family: calibri, times new roman, arial;" class="margin-right-5 margin-top-0 padding-top-0">
		<!--<a href="#"><img src="<?php echo base_url(); ?>images/videosmall.png" /></a>-->
		<div style="font-size: 10px"><?php echo $row->newslastupdate; ?></div>
		<div><a href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>"><?php echo $row->newstitle;?></a></div>
	</div>
	<?php
	?>
	<!--
	<div class="news-body" style="font-size: 10px;">
		<?php 
		$batas = 160;
		if(strlen($row->newshead) < $batas):
			echo $row->newshead;
		else:
			echo substr($row->newshead, 0, $batas).'...';
		endif;
		?>
		<a class="right" style="font-size: 11px;" href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>"><?php echo $terms['read-more']; ?></a>
	</div>
	-->
</div>
<?php
	endforeach;	// foreach result...*
endif;	// if resultnews
?>