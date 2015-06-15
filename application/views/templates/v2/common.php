	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<?php 
				if($article->title != null) {
					$formatJurusan = false;
					if(strpos($article->title, ">") !== FALSE){
						$dJurusan = array('STUDY PROGRAMS', 'PROGRAM STUDI', 'LABORATORIES', 'LABORATORIUM',
										 'LECTURER', 'DOSEN', 'SELECTED PUBLICATIONS', 'PUBLIKASI PILIHAN');
						$spl = explode(">", $article->title);
						if(count($spl) == 2){	
							$kDetail = strtoupper(trim($spl[1]));
							
							foreach($dJurusan as $dJur){
								if($kDetail == $dJur){
									$formatJurusan = true;
									break;
								}
							}
							
							if($formatJurusan){
								echo '<h1 class="h0" style="float: none;"><p class="detail-jurusan">' . $spl[0] . '</p> ' . $spl[1] . '</h1>';
							}
						}
					}
					
					if(!$formatJurusan){
			?>
			<h1 class="h0" style="float: none;"><?php echo $article->title; ?></h1>
			<?php }
				  echo $article->content;
			} ?>
		</div>
	</div><!-- row for nav+banner area -->
</div>