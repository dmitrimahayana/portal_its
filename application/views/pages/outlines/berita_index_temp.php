<?php
	if((!isset($jumlah)) or $jumlah<1)	{$jumlah = 1;}
	else if($jumlah>3)					{$jumlah = $show_news;}
	if($hasil!=null):
		for($i=0; $i<$jumlah; $i++):
			$row = $hasil[$i];
			$datetime = strtotime($row->newslastupdate); 
			$mysqldate = date("d-M-y H:i", $datetime);
?>
<div class="hot-news size180 left borderless height200" title="<?php echo $row->newstitle; ?>">
    <p class="date-hot-news" style="text-align: center;"> <?php //echo $mysqldate; ?> </p>
	<div class="borderless">
		<a href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>">
			<img class="left padding-left-5 padding-right-5 " src="data:image/jpg;base64,<?php echo $row->newspict;?>" height="120" width="170" style="margin-top: 10px;"/>
		</a>
	</div>
	<p class="head-hot-news height30" style="overflow: hidden; font-size: 10px; text-align: center;">
		<a href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>">
			<?php 
			if(strlen($row->newstitle) < 70):
				echo $row->newstitle;
			else:
				echo substr($row->newstitle, 0, 70).'...';
			endif;
			?>
		</a>
	</p>
</div>
<?php
		endfor;
	endif;
?>
