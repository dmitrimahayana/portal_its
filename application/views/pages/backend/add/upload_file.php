
<!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/blueimp/bootstrap.min.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/blueimp/bootstrap-responsive.min.css">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/blueimp/bootstrap-image-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/blueimp/jquery.fileupload-ui.css">
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="<?php echo base_url(); ?>js/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script>
<?php
$lebar = 0;
$tinggi = 0;
if(isset($_POST))
{
	if(isset($_POST['proporsional']))
	{
		if($_POST['proporsional'] != null)
		{
			$prop = true;
		}
		else $prop = false;
	}
	if(isset($prop) and $prop==true)
	{
		if(isset($_POST['width']))
		{
			if($_POST['width'] > 0)
			{
				$lebar = $_POST['width'];
			}
			else if(isset($_POST['height']) and $_POST['height'] > 0)
			{
				$lebar = MAX_INTEGER;
			}
		}
		if(isset($_POST['height']))
		{
			if($_POST['height'] > 0)
			{
				$tinggi = $_POST['height'];
			}
			else if(isset($_POST['width']) and $_POST['width'] > 0)
			{
				$tinggi = MAX_INTEGER;
			}
		}
	}
	else
	{
		if(isset($_POST['width']))
		{
			if($_POST['width'] > 0)
			{
				$lebar = $_POST['width'];
			}
			else if(isset($_POST['height']) and $_POST['height'] > 0)
			{
				$lebar = $_POST['height'];	// Bila tidak di set, maka samakan tinggi dan lebar
			}
		}
		if(isset($_POST['height']))
		{
			if($_POST['height'] > 0)
			{
				$tinggi = $_POST['height'];
			}
			else if(isset($_POST['width']) and $_POST['width'] > 0)
			{
				$tinggi = $_POST['width'];	// Bila tidak di set, maka samakan tinggi dan lebar
			}
		}
	}
}
// Bila ada input, maka ubah nilai lebar dan/atau tinggi
?>
<div class="panel corner-all">
    <blockquote>
        <p>Penambahan upload file dengan ekstensi pdf, doc, dan xls</p>
    </blockquote>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="<?php echo base_url();?>upload/do_upload2/userfile/<?php echo $lebar;?>/<?php echo $tinggi;?>/<?php if(isset($prop)) {echo $prop;}?>" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <input type="hidden" name="jenis" value="file" />
        Nama Indonesia: <input type="text" name="urlID" id="titleindo" class="input size200 " placeholder="Nama Indonesia"/><br/><br/>
        Nama Inggris:&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="urlEN" id="titleingg" class="input size200 " placeholder="Nama Inggris"/><br/><br/>
        <div class="row fileupload-buttonbar">
            <div class="span7">
                
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="userfile[]" size="20" multiple="multiple" />
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <!--<button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">-->
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing -->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
        <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    </form>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn modal-download" target="_blank">
            <i class="icon-download"></i>
            <span>Download</span>
        </a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
            <i class="icon-play icon-white"></i>
            <span>Slideshow</span>
        </a>
        <a class="btn btn-info modal-prev">
            <i class="icon-arrow-left icon-white"></i>
            <span>Previous</span>
        </a>
        <a class="btn btn-primary modal-next">
            <span>Next</span>
            <i class="icon-arrow-right icon-white"></i>
        </a>
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <!--<td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>-->
    </tr>
{% } %}
</script>
<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url(); ?>/js/blueimp/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo base_url(); ?>/js/blueimp/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url(); ?>/js/blueimp/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url(); ?>/js/blueimp/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="<?php echo base_url(); ?>/js/blueimp/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/js/blueimp/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>/js/blueimp/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>/js/blueimp/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="<?php echo base_url(); ?>/js/blueimp/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>/js/blueimp/jquery.fileupload-ui.js"></script>
<!-- The localization script -->
<script src="<?php echo base_url(); ?>/js/blueimp/locale.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>/js/blueimp/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
<script>
//this is the application.js file from the example code//
$(function () {
'use strict';
// Initialize the jQuery File Upload widget:
$('#fileupload').fileupload();
// Load existing files:
$.getJSON($('#fileupload form').prop('action'), function (files) {
var fu = $('#fileupload').data('fileupload');
fu._adjustMaxNumberOfFiles(-files.length);
fu._renderDownload(files)
.appendTo($('#fileupload .files'))
.fadeIn(function () {
// Fix for IE7 and lower:
$(this).show();
});
});
// Open download dialogs via iframes,
// to prevent aborting current uploads:
$('#fileupload .files a:not([target^=_blank])').live('click', function (e) {
e.preventDefault();
$('<iframe style="display:none;"></iframe>')
.prop('src', this.href)
.appendTo('body');
});
});
</script>