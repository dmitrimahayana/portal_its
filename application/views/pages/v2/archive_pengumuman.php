	<script type="text/javascript">
		$(document).ready(function(){	
			$('#filter').click(function() {
				document.location = "<?php echo base_url(); ?>pengumuman/<?php echo $lang; ?>/"+ $('#dd-1').find('input').val() +"/"+ $('#dd-2').find('input').val() +"/0/<?php echo $num; ?>";
			});
			$('#more').click(function() {
				document.location = "<?php echo base_url(); ?>pengumuman/<?php echo $lang; ?>/"+ $('#dd-1').find('input').val() +"/"+ $('#dd-2').find('input').val() +"/<?php echo ($offset+5); ?>/<?php echo $num; ?>";
			});
		});
	</script>
	
	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php echo $lang == 'id' ? 'Pengumuman' : 'Announcement'; ?></h1>
			<div class="row">
				<div class="span3">
					<span class="dd-title"><?php echo $lang=='id'?'Tahun':'Year'; ?></span>
					<select name="" id="dd-1" class="selectpicker select-block cd-select">
						<?php
                            $cYear = date("Y");
							for($cYear = $cYear; $cYear >= 2005; $cYear--){ ?>
							<option value="<?php echo $cYear; ?>" <?php if($year == $cYear) echo selected; ?>><?php echo $cYear; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="span5">
					<span class="dd-title"><?php echo $lang=='id'?'Bulan':'Month'; ?></span>
					<select name="" id="dd-2" class="selectpicker select-block cd-select">
						<?php
							$months = array();
							if($lang == 'id') 
								$months = array('Januari',
												'Februari',
												'Maret',
												'April',
												'Mei',
												'Juni',
												'Juli',
												'Agustus',
												'September',
												'Oktober',
												'Nopember',
												'Desember');
							else
								$months = array('January',
												'February',
												'March',
												'April',
												'May',
												'June',
												'July',
												'August',
												'September',
												'October',
												'November',
												'December');
							
							$val = 1;
							foreach($months as $mnt){
						?>
						<option value="<?php if($val < 10) echo '0'; ?><?php echo $val; ?>" <?php if($month == $val) echo selected; ?>><?php echo $mnt; ?></option>
						<?php $val++; } ?>
					</select>
				</div>
				<div class="span4">
					<button class="btn btn-default" id="filter">Filter</button>
				</div>
			</div>
			<section class="alt-list list-arsip">
				<div class="clearfix">
					<div class="list-item">
						<ul>
							<?php if($pengumuman){?>
							<?php foreach($pengumuman as $anc){ ?>
							<li>					
								<a href="<?php echo $anc->url ?>" title="">
									<time>
									<?php 
										$ancDate = strtotime($anc->date );
										echo date("d F Y", $ancDate);
									?>
									</time>
									<h3><?php if($lang == 'id') { echo $anc->indonesia; } else { echo $anc->inggris; } ?></h3>
								</a>
							</li>
							<?php }} else{ ?>
							<li>
								<h3><?php echo $lang == 'id' ? 'Tidak ada Pengumuman' : 'No Announcement'; ?></h3>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<footer>
					<?php if(($count - $offset) > 5){?>
					<button class="btn btn-default" id="more">Show more</button>
					<?php } ?>
				</footer>
			</section>
		</div>
	</div><!-- row for nav+banner area -->
</div>