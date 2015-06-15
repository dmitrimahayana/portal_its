<?php
// 1 Baris isi 4 kotak
// $grid = "left size190 height275 center-div border-left-1-soft border-right-1-soft border-bottom-1-soft margin-bottom-10 margin-right-5";
// 1 Baris isi 3 kotak
$grid = "left size260 height275 center-div border-left-1-soft border-right-1-soft border-bottom-1-soft margin-bottom-10 margin-right-5";
$style = "margin: 5px 10px; padding: 10px 5px; font-size: 16px; font-family: calibri, arial;";
?>
<div style="float: left; margin-top: -80px; margin-bottom: 10px; font-size: 60px; color: #0082C6; font-family: Source Sans Pro;">ITS Media Center</div>
<div style="float: left; width: 650px;">
    <hr/>
    <div class="margin-bottom=10px;">
        <a href="<?php echo base_url(); ?>layanan-liputan/<?php echo $lang; ?>" style="<?php echo $style; ?>">Layanan Liputan</a>
        <a href="<?php echo base_url(); ?>umpan-balik/<?php echo $lang; ?>" style="<?php echo $style; ?>">Umpan Balik</a>
        <a href="<?php echo base_url() . 'berita/archive/' . $lang; ?>" style="<?php echo $style; ?>"><?php echo $terms['complete-news']; ?></a>
        <a href="<?php echo base_url(); ?>show/its_point/<?php echo $lang; ?>" style="<?php echo $style; ?>">ITS Point</a>
        
        <div id="searchbox-container">
            <form action="<?php echo base_url(); ?>pencarian_berita/<?php echo $lang ?>" method="get" name="realm">
                <input id="keyword" name="keyword" type="text" placeholder="<?php echo $terms['search'] . ' ' . $terms['news']; ?>" value=""  />
                <input id="search-button" class="hide" type="submit" value="<?php echo $terms['search']; ?>" />
            </form>
        </div>
    </div>
    <hr/>
    <div id="page-book" style="overflow: hidden;">
        <table>
            <?php 
            if(isset($result_book)) :
                $count=0;
                $temp=3;
                foreach ($result_book as $row) : 
            ?>
                    <?php if($count%4==0): ?><tr><?php endif; ?>
                        <?php 
                            $batas = 15;
                            $title= "";
                            if(strlen($row->title) <= $batas):
                                    $title=ucfirst($row->title);
                            else:
                                    $title=substr(ucfirst($row->title), 0, $batas).'...';
                            endif;
                        ?>
                        <td style="padding-left: 20px;padding-top: 30px;">
                            <a href="<?php echo $row->link; ?>" target="_blank" style="color: black;">
                                <img title="<?php echo $row->title; ?>" alt="<?php echo $row->title; ?>" src="<?php echo base_url().'files/'.$row->file_image; ?>" width="120" height="160">
                                <?php echo $title; ?>
                            </a>
                        </td>
                    <?php $count++; 
                    if($count%4==0 && $temp==$count): $temp=$count+3; ?></tr><?php endif; ?>
            <?php endforeach; endif; ?>
        </table>
    </div>
</div>