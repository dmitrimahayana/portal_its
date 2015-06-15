<input name="name" value="<?php echo $fill->name ?>" type="hidden">
<table>
	<tr>
		<td>Nama (*)</td>
		<td><input type="text" id="name" class="input size290" maxlength="50" placeholder="Nama Social Network" value="<?php echo $fill->name;?>" disabled="disabled" /></td>
	</tr>
	<tr>
		<td>Link (*)</td>
		<td><input type="text" name="link" id="link" class="input size290" placeholder="Link Social Network" value="<?php echo $fill->link;?>"/></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<span style="margin-left: 30px;">
				<a href="<?php echo base_url();?>beranda/add/media-images" style="color: #000;" target="_blank">Masukkan Media</a>
			</span>
		</td>
	</tr>
	<tr>
		<td>Icon</td>
		<td>
			<?php echo form_dropdown('icon', $options_media, $fill->icon, 'id="icon" class="input size300"'); ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2">
			<span id="display_id" class="hide">
				<canvas id="canvas_id" class="left" width="100" height="100" style="margin-left: 30px;">
				Your browser does not support the canvas element.
				</canvas>
				<span>
				<p class="margin-top-0 padding-left-5">Lebar:<span id="lebar_id"></span> px
				</p>
				<p class="margin-top-0 padding-left-5">Tinggi:<span id="tinggi_id"></span> px
				</p>
				</span>
			</span>
			<script type="text/javascript">
			var canvas_id=document.getElementById("canvas_id");
			var ctx_id=canvas_id.getContext("2d");
			var img_id=new Image();
			img_id.onload = function(){
				ctx_id.drawImage(img_id,0,0);
			};
			</script>
		</td>
	</tr>
	<tr>
		<td>Urutan (*)</td>
		<td><input type="text" name="order" id="order" class="input size290" maxlength="5" placeholder="Urutan" value="<?php echo $fill->order;?>" /></td>
	</tr>
	<tr>
		<td>Online</td>
		<td><?php echo form_checkbox('online', '1', $fill->online==1, 'id="online" class="input"'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_submit('submit', 'Perbarui', 'class="submit corner-right"');?></td>
	</tr>
	<tr>
		<td>(*) Harus diisi</td>
		<td></td>
	</tr>
</table>
</form>
</div>
<script>
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
	var media_id = set_canvas(canvas_id, ctx_id, "#icon", "#display_id", img_id, image_sources);
	set_keterangan(media_id, "#lebar_id", "#tinggi_id");
	/* Set the change event */
	$("#icon").change(function() {
		media_id = set_canvas(canvas_id, ctx_id, "#icon", "#display_id", img_id, image_sources);
		set_keterangan(media_id, "#lebar_id", "#tinggi_id");
	});
	/* Jquery validator */
	jQuery.validator.messages.min = " Pilihan tidak boleh NULL";
	$("form").validate(
		{
			invalidHandler: function(e, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
						? 'Anda belum mengisi 1 kolom. Kolom tersebut sudah disorot'
						: 'Anda belum mengisi ' + errors + ' kolom.  Kolom - kolom tersebut sudah disorot';
					$("div#message-yellow").html(message);
					$("div#message-yellow").show();
				} else {
					$("div#message-yellow").hide();
				}
			},
			onkeyup: false,
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 30
				},
				link: {
					required: true
				},
				order: {
					range: [1, 9999]
				}
			}
		}
	);
});
-->
</script>