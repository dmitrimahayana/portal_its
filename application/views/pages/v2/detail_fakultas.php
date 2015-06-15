	<div class="span9 rid-gutter alpha">
		<?php $this->load->view('pages/v2/search_extension'); ?>
		
		<div id="main" class="clearfix">
			<!-- Content Here -->
			<?php if(isset ($result)) {
					foreach ($result as $row) {
						if(isset ($img)){
							foreach ($img as $row3){
								 if($row3['idFak']==$row->idFak){
			?>
			<header>
				<figure>
					<img width="720px" src="<?php echo base_url(); ?>/files/images/<?php echo $row3['images']; ?>" alt="<?php echo ucfirst($row->singkatan); ?>">
				</figure>
				<h1 class="h4"><?php echo ucfirst($row->namaFakultas); ?></h1>
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
								<td><?php if($lang=='id') echo 'Alamat'; else echo 'Address'; ?></td>
								<td>:</td>
								<td><?php echo $row->alamat; ?></td>
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
								<td><?php if($lang=='id') echo 'Dekan'; else echo 'Dean'; ?></td>
								<td>:</td>
								<td><?php echo $row->dean; ?></td>
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
							if(isset ($hahah)) {
								foreach ($hahah as $row2) {
									if ($row2['fakultas'] == $row->namaFakultas) {
						?>
						<a href="<?php echo base_url(); ?>show/jurusan/<?php echo $row2['idJur'].'/'.$lang;?>" class="btn btn-default">
							<?php echo $row2['jurusan'] ?>
						</a>
						<?php } }} ?>
					</nav>
				</aside>
			</div>
			<?php }} ?>
		</div>
	</div><!-- row for nav+banner area -->
</div>