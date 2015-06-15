<?php
// Melakukan generate seluruh media menjadi data untuk konfigurasi tinyMCE pada saat menu mengimport gambar
$this->load->helper('file');
$string_list_media = '';
for($i=0; $i<count($all_media); $i++)
{
	if($i+1 < count($all_media)):
		$string_list_media .= '["'.$all_media[$i]->image_name.'", "'.base_url().'files/'.$all_media[$i]->link.'"],';
	else:
		$string_list_media .= '["'.$all_media[$i]->image_name.'", "'.base_url().'files/'.$all_media[$i]->link.'"]';
	endif;
}
$data = 'var tinyMCEImageList = new Array('.$string_list_media.');';
$path = FCPATH.'files/tinymcevariables/';
if ( ! write_file($path.'image_list.js', $data, 'c'))
{
     // echo 'Unable to write the file';
}
else
{
     // echo 'File written!';
}
?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url();?>js/backend/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
                save_enablewhendirty : true,
		relative_urls : false, 
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
		// Theme options
		// theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,styleselect,formatselect,fontselect,fontsizeselect",
		// theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		// theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		// theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,preview,|,fullscreen",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,media,advhr",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
                invalid_elements : "style",
		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		//content_css : "css/word.css",
		// Drop lists for link/image/media/template dialogs
		// template_external_list_url : "lists/template_list.js",
		// external_link_list_url : "lists/link_list.js",
		external_image_list_url : "<?php echo base_url();?>files/tinymcevariables/image_list.js",
		// media_external_list_url : "lists/media_list.js",
		// Replace values for the template plugin
		template_replace_values : {
			
		}
	});
</script>
<!-- /TinyMCE -->
