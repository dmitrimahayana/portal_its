	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0 align-left"><img src="<?php echo base_url(); ?>images/logo-its-media-center-tech.png" style="margin-right: 20px">ITS Media Center</h1>
			<section class="main-list list-media-online">
				<header class="divider2">
					<nav class="align-right">
						<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="archive" title=""></a>
					</nav>
					<h5 class="topic-sub-title">ITS Online</h5>
				</header><!-- /header -->
				<div class="row clearfix">
					<div class="list-item list-media-online">
						<ul>
							<?php if($resultNews != null && count($resultNews) > 0){ $fNews = $resultNews[0]; ?>
							<li>
								<a href="<?php echo base_url(); ?>berita/<?php echo $fNews->newsid.'/'.$lang; ?>" title="">
									<figure>
										<img src="data:image/jpg;base64,<?php echo $fNews->newspict;?>" alt="">
									</figure>
								</a>
								<div class="item-desc">
									<small>
										<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="section_title">
											<?php echo $terms['news']; ?>
										</a>
										<br/>
										<time class="post-time">
											<?php
												$newsDate = strtotime($fNews->newslastupdate);
												echo date("d F Y | H.i", $newsDate) . " WIB";
											?>
										</time>
									</small>
									<br/>
									<a href="<?php echo base_url(); ?>berita/<?php echo $fNews->newsid.'/'.$lang; ?>" class="news_title">
										<?php echo $fNews->newstitle;?>
									</a>
								</div> 
							</li>
							<?php } if($resultNews != null && count($resultNews) > 1){ $fNews = $resultNews[1]; ?>
							<li>
								<a href="<?php echo base_url(); ?>berita/<?php echo $fNews->newsid.'/'.$lang; ?>" title="">
									<figure>
										<img src="data:image/jpg;base64,<?php echo $fNews->newspict;?>" alt="">
									</figure>
								</a>
								<div class="item-desc">
									<small>
										<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="section_title">
											<?php echo $terms['news']; ?>
										</a>
										<br/>
										<time class="post-time">
											<?php
												$newsDate = strtotime($fNews->newslastupdate);
												echo date("d F Y | H.i", $newsDate) . " WIB";
											?>
										</time>
									</small>
									<br/>
									<a href="<?php echo base_url(); ?>berita/<?php echo $fNews->newsid.'/'.$lang; ?>" class="news_title">
										<?php echo $fNews->newstitle;?>
									</a>
								</div> 
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="list-item list-media-online-more">
						<ul>
							<?php $num = 1; foreach($resultNews as $cNews){ if($num++ > 5) break;  ?>
							<li class="clearfix">
								<div class="span5">
									<img src="data:image/jpg;base64,<?php echo $cNews->newspict;?>" alt="" style="width: 100%;">
								</div>
								<div class="span7">
									<a href="<?php echo base_url(); ?>berita/<?php echo $cNews->newsid.'/'.$lang; ?>" title="<?php echo $cNews->newstitle;?>" class="small_news_title">
										<?php echo $cNews->newstitle;?>
									</a>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url(); ?>its_tv/<?php echo $lang; ?>" class="archive" title="ITS TV"></a>
							</nav>
							<h5 class="topic-sub-title">ITS TV</h5>
						</header><!-- /header -->
						<div class="tv-list">
							<ul>
								<?php foreach($resultEureka as $cEureka){ ?>
								<li style="height:182px; width:20%; list-style: none;">
									<a href="javascript:void(0);" onclick="openYouTube('<?php echo $cEureka->youtube_id; ?>')" title="">
										<figure>
											<div class="img">
												<img src="https://img.youtube.com/vi/<?php echo $cEureka->youtube_id; ?>/default.jpg" alt="" width="146" height="110">
											</div>
											<figcaption class="small_title"><?php echo $cEureka->title; ?></figcaption>
										</figure>
									</a>
								</li>
								<?php } ?>
							</ul>
							<div id="bg" class="popup_bg"></div>
						</div>
					</div>
				</div>
			</section>
			
			<!-- OLD ITS TV
			<section class="main-list list-media">
				<div class="row clearfix">
					<div class="list-item list-media-its-tv">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php /* echo base_url(); ?>its_tv/<?php echo $lang; ?>" class="archive" title="ITS TV"></a>
							</nav>
							<h5 class="topic-sub-title">ITS TV</h5>
						</header>
						<div class="tv-list">
							<ul>
								<?php foreach($resultEureka as $cEureka){ ?>
								<li style="height:182px;">
									<a href="javascript:void(0);" onclick="openYouTube('<?php echo $cEureka->youtube_id; ?>')" title="">
										<figure>
											<div class="img">
												<img src="https://img.youtube.com/vi/<?php echo $cEureka->youtube_id; ?>/default.jpg" alt="" width="146" height="110">
											</div>
											<figcaption class="small_title"><?php echo $cEureka->title; ?></figcaption>
										</figure>
									</a>
								</li>
								<?php } ?>
							</ul>
							<div id="bg" class="popup_bg"></div>
						</div>
					</div>
					<!--
					<div class="list-item list-media-prestasi">
						<header class="divider2">
							<h5 class="topic-sub-title">Flash News</h5>
						</header>						
						<ul>
							<?php $num = 1; foreach($resultHighlight as $cHighlight){ if($num++ > 5) break; ?>
							<li>
								<a href="javascript:void(0);" title="flashnews" class="small_title">
									<?php echo $cHighlight->text;?>
								</a>
							</li>
							<?php } */?>
						</ul>
					</div>
				</div>
			</section>			
			-->
			
			<section class="list-media-all-press">
				<div class="row">
					<div class="list-item span3">                                    
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="archive" title=""></a>
							</nav>
							<h5 class="topic-sub-title"><?php echo $terms['profile']; ?></h5>
						</header><!-- /header -->
						<ul>
							<?php $num=1;foreach($resultProfil as $cProfil){ if($num++>5) break; ?>
							<li>
								<?php if($num == 2){ ?>
								<img src="data:image/jpg;base64,<?php echo $cProfil->newspict;?>" alt="" style="width: 100%;">
								<?php } ?>
								<a href="<?php echo base_url(); ?>berita/<?php echo $cProfil->newsid.'/'.$lang; ?>" title="<?php echo $cProfil->newstitle;?>" class="small_title">
									<?php echo $cProfil->newstitle;?>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="list-item span3">                                    
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="archive" title=""></a>
							</nav>
							<h5 class="topic-sub-title"><?php echo $terms['opinion']; ?></h5>
						</header><!-- /header -->
						<ul>
							<?php $num=1;foreach($resultOpini as $cOpini){ if($num++>5) break; ?>
							<li>
								<?php if($num == 2){ ?>
								<img src="data:image/jpg;base64,<?php echo $cOpini->newspict;?>" alt="" style="width: 100%;">
								<?php } ?>
								<a href="<?php echo base_url(); ?>berita/<?php echo $cOpini->newsid.'/'.$lang; ?>" title="<?php echo $cOpini->newstitle;?>" class="small_title">
									<?php echo $cOpini->newstitle;?>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="list-item span3">                                    
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="archive" title=""></a>
							</nav>
							<h5 class="topic-sub-title"><?php echo $terms['editorial']; ?></h5>
						</header><!-- /header -->
						<ul>
							<?php $num=1;foreach($resultEditorial as $cEditorial){if($num++>5) break; ?>
							<li>
								<?php if($num == 2){ ?>
								<img src="data:image/jpg;base64,<?php echo $cEditorial->newspict;?>" alt="" style="width: 100%;">
								<?php } ?>
								<a href="<?php echo base_url(); ?>berita/<?php echo $cEditorial->newsid.'/'.$lang; ?>" title="<?php echo $cEditorial->newstitle;?>" class="small_title">
									<?php echo $cEditorial->newstitle;?>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url();?>beranda/<?php echo $lang;?>" class="archive" title="archive"></a>
							</nav>
							<h5 class="topic-sub-title">Beranda</h5>
						</header><!-- /header -->
						<div class="row">
							<?php foreach($resultBeranda as $cBeranda){ ?>
							<div class="list-item list-media-press">                                        
								<figure>
									<a href="<?php echo $cBeranda->link; ?>" title="">
										<img src="<?php echo base_url().'files/'.$cBeranda->file_image; ?>" alt="">
									</a>
								</figure>
								<nav class="hidenav">
									<ul>
										<li><a href="<?php echo $cBeranda->link; ?>" title="Download"><?php echo $cBeranda->title; ?></a></li>
									</ul>
								</nav>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url();?>its_point/<?php echo $lang;?>" class="archive" title="archive"></a>
							</nav>
							<h5 class="topic-sub-title">ITS POINT</h5>
						</header><!-- /header -->
						<div class="row">
							<?php foreach($resultItsPoint as $cItsPoint){ ?>
							<div class="list-item list-media-press">                                        
								<figure>
									<a href="<?php echo $cItsPoint->link; ?>" title="">
										<img src="<?php echo base_url().'files/'.$cItsPoint->file_image; ?>" alt="">
									</a>
								</figure>
								<nav class="hidenav">
									<ul>
										<li><a href="<?php echo $cItsPoint->link; ?>" title="Download"><?php echo $cItsPoint->title; ?></a></li>
									</ul>
								</nav>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url();?>y_its/<?php echo $lang;?>" class="archive" title="archive"></a>
							</nav>
							<h5 class="topic-sub-title">Y-ITS</h5>
						</header><!-- /header -->
						<div class="row">
							<?php foreach($resultYIts as $cYIts){ ?>
							<div class="list-item list-media-press">                                        
								<figure>
									<a href="<?php echo $cYIts->link; ?>" title="">
										<img src="<?php echo base_url().'files/'.$cYIts->file_image; ?>" alt="">
									</a>
								</figure>
								<nav class="hidenav">
									<ul>
										<li><a href="<?php echo $cYIts->link; ?>" title="Download"><?php echo $cYIts->title; ?></a></li>
									</ul>
								</nav>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url();?>klipping/<?php echo $lang;?>" class="archive" title="archive"></a>
							</nav>
							<h5 class="topic-sub-title">Klipping</h5>
						</header><!-- /header -->
						<div class="row">
							<?php $num = 1; foreach($resultKlipping as $cKlipping){ if($num++ > 4) break; ?>
							<div class="list-item list-media-press">                                        
								<figure>
									<a href="<?php echo $cKlipping->link; ?>" title="Download Klipping">
										<img src="<?php echo base_url().'files/'.$cKlipping->file_image; ?>" alt="">
									</a>
								</figure>
								<nav class="hidenav">
									<ul>
										<li><a href="<?php echo $cKlipping->link; ?>" title="Download"><?php echo $cKlipping->title; ?></a></li>
									</ul>
								</nav>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="main-list media-press clearfix">
				<div class="row">
					<div class="span12">
						<header class="divider2">
							<nav class="align-right">
								<a href="<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>" class="archive" title=""></a>
							</nav>
							<h5 class="topic-sub-title"><?php echo $terms['other-media']; ?></h5>
						</header><!-- /header -->
						<section class="alt-list list-arsip">
							<div class="clearfix">
								<ul style="list-style: none outside none;">
									<li>
									<?php $num = 1; foreach($resultMediaLain as $cMedia){ if($num++ > 4) break; ?>
										<a href="<?php echo base_url(); ?>berita/<?php echo $cMedia->newsid.'/'.$lang; ?>" title="<?php echo $cMedia->newstitle;?>">
											<time>
												<?php echo $cMedia->newsplace;?>
											</time>
											<h3><?php echo $cMedia->newstitle;?></h3>
										</a>
									<?php } ?>
									</li>
								</ul>
							</div>
							<footer>
							</footer>
						</section>						
						<!--
						<div class="row">
							<?php /* $num = 1; foreach($resultMediaLain as $cMedia){ if($num++ > 4) break; ?>
							<div class="list-item list-media-press">                                        
								<figure>
									<a href="<?php echo base_url(); ?>berita/<?php echo $cMedia->newsid.'/'.$lang; ?>" title="<?php echo $cMedia->newstitle;?>" class="small_title">
										<img src="data:image/jpg;base64,<?php echo $cMedia->newspict;?>" alt="" style="width: 100%;">
									</a>
								</figure>
								<nav class="hidenav">
									<ul>
										<li>
											<a href="<?php echo base_url(); ?>berita/<?php echo $cMedia->newsid.'/'.$lang; ?>" title="<?php echo $cMedia->newstitle;?>" class="small_title">
												<?php echo $cMedia->newstitle;?>
											</a>
										</li>
									</ul>
								</nav>
							</div>
							<?php }*/ ?>
						</div>
						-->
					</div>
				</div>
			</section>
		</div>
	</div><!-- row for nav+banner area -->
</div>