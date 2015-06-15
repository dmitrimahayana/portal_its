<style type="text/css">
    #popupboxURL{
        margin: 0;
        padding: 20px;
        background: #99CCFF;
        font-family: arial;
    }
    #popupboxFile{
        margin: 0;
        padding: 20px;
        background: #99CCFF;
        font-family: arial;
    }
</style>

<?php
foreach ($result as $temp):
?>
<div id="popupboxURL">
    <form action="<?php echo base_url();?>beranda/manageNew/edit/data/pengumuman" method="POST" >
        <input type="hidden" name="jenis" value="<?php echo $temp->jenis; ?>" />
        <table>
            <tr>
                <td>Nama Indonesia</td>
                <td>
                    <input type="text" name="urlID" id="titleindo" class="input size200 " value="<?php echo $temp->indonesia ?>" />
                </td>
            </tr>
            <tr>
                <td>Nama Inggris</td>
                <td>
                    <input type="text" name="urlEN" id="titleingg" class="input size200 " value="<?php echo $temp->inggris ?>" />
                </td>
            </tr>
            <tr>
                <td>Url</td>
                <td>
                    <input type="text" name="url" id="url" class="input size200 " value="<?php echo $temp->url ?>" />
                </td>
            </tr>
            <tr>
                <td>Tampilkan</td>
                <td>
                    <select  class="input size200 " name="tampil" id="tampil">
                        <option value="<?php echo $temp->tampil ?>" selected><?php echo ($temp->tampil==1)?"YES":"NO"; ?></option>
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
<?php 
endforeach;
?>
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
