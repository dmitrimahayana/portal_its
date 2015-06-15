			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style4.css" />
                        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
                        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.js"></script>
                        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
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
                                window.addEvent("domready", function() {
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
				<!-- Menu interaktif 
				<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider/default/default.css" type="text/css" media="screen" />
				<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
				<div class="ribbon"></div>-->
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
                                              --><div style="font-size: 23px;"><?php echo $row->text; ?></div>
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
				<!--<div>
					<h3 class="color-gray">ITS</h3>
			   	</div>-->
                                <div class="grid_17 bg-white borderless padding-0" id="box-hot-news" style="margin-top: 20px;">
					<?php
					$link_selengkapnya = base_url().'berita/archive/'.$lang;
					?>
					<div /*class="bg-blue-its borderless"*/>
                                          <!--<a class="right /*color-black*/ padding-right-10" style="color: white;" href="<?php echo base_url();?>its_media<?php echo '/'.$lang;?>">ITS Media</a>-->
						<h2 style="text-align: left; margin-left: 10px;color: gray;" class="margin-top-0 margin-bottom-0 box-title">ITS Media</h2>
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
					<div align="right" style="margin-right:30px;margin-top:20px;">
						<a class="color-blue-light" href="http://webbeta.its.ac.id/its_media/id/"> <?php if($lang=='id') echo '>> lihat selengkapnya '; else echo '>> view more at '; ?>
						<img width="32" height="32" src="<?php echo base_url(); ?>files/images/its-media.png"></a>
					</div>
			</div>
			<!-- end container mid -->
			
                        <div class="grid_18 borderless" id="container-kanan" style="margin-right: 15px;float: left;">
			<!-- Menu Agenda -->
			   <div /*class="bg-blue-its borderless"*/style="margin-top: 20px;">
                                          <!--<a class="right /*color-black*/ padding-right-10" style="color: white;" href="<?php echo base_url();?>its_media<?php echo '/'.$lang;?>">ITS Media</a>-->
						<h2 style="text-align: left; margin-left: 20px;color: gray;" class="margin-top-0 margin-bottom-0 box-title">Agenda</h2>
					</div>
                        <div id="box-agenda" class="">
				
				<div>
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
				
			</div>
			<div style="margin-left:20px;margin-top:20px;">
				<a class="left color-blue-light" href="<?php echo base_url();?>agenda/<?php echo $lang;?>" style="padding: 5px 10px 5px 0px;"><?php echo $terms['more']; ?></a>
			</div>
			<div style="margin-left:20px;margin-right:5px;">
				<a class="right color-blue-light" href="<?php echo base_url();?>agenda/<?php echo $lang;?>" style="padding: 5px 10px 5px 0px;"><?php echo $terms['archive']; ?></a>
			</div>
			<!-- End Menu Agenda -->
                        
			<!-- box menu cepat -->
			<!--<h3 class="color-brown" style="padding-left: 20px;"><?php echo $terms['quick-link'];?></h3>
			<div id="box-menu-cepat">
				<div>
					<ul style="font-size: 14px; padding-left: 20px;">
						<?php
							foreach ($resultFast as $row):
						?>
							<li class="/*border-bottom-1-soft*/ height40 padding-0">
								<a href="<?php echo $row->url; ?>" class="transition03" target="_blank" style="position: relative;">
									<?php
										if(!empty($row->link_thumb)):
									?>
									<img src="<?php echo base_url().'files/'.$row->link_thumb;?>" class="left" width="45" height="30" style="padding-top: 5px;" />
									<?php
										else:
									?>
									<img src="<?php echo base_url();?>images/blank.png" class="left icon-menu-stakeholder" />
									<?php
										endif;
									?>
									<span style="position:absolute; top:50%; vertical-align: middle; width:150px; height:40px; padding-top: 3px;"><?php echo $row->text; ?></span>
								</a>
							</li>
						<?php
							endforeach;
						?>
					</ul>
				</div>				
			</div>-->
			<!-- end menu cepat -->
			</div>
			<div class="clear"></div>
			<!--
			<div class="grid_2 margin-left-0 border-1" id="spacer">
			</div>
			--> 
			
			<!-- box riset -->
			<!--
			<div class="grid_6 bg-white margin-left-10 padding-0" id="box-riset">
				<div class="bg-sky-blue border-bottom-1">
					<a class="right color-black" href="<?php echo $link_selengkapnya; ?>" style="padding: 5px 10px 10px 0px;"><?php echo $terms['complete-news'];?></a>
					<h2 style="text-align: left; margin-left: 10px;" class="margin-top-0 margin-bottom-0 box-title"><?php echo $terms['research'];?></h2>
				</div>
				<div id="list-riset" class="height150">
				</div>
			</div>
			<div class="grid_5 bg-white margin-left-10 padding-0" id="box-riset">
				<div class="bg-sky-blue border-bottom-1">
					<a class="right color-black" href="<?php echo $link_selengkapnya; ?>" style="padding: 5px 10px 10px 0px;"><?php echo $terms['complete-news'];?></a>
					<h2 style="text-align: left; margin-left: 10px;" class="margin-top-0 margin-bottom-0 box-title">Teknologi</h2>
				</div>
				<div id="list-riset" class="height150">
				</div>
			</div>
			-->
			<!-- end box riset -->
			<!-- end halaman index -->
			<div class="clear height10"></div>
			<script src="<?php echo base_url(); ?>js/jquery.cycle.all.latest.js" type="text/javascript"></script>
			<!-- sekilas info -->
			<!--<script type="text/javascript">				
			$(document).ready(function() {
				var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.scrollWidth||e.clientWidth||g.clientWidth,y=w.scrollHeight||e.clientHeight||g.clientHeight;
				var batas = y-25;
				if($('body').height()>$(document).height()) {batas = batas-25;}
				$("div#sekilas-info span").css("color", "#F00");
				$("div#sekilas-info").css("background-color","#FFF");
				$("div#sekilas-info").css("margin-top", batas);
				$("div#sekilas-info span").css("font-size", y/40+"px");
				$(window).resize(function() {
					var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.scrollWidth||e.clientWidth||g.clientWidth,y=w.scrollHeight||e.clientHeight||g.clientHeight;
					var batas = y-25;
					if($('body').height()>$(document).height()) {batas = batas-25;}
					$("div#sekilas-info").css("margin-top", batas);
				});
			});
			</script>-->
			<!--<div style="position: fixed; top: 0px;">
				<div id="sekilas-info">
					<?php
						foreach($resultHighlight as $row):
					?>
					<span class="marquee right">
					<?php echo $row->text; ?>
					</span>
					<?php
						endforeach;
					?>
				</div>
			</div>-->
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
