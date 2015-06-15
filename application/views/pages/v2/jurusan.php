	<?php $this->js[] = "https://maps.googleapis.com/maps/api/js?sensor=false"; ?>
	<?php $this->js[] = base_url()."js/v2/maps.js"; ?>
	
	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<?php if(isset ($result)) {
					foreach ($result as $row) {
						if(isset ($img)){
							foreach ($img as $row3){
								 if($row3['idJur']==$row->idJur){
			?>
			<header>
				<figure>
					<img width="720px" src="<?php echo base_url(); ?>/files/images/<?php echo $row3['images']; ?>" alt="<?php echo ucfirst($row->namaJurusan); ?>">
				</figure>
				<h1 class="h4"><?php echo ucfirst($row->namaJurusan); ?></h1>
			</header><!-- /header -->
			<?php }}} ?>
			<div class="row">
				<section class="span7 content-inside">
					<p><?php echo $row->about; ?></p>
				</section>
				<aside class="span5 content-sidebar">
					<address id="address">
						<table class="plain">
							<tr>
								<td><?php echo $terms['faculty']; ?></td>
								<td>:</td>
								<td><?php echo $row->fakultas ?></td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="hidden" id="itm_lat" value="<?php echo $row->latitude ?>"/>
									<input type="hidden" id="itm_lon" value="<?php echo $row->longitude ?>"/>
									<div id="map_canvas" style="width: 96%; height: 200px; margin: 2%;">map</div>
								</td>
							</tr>
							<tr>
								<td><?php if($lang=='id') echo 'Alamat'; else echo 'Address'; ?></td>
								<td>:</td>
								<td><?php echo $row->alamat ?></td>
							</tr>
							<tr>
								<td>Telp</td>
								<td>:</td>
								<td><?php echo $row->telp; ?></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td>:</td>
								<td><?php echo $row->fax; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><a href="mailto:ftsp@its.ac.id"><?php echo $row->email; ?></a></td>
							</tr>
							<tr>
								<td><?php if($lang=='id') echo 'Ketua Jurusan'; else echo 'Head of Dept'; ?></td>
								<td>:</td>
								<td><?php echo $row->headOfDept; ?></td>
							</tr>
							<tr class="spacer"></tr>
							<tr>
								<td><strong>Website</strong></td>
								<td>:</td>
								<td><strong><a href="<?php echo $row->website; ?>"><?php echo $row->website; ?></a></strong></td>
							</tr>
						</table>
					</address>
					<nav class="side-nav">
						<?php 
							if(isset ($footer)){ foreach ($footer as $fo1){
						?>
						<a href="<?php echo $fo1->kurikulum; ?>" class="btn btn-default">
							<?php if($lang=='id') echo 'Program Studi'; else echo 'Study Programs'; ?>
						</a>
						<a href="<?php echo $fo1->laboratorium; ?>" class="btn btn-default">
							<?php if($lang=='id') echo 'Laboratorium'; else echo 'Laboratories'; ?>
						</a>
						<a href="<?php echo $fo1->dosen; ?>" class="btn btn-default">
							<?php if($lang=='id') echo 'Dosen'; else echo 'Lecturer'; ?>
						</a>
						<a href="<?php echo $fo1->publikasi; ?>" class="btn btn-default">
							<?php if($lang=='id') echo 'Publikasi Terpilih'; else echo 'Selected Publication'; ?>
						</a>
						<?php } } ?>
					</nav>
				</aside>
			</div>
			<?php }} ?>
		</div>
	</div><!-- row for nav+banner area -->
</div>
