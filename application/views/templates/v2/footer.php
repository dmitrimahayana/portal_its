            <footer id="copy" class="row">
                <p class="span3"><a id="sitemap_menu" href="#" title="">Sitemap</a><span class="sitemap_menu-bg"></span></p>
                <div class="span9 rid-gutter alpha">
                    <p id="social-media-links" class="align-right">
                        <a class="icon ir icon-facebook" target="_blank" href="http://www.facebook.com/ITSMediaCenter" title="Facebook">Facebook</a>
                        <a class="icon ir icon-twitter"  target="_blank" href="http://twitter.com/#!/ITSMediaCenter" title="Twitter">Twitter</a>
                        <a class="icon ir icon-youtube"  target="_blank" href="http://www.youtube.com/itseurekatv" title="Youtube">Youtube</a>
                    </p>
                    <p id="copyright" class="align-left">
                        <span>Copyright &copy; Institut Teknologi Sepuluh Nopember</span>
                        <span class="align-right"><?php echo ($lang == 'id' ? 'Oleh' : 'By'); ?> : <a href="javascript:void(0);" title="">Redaksi ITS</a> | <a href="<?php echo base_url(); ?>article/disclaimer/<?php echo $lang; ?>" title="">Disclaimer</a></span>
                    </p>
                </div>
            </footer><!-- footer area -->
        </div>
		<style type="text/css">
			#sitemap .group { margin-bottom: 10px; }
		</style>
        <div class="sitemap-wrap">
			<div id="sitemap" style="display:none">
				<div class="container">
					<div class="octagon2"></div>
					<div class="sitemap-inner clearfix">
						<div class="row">
							<div class="span3">
								<?php
									// Inisialisasi
									$menuNavigasi = array();
									$menuNavigasi[0] = $resultFixed;
									$menuNavigasi[1] = $resultSidebar;
									$menuNavigasi[2] = $resultExtend;
									
									/* edited by Doni Setio Pambudi */
									$allTopParent = 0;
									for($i=0; $i<sizeof($menuNavigasi); $i++){
										foreach ($menuNavigasi[$i] as $row){
											if($row->id_parent == null){
												$allTopParent++;
											}
										}
									}
									$colCount = $allTopParent / 3;
									$indexSitemap = 0;
									/* end editing */
									
									for($i=0; $i<sizeof($menuNavigasi); $i++){
										foreach ($menuNavigasi[$i] as $row){
										if($row->id_parent == null){
											if($indexSitemap > 0 && $indexSitemap % $colCount == 0 && $indexSitemap < $allTopParent-1){
												echo '</div><div class="span3">';
											}
											$indexSitemap++;
								?>
								<div class="group">
									<a href="<?php echo $row->link;?>">
									<?php
										if($row->title!=null or $row->title != '') echo strtoupper($row->title);
										else echo 'HOME';
									?>
									</a>
									<?php 
										/* ui dev v2, edited by Doni Setio Pambudi */
										$childCount = 0;
										foreach ($resultSidebar as $row2){
											if($row2->id_parent != null && $row->id_page != null && $row2->id_parent == $row->id_page ){
												$childCount++;
											}
										}
										if($row->ada != null && $childCount > 0){ /* end edit */ ?>
										<ul>
										<?php
											foreach ($resultSidebar as $row2){
												if($row2->id_parent != null && $row->id_page != null && $row2->id_parent == $row->id_page ){
										?>
										<li>
											<a href="<?php echo $row2->link;?>" title="">
											<?php
												if($row2->title!=null or $row2->title != '') echo ucwords($row2->title);
												else echo 'HOME';
											?>
											</a>
										</li>
									<?php } } ?>
									</ul>
									<?php }?>
								</div>
								<?php } }} ?>
							</div>
							<div class="span3">
								<div class="sitemap_caps group">
									<ul>
										<li><a href="#" title="">Kalender Akademik ITS</a></li>
										<li><a href="#" title="">Fakultas dan Jurusan</a></li>
										<li><a href="#" title="">Seminar dan Konferensi</a></li>
										<li><a href="#" title="">Kegiatan Rutin</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

        <div id="flashnews" <?php echo (count($resultHighlight) > 0 ? '' : 'style="display: none;"' ); ?> >
            <div class="container">
                <div class="main_news">
                    <div class="ticker-left">
                        <btn id="pause" class="ticker-control ir">Pause</btn>
                    </div>
                    <div id="ticker" class="ticker">
                        <ul>
							<?php foreach($resultHighlight as $row){ ?>
                            <li><a href="javascript:void(null);"><?php echo $row->text; ?></a></li>
							<?php } ?>
                        </ul>
                    </div>
                    <div class="ticker-right">
                        <btn id="ticker-prev" class="ticker-control ir">Previous</btn>
                        <btn id="ticker-next" class="ticker-control ir">Next</btn>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.vticker.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.scrollpane.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.cycle2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.cycle2.ie-fade.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/responsive-nav.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.ddslick.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/main.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>themes/tech/custom.js"></script>

		<?php if(isset($this->js) && is_array($this->js)){
				foreach($this->js as $cJs){
		?>
		<script type="text/javascript" src="<?php echo $cJs; ?>"></script>
		<?php }} ?>
		
        <script>
            // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            // g.src='//www.google-analytics.com/ga.js';
            // s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>