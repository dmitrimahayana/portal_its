                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style4.css" />
                <script type="text/javascript">
                        $(document).ready( function(){	
                                // buttons for next and previous item						 
                                var buttons = { previous:$('#jslidernews1 .button-previous') ,
                                                next:$('#jslidernews1 .button-next') };
                                $obj = $('#jslidernews1').lofJSidernews( { 
                                                    interval : 4000,
                                                    easing          : 'easeInOutQuad',
                                                    duration        : 1200,
                                                    auto            : true,
                                                    maxItemDisplay  : 5,
                                                    //startItem:1,
                                                    navPosition     : 'horizontal', // horizontal
                                                    navigatorHeight : null,
                                                    navigatorWidth  : null,
                                                    mainWidth       :650,
                                                    buttons         :buttons
                                                    } );		
                        });
                       </script>
                        <script>
                            function show_trans(){
                                $(".bg-info3-transparant").animate({ opacity: 0 }, 800);
                            }
                            $(function() {
                                $('.bg-info3-transparant').each(function() {
                                    $(this).hover(
                                        function() {
                                            $(this).stop().animate({ opacity: 1 }, 800);
                                        },
                                       function() {
                                           $(this).stop().animate({ opacity: 0 }, 800);
                                       })
                                    });
                            show_trans()});
                        </script>
                        
                        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/all.css" />
                        <script type="text/javascript" src="<?php echo base_url(); ?>js/mootools-core-1.4.5-full-nocompat-yc.js"></script>
                        <script type="text/javascript" src="<?php echo base_url(); ?>js/slideGallery.js"></script>
                        <script type="text/javascript">
                                window.addEventListener("domready", function() {
                                        /* Example 9 */
                                        var gallery9 = new slideGallery($$("div.gallery"), {
                                                steps: 1,
                                                mode: "circle",
                                                current: 4,
                                                speed: 0
                                        });
                                });
                        </script>
                        <!-- container mid -->
                        <div class="grid_12 borderless padding-0" id="container-mid" style="margin-top: -110px;">
				<?php //if($resultInteractive != null): ?>
                                <div id="jslidernews1" class="lof-slidecontent" style="width:700px; height:380px;">
                                <div class="main-slider-content" style="width:700px; height:380px;">
                                    <ul class="sliders-wrap-inner">
                                        <?php
							foreach ($resultInteractive as $row):
                                                    ?>
                                        <li>
                                          <img src="<?php echo base_url(); ?>files/<?php echo $row->link_image; ?>" title="Newsflash 2" data-thumb="<?php echo base_url(); ?>files/<?php echo $row->link_thumb; ?>" width="650" height="420"/>          
                                          <div class="slider-description" >
                                              <!--<div class="slider-meta"><a target="_parent" title="Newsflash 8" href="#">/ Newsflash 8 /</a>	<i> â Monday, February 15, 2010 12:42</i></div>
                                              --><div style="font-size: 23px;">
                                                <a title="<?php echo $row->text; ?>" href="<?php echo $row->url; ?>"><?php 
                                                        $batas = 40;
                                                        if(strlen($row->text) <= $batas):
                                                                echo ucfirst($row->text);
                                                        else:
                                                                echo substr(ucfirst($row->text), 0, $batas).'...';
                                                        endif;
                                                ?></a>
                                              </div>
                                              <a style="font-size: 15px;" target="_blank">
                                                  <?php 
                                                        $batas2 = 80;
                                                        if(strlen($row->deskripsi) <= $batas2):
                                                                echo ucfirst($row->deskripsi);
                                                        else:
                                                                echo substr(ucfirst($row->deskripsi), 0, $batas2).'...';
                                                        endif;
                                                ?>
                                                </a>
                                                    <a class="readmore" href="<?php echo $row->url; ?>" style="font-size: 15px;" target="_blank">Read more </a>
                                                </p>
                                             </div>
                                        </li>
                                        <?php
							endforeach;
						?>
                                      </ul>  	
                                </div>
                                <div class="navigator-content">
                                      <div class="button-control"><span></span></div>	
                                      <div class="navigator-wrapper">
                                            <ul class="navigator-wrap-inner">
                                                <?php
                                                        $count=0;
                                                        foreach ($resultInteractive as $row):
                                                        $count++;
                                                ?>
                                               <li><span><?php echo $count; ?></span></li>
                                                <?php 
                                                    endforeach;
                                                ?>                                               
                                            </ul>
                                      </div>
                                 </div>
                                </div>
                        </div>
                                <div style="margin-bottom: 140px;"></div>
                                <!--        
                                <?php
                                        foreach ($resultFast as $row):
                                ?>
                                        <div class="logoMacam-macam">
                                                <a href="<?php echo $row->url; ?>" class="transition03" target="_blank" style="position: relative;">
                                                        <?php
                                                                if(!empty($row->link_thumb)):
                                                        ?>
                                                        <img src="<?php echo base_url().'files/'.$row->link_thumb;?>" class="left" width="74" height="74" />
                                                        <?php
                                                                else:
                                                        ?>
                                                        <img src="<?php echo base_url();?>images/blank.png" class="left icon-menu-stakeholder" />
                                                        <?php
                                                                endif;
                                                        ?>
                                                </a>
                                        </div>
                                <?php
                                        endforeach;
                                ?>
                                -->
				<!--</div>-->
				<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.nivo.slider.pack.js"></script>
				<script type="text/javascript">
				$(window).load(function() {
					$('div.nivoSlider').nivoSlider({
						// controlNavThumbs: true
					});
				});
				</script>
				<?php //endif; ?>
                                
                                
				<!--end menu interaktif-->
				
				<!-- Box berita terkini -->
           <div class="grid_17 bg-white borderless padding-0" id="box-hot-news" style="margin-top: 20px;">
                <?php
					$link_selengkapnya = base_url().'berita/archive/'.$lang;
					?>
				<div>
				    <h2 style="text-align: left; margin-left: 10px;color: gray;" class="margin-top-0 margin-bottom-0 box-title"><?php if($lang=='id') echo 'ITS Media Center'; else echo 'ITS Media Center'; ?></h2>
				</div>
				<div style="margin-left: 5px; margin-top:5px;margin-bottom:0px;color: gray">	
					<table width="440">
						<td align="center" width="120"><?php if($lang=='id') echo 'Berita'; else echo 'News'; ?></td>
						<td align="center" width="160"><?php if($lang=='id') echo 'Opini'; else echo 'Opinion'; ?></td>
						<td align="center" width="120"><?php if($lang=='id') echo 'Profil'; else echo 'Profile'; ?></td>
					</table>
				</div>
				<div id="list-hot-news" class="height180">
					 <?php
						 $data['hasil'] = $resultNews;
						 $data['jumlah'] = 1;
						 $this->load->view('pages/outlines/berita_index', $data);
					 ?>
					 <?php
						 $data['hasil'] = $resultOpini;
						 $data['jumlah'] = 1;
						 $this->load->view('pages/outlines/berita_index', $data);
					 ?>
					 <?php
						 $data['hasil'] = $resultProfil;
						 $data['jumlah'] = 1;
						 $this->load->view('pages/outlines/berita_index', $data);
					 ?>
				</div>
                                    <!-- end box berita terkini -->
				<div align="right" style="height: 50px;margin-right:30px;margin-top:215px;">
                                  <div style="padding-bottom:10px;width: 100%;border: 0; border-top: 1px solid #ccc;"></div>
					<a style="" class="color-blue-light" href="<?php echo base_url(); ?>its_media/id/"> <?php if($lang=='id') echo '>> lihat selengkapnya '; else echo '>> view more at '; ?></a>
			    		<img style="margin-top:-50px;" width="32" height="25" src="<?php echo base_url(); ?>files/images/its-media.png">
				</div>
			</div>
			<!-- end container mid -->
			
            <div class="grid_18 borderless" id="container-kanan" style="margin-right: 15px;float: left; margin-top: 0px;">
				<!-- Menu Agenda -->
				<div /*class="bg-blue-its borderless"*/style="margin-top: 20px;">
					<h2 style="text-align: left; margin-left: 10px;color: gray;" class="margin-top-0 margin-bottom-0 box-title">Agenda</h2>
				</div>
				<div class="scroll-pane jspScrollable" style="overflow: hidden;padding: 0px;width: 180px; margin-top: 0px;" tabindex="0">
								<?php
									if($resultActivities != null):
								?>
								<ul class="list-agenda">
									<?php
										for ($i = 0; $i < sizeof($resultActivities); $i++):
											$row = $resultActivities[$i];
									?>
										<li>
											<!-- baca aktivitas dua dua, kalo cuman 1 berarti yang kedua null -->
											<div class="agenda">
												<span><?php echo $row->actnama;?></span><br/>
												<?php echo $terms['date']; ?>: <?php echo $row->acttanggal;?><br/>
												<?php echo $terms['place']; ?>: <?php echo $row->acttempat;?>
											</div>
										</li>
									<?php
										endfor;
									?>							
								</ul>
								<?php
									else:
								?>
								<h4><?php echo $terms['no-recent-activity'];?></h4>
								<?php
									endif;
								?>
				</div>
                            <div style="margin-top:35px;width: 100%;border: 0; border-top: 1px solid #ccc;width:95%;"></div>
				<div style="margin-left:20px;margin-right:5px;">
					<a class="right color-blue-light" href="<?php echo base_url();?>agenda/<?php echo $lang;?>" style="padding: 10px 10px 5px 0px;"><?php if($lang=='en') echo 'Agenda ';?><?php echo $terms['archive']; ?> <?php if($lang=='id') echo 'Agenda';?></a>
				</div>
				
				
				<!-- End Menu Agenda -->
                        
			</div>
			<div class="clear"></div>
			
			<!-- end halaman index -->
			<div class="clear height10"></div>
			<script src="<?php echo base_url(); ?>js/jquery.cycle.all.latest.js" type="text/javascript"></script>
			<!-- sekilas info -->
			
			<script type="text/javascript">
				// JQueryUI Function
				$(document).ready(function(){
					// Cycle sekilas info
					$('div#sekilas-info').cycle({
						fx: 'scrollRight', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
						speed:  '8000', 
						timeout: 10000, 
					});
				});
			</script>
			<!-- end sekilas info -->
		<div class="clear"></div>		
