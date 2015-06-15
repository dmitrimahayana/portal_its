<div id="content" class="container_16 clearfix">
	<div class="grid_6 borderless">
		<div class="box">
			<h1>Selamat Datang 
			<?php
				$name = $this->session->userdata('username');
				echo ucfirst($name);
			?>
			</h1>
			<?php
			//if($this->session->userdata('user_level') > 1000):	// golongan admin
			?>
			<div>
                        <h2>Google Analytic</h2>
                        <script>
                            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                            ga('create', 'UA-45384271-1', 'its.ac.id');
                            ga('send', 'pageview');

                        </script>
			<h2>5 Aktivitas login terakhir:</h2>
				<div class="login-history">
					<ol>
					<?php
						if($name != null):
							$datestring = "%h:%i %a [%d-%m-%Y]";
							$time = time();
							foreach($user_history as $row):
					?>
						<li>
							<span>
							IP Address : <?php echo $row->ip; ?>
							<br />
							Waktu Login : <?php echo mdate($datestring, $row->waktu); ?>
							<br />
							Status login : <?php if($row->success==1) {echo 'BERHASIL';} else {echo 'GAGAL';}?>
							</span>
						</li>
					<?php
							endforeach;
						endif;
					?>
					</ol>
				</div>
			</div>
			<?php
			//endif;
			?>
		</div>
	</div>
</div>