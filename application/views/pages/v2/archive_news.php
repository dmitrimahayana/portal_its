	<script type="text/javascript">
		$(document).ready(function(){	
			$('#filter').click(function() {
				document.location = "<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>/"+ $('#dd-0').find('input').val() +"/"+ $('#dd-1').find('input').val() +"/"+ $('#dd-2').find('input').val() +"/0/<?php echo $num; ?>";
			});
			$('#more').click(function() {
				document.location = "<?php echo base_url(); ?>berita/archive/<?php echo $lang; ?>/"+ $('#dd-0').find('input').val() +"/"+ $('#dd-1').find('input').val() +"/"+ $('#dd-2').find('input').val() +"/<?php echo ($offset+5); ?>/<?php echo $num; ?>";
			});
		});
	</script>
	
	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<h1 class="h0"><?php echo $lang == 'id' ? 'Arsip Berita' : 'News Archive'; ?></h1>
			<div class="row">
				<div class="span4">
					<select name="" id="dd-0" class="selectpicker select-block cd-select">
						<?php foreach($list_category as $row){ ?>
							<option value="<?php echo $row->newskatid; ?>" <?php if($news_category == $row->newskatid) echo selected; ?>><?php echo $row->newskatname;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="span3">
					<span class="dd-title"><?php echo $lang=='id'?'Tahun':'Year'; ?></span>
					<select name="" id="dd-1" class="selectpicker select-block cd-select">
						<?php 
							//$cYear = 2013;//intval(date('Y'));
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
						<option value="<?php echo $val; ?>" <?php if($month == $val) echo selected; ?>><?php echo $mnt; ?></option>
						<?php $val++; } ?>
					</select>
				</div>
				<div class="span6">
					<br>	
					<button class="btn btn-default" id="filter">Filter</button>
				</div>
			</div>
			<section class="alt-list list-arsip">
				<div class="clearfix">
					<div class="list-item">
						<ul>
							<?php if($news){?>
							<?php foreach($news as $nws){ ?>
							<li>
								<a href="<?php echo base_url(); ?>berita/<?php echo $nws->newsid?>/<?php echo $lang; ?>" title="">
									<time>
									<?php 
										$newsDate = strtotime($nws->newslastupdate );
										echo date("d F Y", $newsDate);
									?>
									</time>
									<h3><?php echo $nws->newstitle ?></h3>

									<p><?php echo $nws->newshead ?></p>
								</a>
							</li>
							<?php }} else{ ?>
							<li>
								<h3><?php echo $lang == 'id' ? 'Tidak ada Arsip Berita' : 'No Archive'; ?></h3>
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