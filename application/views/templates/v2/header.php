<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Content-Language" content="<?php echo $lang; ?>" />
		<title><?php echo $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/icon/favicon.ico"> 
		<meta name="description" content="Institut Teknologi Sepuluh Nopember (ITS) Surabaya" />
		<meta name="keywords" content="ITS Institut Teknologi Sepuluh Nopember Surabaya Jawa Timur Indonesia East Java Indonesian Institute Technology" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="revisit-after" content="15 days" />	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/v2/normalize.custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/v2/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/v2/preview.css">
		<?php
			$randStyle = array('default', 'diesnatalis', 'tech');
		?>
<!--		<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--themes/tech/style.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/default/style.css">
<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--themes/disnatalies/style.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/v2/jquery.jscrollpane.css">

		<script src="<?php echo base_url(); ?>js/v2/modernizr.custom.88511.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/v2/jquery-1.10.2.min.js"></script>

        <!-- google analytic -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <!-- Advance google analytic -->
        <script type="text/javascript">
            var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-47617686-1']); _gaq.push(['_trackPageview']);
            (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
        </script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-47617686-1', 'its.ac.id');
            ga('send', 'pageview');
        </script>

        <style>
            /*body {
                background: #f2f2f2 url(../../images/v2/03-background-tech.png) top center repeat-y;
            }*/
        </style>
    </head>
    <body class="home bg">

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
            <div class="has_octagon"></div>
            <div class="row">
                <div class="span3">
                    <div class="logo-area">
                        <a href="<?php echo base_url(); ?>"><img class="hidden" src="<?php echo base_url(); ?>images/v2/its_logo.png" alt=""/></a><!-- Identity proof if css unload -->
                        <h1 class="logo">
                            <a class="ir" href="<?php echo base_url(); ?>">Institut Teknologi Sepuluh Nopember</a>
                        </h1>
                    </div>
					<?php $this->load->view('pages/v2/sidebar_extension_all'); ?>
					
					<?php if($this->addSidebar != ''){ ?>
					<div class="row clearfix" style="margin-top: 80px;">
					<?php echo $this->addSidebar; ?>
					</div>
					<?php } ?>
                </div>

                <!-- content here -->