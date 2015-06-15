<link href="<?php echo base_url(); ?>css/fakultas.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/trackLocationDept.js"></script>

<!--<h1>Jurusan Institute Teknologi Sepuluh Nopember</h1>-->
<div class="page-detail_fakultas" align="left">

<?php if(isset ($result)){ foreach ($result as $row){?>
    <?php if(isset ($img)){
                foreach ($img as $row3){
                    if($row3['idJur']==$row->idJur){
                        if($row3['id_images']!="0") {  ?>
                            <div class="detail_fak_img" style="background:url(<?php echo base_url(); ?>/files/images/<?php echo $row3['images']; ?>);">
                        <?php }
                    else {?><div class="detail_fak_img">
                        <?php } ?>
                            <div class="detail_fak_title_img">
                                <?php echo ucfirst($row->namaJurusan); ?>
                            </div>
                        </div>
    <?php
            }
        }
    } ?>
    <div class="about"><div style="background-color:#00B2C6;color:white;padding:10px;width:180px;">About the Departement</div>
        <div class="aboutField">
            <?php echo $row->about; ?>
        </div>
    </div>
    <div class="field">
        <table>
            <tr>
                <td>
                    <?php if($lang=='id') echo 'Fakultas'; else echo 'Faculty'; ?>
                </td>
                <td>:</td>
                <td><?php echo $row->fakultas ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if($lang=='id') echo 'Alamat'; else echo 'Address'; ?>
                </td>
                <td>:</td>
                <td><?php echo $row->alamat; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telp
                </td>
                <td>:</td>
                <td><?php echo $row->telp; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Fax
                </td>
                <td>:</td>
                <td><?php echo $row->fax; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>:</td>
                <td><?php echo $row->email; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Website
                </td>
                <td> : </td>
                <td>
                    <a href="<?php echo $row->website; ?>"><?php echo $row->website; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Head of Dept
                </td>
                <td> : </td>
                <td><?php echo $row->headOfDept; ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button onclick="goToPage('<?php echo $row->latitude; ?>','<?php echo $row->longitude; ?>')">Show Location</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="footer-jurusan" style="position:relative;margin-top:50px;float:left;margin-left:-50px;">
        <?php if(isset ($footer)){ foreach ($footer as $fo1){?>
            <div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php echo $fo1->kurikulum; ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Program Studi'; else echo 'Study Programs'; ?></a>
            </div>
            <div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php echo $fo1->laboratorium; ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Laboratorium'; else echo 'Laboratories'; ?></a>
            </div>
            <div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php echo $fo1->dosen; ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Dosen'; else echo 'Lecturer'; ?></a>
            </div>
            <div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php echo $fo1->publikasi ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Publikasi Terpilih'; else echo 'Selected Publication'; ?></a>
            </div>
            <!--<div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php //echo $fo1->penghargaan; ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Penghargaan'; else echo 'Achievement'; ?></a>
            </div>
            <div class="border-left-1-soft border-right-1-soft" style="padding-left:10px; padding-right:10px; float:left;font-size:13pt;">
                <a href="<?php //echo $fo1->kerjasama; ?>"  style="color:#706F6F;"><?php if($lang=='id') echo 'Kerjasama'; else echo 'Partnership'; ?></a>
            </div>-->
        <?php }} ?>
    </div>  
    <?php }} ?>
</div>
