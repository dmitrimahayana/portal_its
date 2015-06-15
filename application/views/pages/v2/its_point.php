	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>

		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php echo $magzTitle; ?></h1>
			<div class="row" style="margin-top: 20px;">
			<?php $num = 1;
				  $total = count($result_book);
				foreach($result_book as $rb){ 
			?>
				<div class="span3 list-item list-media-press">
					<figure>
						<a href="<?php echo $rb->link; ?>" target="_blank" title="Download">
							<img title="<?php echo $rb->title; ?>" alt="<?php echo $rb->title; ?>" src="<?php echo base_url().'files/'.$rb->file_image; ?>" style="width: 118px; height: 166px;">
						</a>
						<figcaption>
							<p><a href="<?php echo $rb->link; ?>" target="_blank" title="Download"><?php echo $rb->title; ?></a></p>
						</figcaption>
					</figure>
				</div>
			<?php 
				if($num%4 == 0 && $num < $total){ ?>
					</div><div class="row">
				<?php } $num++;
			} ?>
			</div>
		</div>
	</div><!-- row for nav+banner area -->
</div>