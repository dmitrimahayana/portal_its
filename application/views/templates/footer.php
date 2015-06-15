		<div class="clear"></div>
		</div>
		<!-- end box all content -->
	</div>
	<!--end main-->
	<div class="clear"></div>
	<div  id="footer" style="margin-bottom:0px;" >
                <script>
                    $(document).ready(function(){
                      $("#siteMaps").click(function(){
                        $("#subSiteMaps").slideToggle("slow");
                        $('html,body').animate({scrollTop: $(this).offset().top}, 300);
                      });
                    });
                </script>
                <div  id="siteMaps">
                    <div style="margin-top: 10px;"><img src="<?php echo base_url(); ?>images/assets/symbol_triangle3.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>Site Maps</a></div>
                    <div class="copyright" style="text-align: center;margin-top: -20px;font-size:10px">Copyright © Institut Teknologi Sepuluh Nopember<br/>
                        Oleh : Redaksi ITS | <a class="color-gray-2" href="<?php echo base_url(); ?>article/disclaimer/<?php echo $lang; ?>">Disclaimer</a> | Best view at Mozilla</div>
                    <div style="margin-top: -25px;margin-right: 20px;float: right;">
                        <?php
                        foreach($resultSocial as $row):
                        ?>
                                <a href="<?php echo $row->link;?>" target="_blank">
                                        <img src="<?php echo base_url().'files/'.$row->link_thumb;?>" height="20px" class="left margin-right-5" />
                                </a>

                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div id="subSiteMaps">

        <ul class="menu-sidebar" style="float: left;">
		<?php
			// Inisialisasi
			$menuNavigasi = array();
			$menuNavigasi[0] = $resultFixed;
			$menuNavigasi[1] = $resultSidebar;
			$menuNavigasi[2] = $resultExtend;
                        $count1=0;
                        $count2=0;
		?>
		<?php
			for($i=0; $i<sizeof($menuNavigasi); $i++):
				foreach ($menuNavigasi[$i] as $row):
				if($row->id_parent == null): //if(isset($count2)){$count1=$count2;}
                                $count1++; 
                                //echo "<div style='color:red;'> ".$count1."</div>";
                                $count2=$count1;
		?>
            <?php
                                    if($count1%11==0 ){ //echo "<div style='color:yellow;'> ".$count1." ".$count2."</div>";
                                        ?>
                                        </ul>
                                        <ul class="menu-sidebar" style="float:left;width: 200px;">
                                    <?php
                                    }
                                    ?> 
		
			<a href="<?php echo $row->link;?>" title="<?php echo ucfirst($row->title); ?>" class="transition" target="_parent" style="font-size: 11pt;">
			<div>
				<?php
					if($row->ada != null) {}
				?>
				<?php
					if($row->title!=null or $row->title != ''){
                                            $batas0 = 18;
                                            if(strlen($row->title) <= $batas0):
                                                    echo ucfirst($row->title);
                                            else:
                                                    echo substr(ucfirst($row->title), 0, $batas0).'...';
                                            endif;
                                        }
					else echo 'Home';
				?>
			</div>
			</a>
			<?php
				if($row->ada != null):
			?>
			
				<?php
					foreach ($resultSidebar as $row2):
						if($row2->id_parent == $row->id_page and $row2->id_parent != null  and $row->id_page != null): 
                                                    $count2++; $count1=$count2;
                                                //echo "<div style='color:blue;'> ".$count2."</div>";
				?>
                                    <?php
                                    if($count2%11==0 ){ //echo "<div style='color:yellow;'> ".$count1." ".$count2."</div>";
                                        ?>
                                        </ul>
                                        <ul class="menu-sidebar" style="float:left;width: 200px;">
                                    <?php
                                    }
                                    ?> 
					<a href="<?php echo $row2->link;?>" title="<?php echo ucfirst($row2->title); ?>" class="transition" target="_parent" style="font-size: 11pt;">
					<?php
						if($row2->ada != null) {}//echo '++';}
					?>
					<?php
						if($row2->title!=null or $row2->title != ''){
                                                        $batas = 18;
                                                        if(strlen($row2->title) <= $batas):
                                                                echo ucfirst($row2->title);
                                                        else:
                                                                echo substr(ucfirst($row2->title), 0, $batas).'...';
                                                        endif;
                                                }
						else echo 'Home';
					?>
					</a>
					
						<?php //echo '<ul>';
							/*foreach ($resultSidebar as $row3):
								if($row3->id_parent == $row2->id_page and $row3->id_parent != null  and $row2->id_page != null): echo "aaaaaaaaaaaaa";
						?>
                                                        
							<a href="<?php echo $row3->link;?>" class="transition" target="_parent">
							<?php
								if($row3->title!=null or $row3->title != '')
									echo ucfirst($row3->title);
								else echo 'Home';
							?>
							</a>
						
						<?php
								endif;
							endforeach;*/
                                                //echo '</ul>';
						?>
				
				<?php
						endif;
					endforeach;
				?>
			<?php
				endif;
			?>
            
            <br />
		<?php
				endif;
				endforeach;
		?>
                
		<?php
			endfor;
		?>
	</ul>
</div>
</body>
</html>