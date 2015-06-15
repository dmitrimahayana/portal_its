	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<article id="main" class="clearfix">
			<!-- Content Here -->
			<?php if($beritaLengkap != null) { ?>
			<div>
				<h1 class="article-title"><?php echo $beritaLengkap->newstitle; ?></h1>
				<time class="post-time">
					<?php
						$newsDate = strtotime($beritaLengkap->newslastupdate);
						echo date("d F Y | H.i", $newsDate) . " WIB";
					?>
				</time>
			</div>
			<header style="margin-top: 10px;">
				<?php if( !empty($beritaLengkap->newspict)) { ?>
				<figure>
					<img src="data:image/jpg;base64,<?php echo $beritaLengkap->newspict;?>" id="gambar-berita" style="width: 540px; height: auto;"/>
				</figure>
				<?php } ?>
			</header>
			<div class="row">
				<section class="span9 content-inside">
					<blockquote style="margin-left: 0px; padding-left: 0px; background: none; margin-top: 10px;">
						<?php echo $beritaLengkap->newshead; ?>
					</blockquote>
					<p><?php echo $beritaLengkap->newsbody; ?></p>
				</section>
				<aside class="span3 content-sidebar">
					<div class="share-this">
						<h6>Share</h6>
						<ul class="inline-list">
							<li><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url() . 'berita/'.$beritaLengkap->newsid .'/'.$lang; ?>" title="Facebook" class="share-facebook">Share</a></li>
							<li><a href="http://twitter.com/intent/tweet?text=<?php echo base_url() . 'berita/'.$beritaLengkap->newsid .'/'.$lang; ?> - <?php echo $beritaLengkap->newstitle;  ?>" title="Twitter" class="share-twitter">Tweet</a></li>
							<li><a href="mailto:?subject=<?php echo $beritaLengkap->newstitle;  ?>&amp;body=<?php echo base_url() . 'berita/'.$beritaLengkap->newsid .'/'.$lang; ?>." title="Email" class="share-email">Email</a></li>
							<li><a href="javascript:void(0);" onclick="javascript:window.print();" title="Print" class="print-this">Print</a></li>
						</ul>
					</div>
				</aside>
			</div>
			<?php } ?>
		</article>
	</div><!-- row for nav+banner area -->
</div>