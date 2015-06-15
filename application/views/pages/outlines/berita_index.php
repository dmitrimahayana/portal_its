<?php
	if((!isset($jumlah)) or $jumlah<1)	{$jumlah = 1;}
	else if($jumlah>3)					{$jumlah = $show_news;}
	if($hasil!=null):
		for($i=0; $i<$jumlah; $i++):
			$row = $hasil[$i];
			$datetime = strtotime($row->newslastupdate); 
			$mysqldate = date("d-M-y H:i", $datetime);
?>
<div class="hot-news size130 left borderless height200" title="<?php echo $row->newstitle; ?>" style="padding-right: 25px;">
	<div class="borderless">
		<a href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>">
			<img class="left padding-left-5 padding-right-5 " src="data:image/jpg;base64,<?php echo $row->newspict;?>" height="100" width="130" style="margin-top: 10px;"/>
		</a>
	</div>
	<p class="head-hot-news height30" style="overflow: hidden; font-size: 12px; text-align: center;">
            <?php 
			if(strlen($row->newstitle) < 70):
				echo $row->newstitle;
			else:
				echo substr($row->newstitle, 0, 70).'...';
			endif;
			?>
		<a class="color-blue-light" href="<?php echo base_url(); ?>berita/<?php echo $row->newsid.'/'.$lang; ?>">
                    <i>read more</i>
		</a>
	</p>
</div>
<?php
		endfor;
	endif;
?>
