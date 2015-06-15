<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="<?php echo $lang; ?>" />
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/icon/favicon.ico"> 
	<meta name="description" content="Institut Teknologi Sepuluh Nopember (ITS) Surabaya" />
	<meta name="keywords" content="ITS Institut Teknologi Sepuluh Nopember Surabaya Jawa Timur Indonesia East Java Indonesian Institute Technology" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="revisit-after" content="15 days" />	
	
	<link href="<?php echo base_url(); ?>css/style-class.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-id.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-html.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-navtop.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-bahasa.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-agenda.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-berita.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-menu-sidebar.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-menu-interaktif.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/style-new1.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url(); ?>css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />

        <link href='http://fonts.googleapis.com/css?family=Basic' rel='stylesheet' type='text/css'>
            <style>
              body {
                font-family: 'Basic', sans-serif;
              }
            </style>

        <script src="<?php echo base_url(); ?>js/jquery.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/script.js" language="javascript" type="text/javascript"></script>
        
	<script src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	function hide_all() {
		// Sembunyikan semua child
		$('ul.menu-sidebar ul').hide();
		$('ul.menu-sidebar ul ul').hide();
	}
	function initMenu() {
		hide_all();
		$('ul.menu-sidebar li a').click(function() {
			var checkElement = $(this).next();
				if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                    // Bila elemen sudah aktif, maka toggle elemen tersebut
                                    checkElement.toggle();
                                    return false;
                                }
                                if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                    // Bila elemen belum aktif, maka toggle elemen tersebut
                                    hide_all();
                                    $('ul.menu-sidebar ul ul:visible').toggle
                                    checkElement.toggle();
                                    if($(this).children('ul').length > 0){
                                    return false;
				}
			}
		});
        }
	$(document).ready(function() {
		initMenu();
	});
	</script>
	<!--<script type="text/javascript">
	<!--
	// x: get the width of window
	// y: get the height of window
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	(function($) {
		$.fn.hasScrollBar = function() {
			return this.get(0).scrollHeight > this.height();
		}
	})(jQuery);
	</script>-->
	<?php
		if(isset($page) and $page=='index'):
	?>
	
	<?php
		endif;
	?>
</head>

<body>
<div class="container bg-white" id="body-container">
	<div class="container" id="main">
        <div class="container" id="banner">
            <div class="column left" id="logo-its" style="margin-top: 50px;">
				<div id="logo-box">
					<img src="<?php echo base_url(); ?>images/assets/logo_ITS.png" />
				</div>
			</div>
			<div class="column right" id="language-container">
                            <ul id="language-menu" style="margin-top: 90px;">
					<!-- Language menu -->						
					<?php
						foreach ($resultLanguage as $row):
					?>
					<li class="lang-list" id="lang-<?php echo $row->lang;?>">
						<a href="<?php echo $row->link; ?>" title="<?php echo ucfirst($row->name); ?>">
							<img src="<?php echo base_url().'images/'.$row->lang.'.gif'; ?>" height="18px" width="25"/>
						</a>
					</li>
					<?php
						endforeach;
					?>
				</ul>
			</div>
			<div class="clear-right"></div>
		</div>
		<!--end banner-->
                <div id="nav-top" style="margin-right: 30px;">
                    <div class="right" id="searchbox-container" style="margin-top: -7px;">
				<form action="<?php echo base_url(); ?>pencarian/<?php echo $lang ?>" method="get" name="realm">
					<input id="keyword" class="search-back" name="keyword" type="text" placeholder="<?php echo $terms['search'];?>" value=""  />
					<input id="search-button" class="hide" type="submit" value="<?php echo $terms['search'];?>" />
				</form>
			</div>
		</div>
                
                <script src="<?php echo base_url(); ?>js/jquery.cycle.all.latest.js" type="text/javascript"></script>
                
                <div style="z-index: 0px;position: relative; top: -82px;height: 80px;width: 810px;margin-left: 245px;color: blue;font-size: 12pt;float: left;">
                    <?php if($this->uri->segment(1)=="index"): ?>
                    <div id="box-menu-cepat">
                        <div>
                            <ul style="font-size: 14px; padding-left: 20px;">
                                <?php
                                    $countLink=0;
                                    foreach ($resultFast as $row): $countLink++;
                                        if ($countLink<=5):
                                ?>
                                <li class="/*border-bottom-1-soft*/ height100 padding-right-10" style="float: left;">
                                        <a href="<?php echo $row->url; ?>" class="transition03" target="_blank" style="position: relative;">
                                            <?php
                                                    if(!empty($row->link_thumb)):
                                            ?>
                                            <img alt="<?php echo $row->text; ?>" src="<?php echo base_url().'files/'.$row->link_thumb;?>" class="left" width="80" height="55" style="padding-top: 5px;" />
                                            <?php
                                                    else:
                                            ?>
                                            <img src="<?php echo base_url();?>images/blank.png" class="left icon-menu-stakeholder" />
                                            <?php
                                                    endif;
                                            ?>
                                            <!--<span style="position:absolute; top:50%; vertical-align: middle; width:150px; height:40px; padding-top: 3px;"><?php echo $row->text; ?></span>
                                            -->
                                         </a>
                                    </li>
                                <?php
                                        endif;
                                    endforeach;
                                ?>
                            </ul>
                        </div>				
                    </div>
                <?php endif; ?>
                </div>
                
                <div style="z-index: 0px;position: relative; top: -80px;width: 650px;margin-left: 265px;color: blue;font-size: 12pt;float: left;">
                    <?php if($this->uri->segment(1)=="index"): ?>
                    <!--sekilas info-->
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
                <?php endif; ?>
                </div>
                
		<div class="grid_2 margin-left-0 borderless" style="margin-top: -10px;">
			<?php
			$this->load->view('pages/sidebar_extension_all');
                         if($this->uri->segment(1)=="index"):
			?>
                    <div id="video_slide" style="background: #0088cc;width: 180px;height: 130px;margin-left: 50px;margin-top: 75px;">
                        Video
                    </div>
                    <div id="video_slide" style="background: #0088cc;width: 180px;height: 130px;margin-left: 50px;margin-top: 35px;">
                        Slide Profil
                    </div>
			<?php
                        endif;
                        //catatan sukolilo
			/*if(isset($page) and $page=='index'):
				$this->load->view('pages/sidebar_extension_index');
			endif;*/
			?>
		</div>
		<!--end menu sidebar-->
		<div class="borderless" id="box-all-content">
			