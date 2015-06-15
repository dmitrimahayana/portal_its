<div class="panel corner-all">
    <?php
        if($this->uri->segment(4, 0)=='view_fakultas' or $this->uri->segment(4, 0)=='view_jurusan'){
        ?>
            <a class="submit corner-left right" href="<?php echo base_url();?>beranda/manage/<?php echo $info; ?>">Kembali</a>
    <?php 
        }
        else
        { ?>
            <a class="submit corner-left right" href="<?php echo base_url();?>beranda/view/<?php echo $info; ?>">Kembali</a>
  <?php } ?>
	
	<h2>Form <?php echo $display_name; ?> Baru</h2>
	<!-- start message- -->
	<?php
	if($this->session->flashdata('message_error')!=null):
	?>
	<div id="message-red" class="messages">
	<?php echo $this->session->flashdata('message_error'); ?>
	</div>
	<?php
	endif;
	?>
	
	<div id="message-yellow" class="messages hide">
	</div>
	
	<div class="clear"></div>
	<!--  end message- -->
<?php
if($this->uri->segment(4, 0))//=='view_fakultas' or $this->uri->segment(4, 0)=='view_jurusan')
{
    echo form_open(base_url().'beranda/manageFakAndJur/add/data/'.$info);
    
}
else
{
    echo form_open(base_url().'beranda/func/add/'.$info);
}
?>