<style type="text/css">
    #popupboxURL{
        margin: 0;
        padding: 20px;
        background: #99CCFF;
        font-family: arial;
        visibility: hidden;
    }
    #popupboxArticle{
        margin: 0;
        padding: 20px;
        margin-top: -200px;
        background: #99CCFF;
        font-family: arial;
        visibility: hidden;
    }
    #popupboxFile{
        margin: 0;
        padding: 20px;
        margin-top: -200px;
        background: #99CCFF;
        font-family: arial;
        visibility: hidden;
    }
</style>
<script language="javaScript" type="text/javascript">
    function showpopURL(showhide){
        if(showhide == "show"){
        document.getElementById('popupboxURL').style.visibility="visible";
        document.getElementById('popupboxArticle').style.visibility="hidden";
        document.getElementById('popupboxFile').style.visibility="hidden";
        }else if(showhide == "hide"){
        document.getElementById('popupboxURL').style.visibility="hidden";
        }
    }
    function showpopArticle(showhide){
        if(showhide == "show"){
        document.getElementById('popupboxArticle').style.visibility="visible";
        document.getElementById('popupboxURL').style.visibility="hidden";
        document.getElementById('popupboxFile').style.visibility="hidden";
        }else if(showhide == "hide"){
        document.getElementById('popupboxArticle').style.visibility="hidden";
        }
    }
    function showpopFile(showhide){
        if(showhide == "show"){
        document.getElementById('popupboxFile').style.visibility="visible";
        document.getElementById('popupboxArticle').style.visibility="hidden";
        document.getElementById('popupboxURL').style.visibility="hidden";
        }else if(showhide == "hide"){
        document.getElementById('popupboxFile').style.visibility="hidden";
        }
    }
</script>

<table>
    <tr>
        <td><br/>Pilih Tipe Input<br/><br/></td></tr>
	<tr>
            <td>URL Biasa</td>
            <td>
                <input type="radio" name="radiourl" id="radiourl" class="input required" value="Url" onclick="showpopURL('show');"/><br/>
            </td>
	</tr>
        <tr>
            <td>Url Article</td>
            <td>
                <input type="radio" name="radiourl" id="radioarticle" class="input required" value="Article" onclick="showpopArticle('show');"/><br/>
            </td>
        </tr>
        <tr>
            <td>File</td>
            <td>
                <input type="radio" name="radiourl" id="radiofile" class="input required" value="File" onclick="showpopFile('show');"/><br/>
            </td>
        </tr>
</table><br/>
<div id="popupboxURL">
    <form id="url" action="<?php echo base_url();?>beranda/manageNew/add/data/pengumuman" method="POST" >
        <input type="hidden" name="jenis" value="url" />
        <table>
            <tr>
                <td>Nama Indonesia</td>
                <td>
                    <input type="text" name="urlID" id="titleindo" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Nama Inggris</td>
                <td>
                    <input type="text" name="urlEN" id="titleingg" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Url</td>
                <td>
                    <input type="text" name="url" id="url" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Tampilkan</td>
                <td>
                    <select class="input size200 " name="tampil" id="tampil">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <br/><input type="submit" name="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="popupboxArticle">
    <form id="url" action="<?php echo base_url();?>beranda/manageNew/add/data/pengumuman" method="POST" >
        <input type="hidden" name="jenis" value="article" />
        <table>
            <tr>
                <td>Nama Indonesia</td>
                <td>
                    <input type="text" name="urlID" id="titleindo" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Nama Inggris</td>
                <td>
                    <input type="text" name="urlEN" id="titleingg" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Url Article</td>
                <td>
                    <input type="text" name="url" id="url" class="input size200 " />
                </td>
            </tr>
            <tr>
                <td>Tampilkan</td>
                <td>
                    <select class="input size200 " name="tampil" id="tampil">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <br/><input type="submit" name="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="popupboxFile">
    <?php $this->load->view('pages/backend/add/upload_file'); ?>
</div>

<br/><br/><br/>
</div>
<script>
<!--
$(document).ready(function(){
	/* Jquery validator */
	jQuery.validator.messages.min = " Pilihan tidak boleh NULL";
	$("form").validate(
		{
			invalidHandler: function(e, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
						? 'Anda belum mengisi 1 kolom. Kolom tersebut sudah disorot'
						: 'Anda belum mengisi ' + errors + ' kolom.  Kolom - kolom tersebut sudah disorot';
					$("div#message-yellow").html(message);
					$("div#message-yellow").show();
				} else {
					$("div#message-yellow").hide();
				}
			},
			onkeyup: false,
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 30
				},
				order: {
					range: [1, 9999]
				},
				name_id: {
					maxlength: 20
				},
				name_en: {
					maxlength: 20
				}
			}
		}
	);
});
-->
</script>
