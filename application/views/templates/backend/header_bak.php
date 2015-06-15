<?php
// Melakukan check apakah user mempunyai akses ke halaman ini atau tidak
if($page!=null and $page!='dashboard')
{
	$boleh = false;
	foreach($page_access as $access):
		if($access->name==$page)
		{
			$boleh = true;
			break;
		}
	endforeach;
	if($boleh==false)
	{
		redirect(base_url().'beranda');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="<?php echo $lang; ?>" />
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/icon/favicon.ico"> 
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="revisit-after" content="15 days" />
	
	<link href="<?php echo base_url(); ?>css/style-html.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-id.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style-class.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/backend/style-backend.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/backend/style-navigasi.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url(); ?>css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		// JQueryUI Function
		$(document).ready(function(){
			// Tabs untuk pilihan menu
			$('.tabs').tabs();
			// Pesan validasi
			jQuery.validator.messages.required = " Harus diisi";
			jQuery.validator.messages.minlength = " Panjang karakter minimum adalah {0} karakter";
			jQuery.validator.messages.maxlength = " Panjang karakter maksimum adalah {0} karakter";
			jQuery.validator.messages.range = " Nilai yang diperbolehkan adalah {0} hingga {1}";
		});
	</script>
	<!-- Jquery untuk Navigasi bila pada IE6 -->
	<script type="text/javascript">
	$(function() {
	  if ($.browser.msie && $.browser.version.substr(0,1)<7)
	  {
		$('li').has('ul').mouseover(function(){
			$(this).children('ul').css('visibility','visible');
			}).mouseout(function(){
			$(this).children('ul').css('visibility','hidden');
			})
	  }
	}); 
	</script>
	
	<!--  checkbox styling script -->
	<script src="<?php echo base_url(); ?>js/backend/ui.core.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/backend/ui.checkbox.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/backend/jquery.bind.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(function(){
		$('input').checkBox();
		$('#toggle-all').click(function(){
		$('#toggle-all').toggleClass('toggle-checked');
		$('#mainform input[type=checkbox]').checkBox('toggle');
		return false;
		});
	});
	</script> 
	
	<![if !IE 7]>

	<!--  styled select box script version 1 -->
	<script src="<?php echo base_url(); ?>js/backend/jquery.selectbox-0.5.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
	});
	</script>
	 

	<![endif]>

	<!--  styled select box script version 2 --> 
	<script src="<?php echo base_url(); ?>js/backend/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
		$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
	});
	</script>

	<!--  styled select box script version 3 --> 
	<script src="<?php echo base_url(); ?>js/backend/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
	});
	</script>

	<!--  styled file upload script --> 
	<script src="<?php echo base_url(); ?>js/backend/jquery.filestyle.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
	  $(function() {
		  $("input.file_1").filestyle({ 
			  image: "images/forms/choose-file.gif",
			  imageheight : 21,
			  imagewidth : 78,
			  width : 310
		  });
	  });
	</script>

	<!-- Custom jquery scripts -->
	<script src="<?php echo base_url(); ?>js/backend/custom_jquery.js" type="text/javascript"></script>
	 
	<!-- Tooltips -->
	<script src="<?php echo base_url(); ?>js/backend/jquery.tooltip.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/backend/jquery.dimensions.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(function() {
		$('a.info-tooltip ').tooltip({
			track: true,
			delay: 0,
			fixPNG: true, 
			showURL: false,
			showBody: " - ",
			top: -35,
			left: 5
		});
	});
	</script> 
	

	<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
	<script src="<?php echo base_url(); ?>js/backend/jquery.pngFix.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$(document).pngFix( );
	});
	</script>
	
	<script src="<?php echo base_url(); ?>js/backend/jquery.datepick.js" type="text/javascript"></script>
	<link href="<?php echo base_url(); ?>css/backend/jquery.datepick.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container" id="backend-container">
	<h1>Manajemen Portal ITS</h1>
	<div class="margin-bottom-10 bg-white">
		<ul id="menu" class="margin-top-10">
			<li id="tombol-beranda">
				<a href="<?php echo base_url();?>beranda" class="padding-5">
					<img src="<?php echo base_url(); ?>images/home-icon.png" width="24" height="24" alt="Beranda" />		
				</a>
			</li>
			<?php
				foreach ($navigation as $row): // 0
					/* Mengatur boleh atau tidak mengakses halaman backend */
					$ok = false;
					if($row->id_parent == null): 	// (A) Hanya menunjukkan induk utama
						if($row->link !== '#'):		// row adalah Child
						foreach($page_access as $access):
							if($row->id_backend_page==$access->id_backend_page)
							{
								$ok = true;
								break;
							}
						endforeach;
						else :	// row adalah Parent (Mempunyai Child)
							foreach ($navigation as $row2):
							if($row2->id_parent == $row->id_backend_page)
							{
								// Apakah child (row2) mempunyai parent (row) yang bisa diakses dan apakah parent (row) mempunyai child
								foreach($page_access as $access2):
									if($row2->id_backend_page==$access2->id_backend_page)
									{
										$ok = true;
										break;
									}
								endforeach;
							}
							else 
							{
								// Bila parent (row) tidak memiliki child (row2) ATAU
								// Bila parent (row) tidak boleh diakses oleh user
							}
							endforeach;
						endif;
						if($ok==true):	// B (Boleh Akses)
			?>
				<li id="tombol-<?php echo $row->name; ?>">
					<?php
							if($row->link == '#'):
					?>
						<a href="#">
					<?php
							else:
					?>
						<a href="<?php echo base_url(); ?>beranda/view/<?php echo $row->name; ?>">
					<?php
							endif;
					?>
						<?php echo $row->display_name; ?>
					</a>
					<ul>
					<?php
						// Iterasi untuk child
							foreach ($navigation as $row2):
								$ok2 = false;
								if($row2->id_parent == $row->id_backend_page):
									foreach($page_access as $access2):
										if($row2->id_backend_page==$access2->id_backend_page)
										{
											$ok2 = true;
											break;
										}
									endforeach;
									if($ok2==true):
					?>
						<li id="tombol-<?php echo $row2->name; ?>">
							<a href="<?php echo base_url(); ?>beranda/view/<?php echo $row2->name; ?>">
								<?php echo $row2->display_name; ?>
							</a>
						</li>
					<?php
									endif;
								endif;
							endforeach;
					?>
					</ul>
				</li>
			<?php
						endif; // B
					endif; 	// A
				endforeach;	// 0
			?>
                        <li>
                            <a><b>MANAJEMEN FAKULTAS DAN JURUSAN</b></a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>beranda/manage/view_fakultas">Fakultas</a>
                                </li><li>
                                    <a href="<?php echo base_url(); ?>beranda/manage/view_jurusan">Jurusan</a>
                                </li>
                            </ul>
                        </li>
			<li id="logout" class="right">
				<a href="<?php echo base_url(); ?>beranda/func/logout">
					Logout
				</a>
			</li>
			<li id="view-web" class="right">
				<a href="<?php echo base_url(); ?>" target="_blank">
					Lihat website ITS
				</a>
			</li>
		</ul>
	</div>