<link href="<?php echo base_url(); ?>css/fakultas.css" rel="stylesheet" type="text/css" />
<div class="page-detail_fakultas" align="left">

<?php if(isset ($result)) { foreach ($result as $row) { ?>
        <?php if(isset ($img)){
                foreach ($img as $row3){
                    if($row3['idFak']==$row->idFak){
                        if($row3['id_images']!="0") {  ?>
                            <div class="detail_fak_img" style="background:url(<?php echo base_url(); ?>/files/images/<?php echo $row3['images']; ?>);">
                        <?php }
                        else {?><div class="detail_fak_img">
                        <?php } ?>
                        <div class="detail_fak_title_img">
                            <?php echo ucfirst($row->namaFakultas); ?>
                        </div>
                    </div>
            <?php
                    }
                }
            } ?>
    <div class="about"><div style="background-color:#00B2C6;color:white;padding:10px;width:130px;">About <?php echo $row->singkatan; ?></div>
                <div class="aboutField">
                    <?php echo $row->about; ?>
                </div>
    </div>
    <div class="field" style="margin-bottom:35px;">
        <table  width="50">
            <tr>
                <td>
                    Alamat
                </td>
                <td>:</td>
                <td>
                    <?php echo $row->alamat; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telp
                </td>
                <td>:</td>
                <td>
                    <?php echo $row->telp; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Fax
                </td>
                <td>:</td>
                <td>
                    <?php echo $row->fax; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>:</td>
                <td>
                    <?php echo $row->email; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Website
                </td>
                <td>:</td>
                <td>
                    <a href="<?php echo $row->website; ?>"><?php echo $row->website; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Dean
                </td>
                <td> : </td>
                <td>
                    <?php echo $row->dean; ?>
                </td>
            </tr>
        </table>
    </div>
     <?php if(isset ($hahah)) {
                foreach ($hahah as $row2) { ?>
                    <ul style="padding:8px;padding-left:25px;margin-left:450px;background:url(<?php echo base_url(); ?>/images/assets2/button_basic_idle.png);">
                        <li>
                             <?php if ($row2['fakultas'] == $row->namaFakultas) {?>
                            <a style="color:white; font-size:11pt;width:100%;" href="<?php echo base_url(); ?>show/jurusan/<?php echo $row2['idJur'].'/'.$lang;?>" ><?php echo $row2['jurusan']; ?></a>
                            <?php  }?>
                        </li>
                    </ul>
      <?php  } } ?>
    <?php }} ?>
</div>