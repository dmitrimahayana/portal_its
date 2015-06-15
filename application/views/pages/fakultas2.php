<link href="<?php echo base_url(); ?>css/fakultas.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">

<div class="tittleNew" style="float: left;margin-top: -80px;margin-bottom:+10px;"><?php if($lang=='id') echo 'FAKULTAS & JURUSAN'; else echo 'FACULTY & DEPARTMENT'; ?></div>
<div id="hallo" style="width: 670px;float: left;margin-top: -30px;">
<?php if(isset ($result)) { $countFakultas=0; 
foreach ($result as $row) { $countFakultas++; ?>
    <?php //if($countFakultas%3==0){ echo $countFakultas;?>
<div class="page-hover tittleJurusan" style="float: left;padding-right: 10px;padding-top: 10px;">
<div class="page-fakultas" align="left" style="">
            <?php if(isset ($img)){ 
                foreach ($img as $row3){
                    if($row3['idFak']==$row->idFak){
                        if($row3['id_images']!="0") {  ?>
                            <a href="<?php echo base_url(); ?>show/fakultas/detail/<?php echo $row->idFak.'/'.$row->lang; ?>"><img width="210" height="121" src="<?php echo base_url(); ?>files/images/<?php echo $row3['images']; ?>"><br/><br/>
                            </a>
                        <?php }
                        else { ?>
                            <a href="<?php echo base_url(); ?>show/fakultas/detail/<?php echo $row->idFak.'/'.$row->lang; ?>"><img width="210" height="121" src="<?php echo base_url(); ?>images/assets2/template_foto_thumbnail_fakultas.png"><br/><br/>
                            </a>
                            <?php }
                    }
                }
            } ?>
            <a href="<?php echo base_url(); ?>show/fakultas/detail/<?php echo $row->idFak.'/'.$row->lang; ?>" class="tittle" style="color:#3C3C3B;">
                <?php echo $row->singkatan; ?>
            </a><br/><br/>
             <?php if(isset ($hahah)) {
                        foreach ($hahah as $row2) { ?>
                                    <?php if ($row2['fakultas'] == $row->namaFakultas) {?>
                                    <div style="padding-top:1px;width:155px;">
                                        <a class="ex1" style="" href="<?php echo base_url(); ?>show/jurusan/<?php echo $row2['idJur'].'/'.$lang;?>" ><?php echo ucfirst($row2['jurusan']); ?></a>
                                    </div>
                                    <?php  }?>
                            
              <?php  } } ?>
</div>
</div>
<?php //}
//else { ?>

<?php //} ?>

<?php }} ?>
</div>