	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php if($lang=='id') echo 'FAKULTAS & JURUSAN'; else echo 'FACULTY & DEPARTMENT'; ?></h1>
			<section class="main-list list-fakultas">
				<div class="row clearfix">
				<?php
					if(isset ($result)) {
						/* pembagian fakultas - Doni Setio Pambudi */
						$numFakultas = 0;
						$countFakultas = count($result);
						/* end editing */
						
						foreach ($result as $row) {
							if($numFakultas % 3 == 0 && $numFakultas < $countFakultas-1){
								?>
								</div><div class="row clearfix">
								<?php
							}
							$numFakultas++;
						?>
						<div class="list-item">
						<?php	if(isset ($img)){
								foreach ($img as $row3){
									if($row3['idFak']==$row->idFak){
										?> <figure> <?php
										if($row3['id_images']!="0") {  ?>
											<img src="<?php echo base_url(); ?>files/images/<?php echo $row3['images']; ?>">
										<?php }
										else { ?>
											<img src="<?php echo base_url(); ?>images/assets2/template_foto_thumbnail_fakultas.png">
										<?php }
									 ?> </figure> <?php
									}
								}
							}?>
							<h2 style="font-size: 14pt!important; weight: 400!important;"><a href="<?php echo base_url(); ?>show/fakultas/detail/<?php echo $row->idFak.'/'.$row->lang; ?>" style="color: #0082c6;"><?php echo $row->namaFakultas; ?> (<?php echo $row->singkatan; ?>)</a></h2>
							<ul>
								<?php if(isset ($hahah)) {
										foreach ($hahah as $row2) { 
											if ($row2['fakultas'] == $row->namaFakultas) {?>
												<li><a style="font-size: 16px!important; font-weight: 300!important;" href="<?php echo base_url(); ?>show/jurusan/<?php echo $row2['idJur'].'/'.$lang;?>" title="<?php echo ucfirst($row2['jurusan']); ?>"><?php echo ucfirst($row2['jurusan']); ?></a></li>
								<?php 		}
										}
									}?>
							</ul>
						</div>	
					<?php }
					}
				?>
				</div>
			</section>
		</div>
	</div><!-- row for nav+banner area -->
</div>