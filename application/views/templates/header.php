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
	<link href="<?php echo base_url(); ?>css/jScrollPane.css" rel="stylesheet" type="text/css" media="all" />

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
            <style>
              body {
                font-family: 'Source+Sans+Pro', sans-serif;
              }
a.ex2{
    color:grey;
}

a.ex2:hover{
color:#0082C6;
}
            </style>
		<style id="page-css" type="text/css">
			.scroll-pane
			{
				width: 100%;
				height: 200px;
				overflow: auto;
			}
		</style>
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url(); ?>js/jquery.js" language="javascript" type="text/javascript"></script>
        
	<script src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.easing.js" language="javascript" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/script.js" language="javascript" type="text/javascript"></script>

	<!-- untuk scrollbar cantik -->
	<script src="<?php echo base_url(); ?>js/jScrollPane.js" language="javascript" type="text/javascript"></script>
	
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
                                }
                                if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                    // Bila elemen belum aktif, maka toggle elemen tersebut
                                    hide_all();
                                    $('ul.menu-sidebar ul ul:visible').toggle
                                    checkElement.toggle();
                                    if($(this).children('ul').length > 0){  
				}
			}
                     if (this.getAttribute('href')=='#') 
                            return false;
		}); 
    }
	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
	
	$(document).ready(function() {
		initMenu();
	});
	</script>
	<?php
		if(isset($page) and $page=='index'):
	?>
	
	<?php
		endif;
	?>
</head>
<body>
<div class="container  bg-white" id="body-container">
	<div class="container" id="main">
        <div class="container" id="banner">
            <div class="column left" id="logo-its" style="margin-top: 50px;">
				<div id="logo-box">
					<img src="<?php echo base_url(); ?>images/assets/logo_ITS.png" />
				</div>
			</div>
            <div class="column right" id="language-container" style="z-index: 20;">
                            <ul id="language-menu" style="margin-top: 98px;">
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
                   <!--<div class="doodle" style="z-index: 0;top:0px;right: 0px;width: 190px;height: 100px;background: yellow;height: 100px;position: relative;">
                    </div>-->
                   <div class="right" id="searchbox-container" style="margin-top: -125px;width: 190px;height: 115px;background: url(<?php echo base_url(); ?>/files/<?php echo $doodle;?>) no-repeat 5px 0px;">
                        <form style="margin-top:120px;background: red;z-index: 100;" action="<?php echo base_url(); ?>pencarian/<?php echo $lang ?>" method="post" name="realm">
                            <input style="" id="keyword" class="search-back" name="keyword" type="text" placeholder="<?php echo $terms['search'];?>" value=""  />
                            <input id="search-button" class="hide" type="submit" value="<?php echo $terms['search'];?>" />
                        </form>
                    </div>
		</div>
                
                <script src="<?php echo base_url(); ?>js/jquery.cycle.all.latest.js" type="text/javascript"></script>
                <!--<img src="<?php echo base_url().'/files/'.$doodle; ?>"/>
                -->
                <div style="position: relative; top: -92px;height: 80px;width: 500px;margin-left: 245px;color: blue;font-size: 12pt;float: left;">
                    <?php if($this->uri->segment(1)=="index" || $this->uri->segment(1)==""): ?>
                    <div id="box-menu-cepat">
                        <div>
                            <ul style="font-size: 14px; padding-left: 20px;">
                                <?php
                                    $countLink=0;
                                    foreach ($resultFast as $row): $countLink++;
                                        if ($countLink<=5):
                                ?>
                                <li class="/*border-bottom-1-soft*/ height100 padding-right-5" style="float: left;">
                                        <a href="<?php echo $row->url; ?>" class="transition03" target="_blank" style="position: relative;">
                                            <?php
                                                    if(!empty($row->link_thumb)):
                                            ?>
                                            <img alt="<?php echo $row->text; ?>" src="<?php echo base_url().'files/'.$row->link_thumb;?>" class="left" width="90" height="65" style="padding-top: 5px;" />
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
                
                <div style="z-index: 0px;position: relative; top: -80px;width: 660px;margin-left: 265px;color: #0082C6;font-size: 12pt;float: left;">
                    <?php if($this->uri->segment(1)=="index" || $this->uri->segment(1)==""): ?>
                    <!--sekilas info-->
                    <div id="sekilas-info" style='font-size: 12px;font-weight: bold;'>
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
                
		<div class="grid_2 margin-left-0 borderless" style="margin-top: -50px;">
			<?php
			$this->load->view('pages/sidebar_extension_all');
                         if($this->uri->segment(1)=="index" || $this->uri->segment(1)==""):
			?>
			
			<!-- Menu Pengumuman -->
			<div>
		      		<h2 style="color:gray;margin-left: 60px;margin-bottom: 5px;margin-top: <?php if($lang=='en') echo'34px'; else echo'52px'; ?>;" class=""><?php echo $terms['pengumuman'];?></h2>
			</div>
                    <div id="video_slide" class="scroll-pane jspScrollable" style="overflow: hidden;padding: 0px;width: 180px;margin-left: 50px; margin-top: 0px;" tabindex="0">
								<table>
									<?php 
									if(isset($pengumuman)): 
										foreach ($pengumuman as $row):
											if($lang=='id'){ ?>
												<tr>
                                        <td><b><a class="ex2" style="font-size: 12px;" title="<?php echo $row->indonesia; ?>"; href="<?php if($row->jenis=='file') echo base_url().$row->url; else if($row->jenis=='article') echo $row->url.'/'.$lang; else echo $row->url; ?>" target="_blank"><?php echo $row->indonesia; ?></a></b>
                                        <br/><a style="font-size: 10px;color:grey;"><?php echo $row->date; ?></a>
                                        </td>
                                    </tr>
                                <?php }
                                else { ?>
                                    <tr>
                                        <td><b><a class="ex2" style="font-size: 12px;" title="<?php echo $row->inggris; ?>" href="<?php if($row->jenis=='file') echo base_url().$row->url; else if($row->jenis=='article') echo $row->url.'/'.$lang; else echo $row->url; ?>" target="_blank"><?php echo $row->inggris; ?></a></b>
                                        <br/><a style="font-size: 10px;color:grey;"><?php echo $row->date; ?></a>
                                        </td>
                                    </tr>
											<?php }
										endforeach;
									endif;
									?>
									</table>
                    </div>
									<?php
                        endif;
			?>
                             <div style="margin-left:50px;margin-top:20px;width: 100%;border: 0; border-top: 1px solid #ccc;width:75%;"></div>  
			          <?php if($this->uri->segment(1)=="index" || $this->uri->segment(1)==""): ?>
                                   <div style="margin-left:20px;margin-right:5px;">
						<a class="right color-blue-light" href="<?php echo base_url();?>pengumuman/<?php echo $lang;?>" style="padding: 10px 10px 5px 0px;"><?php if($lang=='en') echo 'Announcement ';?><?php echo $terms['archive'];?> <?php if($lang=='id') echo 'Pengumuman';?></a>
						
					</div>
                               <?php
                                 endif;
			          ?>

			<!-- End Menu Pengumuman -->
		</div>
		<!--end menu sidebar-->
		<div class="borderless" id="box-all-content">
			
