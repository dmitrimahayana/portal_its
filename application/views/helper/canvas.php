<?php
$en_enabled = (isset($media_en) and $media_en != null);
$same_enabled = (isset($checkbox_same) and $checkbox_same != null);
?>
<script type="text/javascript">
<!--
$(document).ready(function(){
	/* Displaying thumbnails of selected media into canvas */
	var image_sources = new Array();
	var images_width = new Array();
	var images_height = new Array();
	<?php foreach($all_media as $row):?>
	image_sources[<?php echo $row->id_images;?>] = "<?php echo base_url().'files/'.$row->link_thumb;?>";
	images_width[<?php echo $row->id_images;?>] = <?php echo $row->width;?>;
	images_height[<?php echo $row->id_images;?>] = <?php echo $row->height;?>;
	<?php endforeach; ?>
	var canvas_id = document.getElementById("<?php echo preg_replace('/#/', '', $canvas_id);?>");
	var ctx_id=canvas_id.getContext("2d");
	var img_id=new Image();
	img_id.onload = function(){
		ctx_id.drawImage(img_id,0,0);
	};
	<?php if($en_enabled): ?>
	var canvas_en = document.getElementById("<?php echo preg_replace('/#/', '', $canvas_en);?>");
	var ctx_en=canvas_en.getContext("2d");
	var img_en=new Image();
	img_en.onload = function(){
		ctx_en.drawImage(img_en,0,0);
	};
	<?php
	endif;
	?>
	/* Function to view canvas according to the selected image */
	function set_canvas(canvas, context, comboboxid, canvasid, image, image_sources)
	{
		context.clearRect ( 0 , 0 , canvas.width , canvas.height );
		var id_media = $(comboboxid).val();
		image.src = image_sources[id_media];
		if(id_media>0)
		{
			$(canvasid).attr("class", "show");
		}
		else
		{
			$(canvasid).attr("class", "hide");
		}
		return id_media;
	}
	function set_keterangan(index, lebar_id, tinggi_id)
	{
		if(index>0)
		{
			$(lebar_id).html(images_width[index]);
			$(tinggi_id).html(images_height[index]);
		}
		else
		{
			$(lebar_id).html('');
			$(tinggi_id).html('');
		}
	}
	/* Set the value for the first time */
	var media_id = set_canvas(canvas_id, ctx_id, "<?php echo $media_id; ?>", "<?php echo $display_id; ?>", img_id, image_sources);
	set_keterangan(media_id, "<?php echo $lebar_id; ?>", "<?php echo $tinggi_id; ?>");
	<?php if($en_enabled):?>
	var media_en = set_canvas(canvas_en, ctx_en, "<?php echo $media_en; ?>", "<?php echo $display_en; ?>", img_en, image_sources);
	set_keterangan(media_en, "<?php echo $lebar_en; ?>", "<?php echo $tinggi_en; ?>");
	<?php
	endif;
	?>
	/* Set the change event */
	$("<?php echo $media_id; ?>").change(function() {
		media_id = set_canvas(canvas_id, ctx_id, "<?php echo $media_id; ?>", "<?php echo $display_id; ?>", img_id, image_sources);
		set_keterangan(media_id, "<?php echo $lebar_id; ?>", "<?php echo $tinggi_id; ?>");
		<?php if($same_enabled):?>
		/* Bila opsi media inggris sama ditekan */
		if ($('<?php echo $checkbox_same; ?>').is(':checked')) {
			$("<?php echo $media_en; ?>").val($("<?php echo $media_id; ?>").val());
		}
		<?php endif; ?>
	});
	<?php if($en_enabled):?>
	$("<?php echo $media_en; ?>").change(function() {
		media_en = set_canvas(canvas_en, ctx_en, "<?php echo $media_en; ?>", "<?php echo $display_en; ?>", img_en, image_sources);
		set_keterangan(media_en, "<?php echo $lebar_en; ?>", "<?php echo $tinggi_en; ?>");
	});
	<?php
	endif;
	?>
	<?php if($same_enabled):?>
	/* Media inggris sama event */
	$("<?php echo $checkbox_same; ?>").change(function() {
		if ($('<?php echo $checkbox_same; ?>').is(':checked')) {
			$("<?php echo $media_en; ?>").val($("<?php echo $media_id; ?>").val());
			$("<?php echo $row_media_en; ?>").attr("class", "<?php echo $row_media_en; ?> hide");
			$("<?php echo $display_en; ?>").attr("class", "<?php echo $row_media_en; ?> hide");
		}
		else
		{
			$("<?php echo $row_media_en; ?>").attr("class", "<?php echo $row_media_en; ?> show");
			media_en = set_canvas(canvas_en, ctx_en, "<?php echo $media_en; ?>", "<?php echo $display_en; ?>", img_en, image_sources);
			set_keterangan(media_en, "<?php echo $lebar_en; ?>", "<?php echo $tinggi_en; ?>");
		}
	});
	<?php
	endif;
	?>
});
-->
</script>