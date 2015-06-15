	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/quicklink_search_extension'); ?>
		<div class="slider clearfix">
			<div id="top-slider" class="cycle-slideshow" 
				data-cycle-manual-fx="scrollHorz"
				data-cycle-fx="fade"
				data-cycle-random="true"
				data-cycle-slides="> div"
				data-cycle-timeout="5000"
				data-cycle-pager-template="<a href=#> {{slideNum}} </a>"
				>
				<!-- prev/next links -->
				<span class="cycle-pager"></span>
				<span class="cycle-nav cycle-prev"></span>
				<span class="cycle-nav cycle-next"></span>
				<?php $num = 1; foreach ($resultInteractive as $row){ if($num++ > $jumlahSlideshow) break; ?>
				<div class="slideritem">
					<div class="slider-inner">
						<a href="<?php echo $row->url; ?>"><img src="<?php echo base_url(); ?>files/<?php echo $row->link_image; ?>" data-thumb="<?php echo base_url(); ?>files/<?php echo $row->link_thumb; ?>"></a>
						<div class="article-preview">
							<h4>
							<?php 
								$batas = 40;
								if(strlen($row->text) <= $batas) echo ucfirst($row->text);
								else echo substr(ucfirst($row->text), 0, $batas).'...';
							?>
							</h4>
							<p>
								<?php
									$batas2 = 144;
									if($lang === "id"){
										if(strlen($row->deskripsi) <= $batas2) echo ucfirst($row->deskripsi);
										else echo substr(ucfirst($row->deskripsi), 0, $batas2).'...';
									}
									else{
										if(strlen($row->deskripsi_en) <= $batas2) echo ucfirst($row->deskripsi_en);
										else echo substr(ucfirst($row->deskripsi_en), 0, $batas2).'...';
									}
								?>
								<a href="<?php echo $row->url; ?>">read more...</a>
							</p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div><!-- row for nav+banner area -->
</div>
<div id="media" class="row">
	<div class="span10 clearfix">
		<!--<style type="text/css">
			.topic-sub-title a { color: #007dc5!important; }
		</style>-->
		<section id="mediacenter" class="align-right">
			<header class="divider2">
				<nav class="align-right">
					<a href="<?php echo base_url();?>its_media/<?php echo $lang; ?>" style="font-size: 28px!important;">+</a>
				</nav>
				<h5 class="topic-sub-title"><a href="<?php echo base_url(); ?>its_media/<?php echo $lang; ?>">ITS Media Center</a></h5>
			</header>
			<div class="row-per clearfix">
				<?php
					$resultNews = $resultNews[0];
					$resultOpini = $resultOpini[0];
					$resultProfil = $resultProfil[0];
					$resultEureka = $resultEureka[0];
				?>
				<div class="per3">
					<figure>
						<a href="<?php echo base_url(); ?>berita/<?php echo $resultNews->newsid.'/'.$lang; ?>" title=""><img src="data:image/jpg;base64,<?php echo $resultNews->newspict;?>" alt="news thumbnail"></a>
						<figcaption><?php echo $terms['news']; ?></figcaption>
					</figure>
					<a href="<?php echo base_url(); ?>berita/<?php echo $resultNews->newsid.'/'.$lang; ?>"><?php echo $resultNews->newstitle;?></a>
				</div>
				<div class="per3">
					<figure>
						<a href="<?php echo base_url(); ?>berita/<?php echo $resultProfil->newsid.'/'.$lang; ?>" title=""><img src="data:image/jpg;base64,<?php echo $resultProfil->newspict;?>" alt="news thumbnail"></a>
						<figcaption><?php echo $terms['profile']; ?></figcaption>
					</figure>
					<a href="<?php echo base_url(); ?>berita/<?php echo $resultProfil->newsid.'/'.$lang; ?>"><?php echo $resultProfil->newstitle;?></a>
				</div>
				<div class="per3">
					<figure>
						<a href="javascript:void(0);" onclick="openYouTube('<?php echo $resultEureka->youtube_id; ?>')" title=""><img src="http://img.youtube.com/vi/<?php echo $resultEureka->youtube_id; ?>/0.jpg" alt="eureka thumbnail"></a>
						<figcaption><?php echo $terms['eureka-tv']; ?></figcaption>
					</figure>
					<a href="javascript:void(0);" onclick="openYouTube('<?php echo $resultEureka->youtube_id; ?>')" title=""><?php echo $resultEureka->title; ?></a>
				</div>
				<div id="bg" class="popup_bg"></div>
			</div>
			<footer></footer>
		</section>
		<section id="pengumuman" class="align-left">
			<header class="divider2">
				<nav class="align-right">
					<a href="<?php echo base_url();?>pengumuman/<?php echo $lang;?>" class="archive" title="archive"></a>
				</nav>
				<h5 class="topic-sub-title"><a href="<?php echo base_url();?>pengumuman/<?php echo $lang;?>"><?php echo $terms['pengumuman'];?></a></h5>
			</header>
			<div id="scrollarea1" class="scroll-pane media-in">
				<ul>
					<?php foreach ($pengumuman as $row){ ?>
					<li><a href="<?php if($row->jenis=='file') echo base_url().$row->url; else if($row->jenis=='article') echo $row->url.'/'.$lang; else echo $row->url; ?>"><?php echo ($lang == 'id' ? $row->indonesia : $row->inggris); ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<footer></footer>
		</section>
	</div>
	<div class="span2 rid-gutter alpha">
		<header class="divider2">
			<nav class="align-right">
				<a href="<?php echo base_url(); ?>agenda/<?php echo $lang; ?>" class="archive" title="archive"></a>
			</nav>
			<h5 class="topic-sub-title"><a href="<?php echo base_url();?>agenda/<?php echo $lang;?>" title="">Agenda</a></h5>
		</header>
		<div id="scrollarea2" class="scroll-pane media-in">
			<?php if($resultActivities != null){ ?>
			<ul>
				<?php
				for ($i = 0; $i < sizeof($resultActivities); $i++){
					$row = $resultActivities[$i];
				?>
				<li>
					<a href="#" title="">
						<strong><?php echo $row->acttanggal;?></strong><br>
						<?php echo $row->actnama;?>
					</a>
				</li>
				<?php } ?>
			</ul>
			<?php }else{ ?>
			<h4><?php echo $terms['no-recent-activity'];?></h4>
			<?php } ?>
		</div>
		<footer></footer>
	</div>
</div><!-- row for media+pengumuman area -->