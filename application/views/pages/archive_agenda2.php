<div id="agenda-lengkap" class="left corner-top content-based">
	<div id="year-selector">
		<fieldset>
			Tahun
			<select name="combo" id="combobox-tahun">
			<?php
				foreach($periodeYear as $years):
			?>
				<option><?php echo $years->tahun;?></option>
			<?php
				endforeach;
			?>
			</select>
			Bulan
			<select name="combo" id="combobox-bulan">
			</select>
			<input type="button" id="btn_submit" name="btn_submit" value="Lihat" />
		</fieldset>
	</div>
	<script type="text/javascript">
	<!--	
	function pagination(pages) {
		var tahun = $('#combobox-tahun').val();
		var bulan = $('#combobox-bulan').val();
		var offset = (pages - 1) * 5;
		var num = <?php echo PAGINATION_MULTIPLY;?>;
		$('#ajax-content').html('');			
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>ajax/ajax_event/" + tahun + "/" + bulan + "/<?php echo $lang; ?>" + "/" + offset + "/" + num,
			cache:false,
			dataType: "json",
			success: function(msg) {
				var html_builder = "";
				$(".accordion").accordion();
				html_builder += '<div>';
				$.each(msg, function(index, news) {
					html_builder += (
						'<div class="ui-accordion ui-widget ui-helper-reset ui-accordion-icons">'
						+'<div class="news-detail ui-accordion-content ui-widget-content ui-accordion-content-active">' 
							+ '<h3 class="news-headline" <?php //class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all?>">' + news.actnama + '</h3>'
							+ '<div class="news-body">Lokasi: '+ news.acttempat +'</div>'
							+ '<div class="news-body">Tanggal:'+ news.acttanggal +'</div>'
						+ '</div><?php echo "<!-- end news detail -->" ?>' 
						+ '</div><?php echo "<!-- end holder -->" ?>'
					);
				});
				html_builder += '</div><?php echo "<!-- end accordion -->" ?>';
				$('#ajax-content').html(html_builder);
				$('#page-now').html(pages);
			},
			complete: function(){
				var page_now = parseInt($('#page-now').html());
				count_ajax(tahun, bulan, page_now);
			}
		});

		return false;
	}
	function count_ajax(tahun, bulan, page_now)
	{
		var result = 0;
		var num = <?php echo PAGINATION_MULTIPLY;?>;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>ajax/ajax_count_event/"+ tahun + "/" + bulan,
			cache:false,
			dataType: "json",
			success: function(msg) {
				var pagination_links = "";
				result = parseInt(msg);
				var batas_iterasi_halaman = Math.ceil(result/num);
				// Set the first link
				if( page_now-3 > 1)
				{
					pagination_links += "<a href=\"javascript:pagination(1);\" "; 		// open tag
					pagination_links += "\">"; 											// close open tag
					pagination_links += " First&nbsp; ";								// inner html
					pagination_links += "</a>"; 										// closing tag
				}
				// Normalisasi batas
				var batas_bawah = (page_now-3);
				var batas_atas = (page_now+3);
				if(batas_bawah<1) {batas_bawah = 1;}
				if(batas_atas>batas_iterasi_halaman) {batas_atas = batas_iterasi_halaman;}
				// Making link
				for(var i=1; i<=batas_iterasi_halaman; i++)
				{
					// Hanya menunjukkan sebagian link
					if( i>=1 && i<= batas_iterasi_halaman && i>=batas_bawah && i<=batas_atas )
					{
						pagination_links += "<a href=\"javascript:pagination("+(i)+");\" "; // open tag
						// ADDING ATTRIBUTE HERE
						if((i)==page_now)
						{
							pagination_links += "style=\"color: #f00;\" ";
						}
						// END ADDING ATTRIBUTE
						pagination_links += "\">"; 			// close open tag
						pagination_links += (i)+" &nbsp; ";	// inner html
						pagination_links += "</a>"; 		// closing tag
						if((i)==page_now)
						{
							pagination_links += "</span>";
						}
					}
				}
				// Set the last link
				if( page_now+3 < batas_iterasi_halaman)
				{
					pagination_links += "<a href=\"javascript:pagination("+(batas_iterasi_halaman)+");\" "; 	// open tag
					pagination_links += "\">"; 														// close open tag
					pagination_links += " Last&nbsp; ";												// inner html
					pagination_links += "</a>"; 													// closing tag
				}
				$('#pagination').html(pagination_links);
			}
		});
		return result;
	}
	function generate_month(tahun)
	{
		$('#combobox-bulan').html('');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>ajax/ajax_month_event/" + tahun,
			cache:false,
			dataType: "json",
			success: function(msg) {
				var html_builder = "<option value=\"0\">SEMUA</option>"
				$.each(msg, function(index, news) {
					html_builder += (
						'<option>'+
						 news.bulan+
						'</option>'
					);
				});
				$('#combobox-bulan').html(html_builder);
			}
		});

		return false;
	}
	$(document).ready(function(){
		$('#combobox-tahun').ready(function() {
			var tahun = $('#combobox-tahun').val();
			generate_month(tahun);
		});
		$('#combobox-tahun').change(function() {
			var tahun = $('#combobox-tahun').val();
			generate_month(tahun);
		});
		
		$('#btn_submit').click(function() {
			pagination(1)
		});
	});
	-->
	</script>
	<div id="pagination" style="font-size: 12px;">
		
	</div>
	<div id="ajax-content">
		
	</div>
	<span id="page-now" class="hide">
	</span>
</div>