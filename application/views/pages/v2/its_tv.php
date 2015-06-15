	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0">ITS TV</h1>
			<div class="list-item list-media-its-tv" style="margin-top: 20px; width: 100%">
				<div class="tv-list">
					<ul>
						<?php foreach($resultEureka as $cEureka){ ?>
						<li style="height:182px; width: 20%;">
							<a href="javascript:void(0);" onclick="openYouTube('<?php echo $cEureka->youtube_id; ?>')" title="">
								<figure>
									<div class="img">
										<img src="http://img.youtube.com/vi/<?php echo $cEureka->youtube_id; ?>/default.jpg" alt="" width="146" height="110">
									</div>
									<figcaption style="font-weight: 400!Important;color:#666666!important; font-size: 14px;"><?php echo $cEureka->title; ?></figcaption>
								</figure>
							</a>
						</li>
						<?php } ?>
					</ul>
					<div id="bg" class="popup_bg"></div>
				</div>
			</div>
		</div>
	</div><!-- row for nav+banner area -->
</div>