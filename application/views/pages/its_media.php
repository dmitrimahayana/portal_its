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
        <a href="<?php echo base_url(); ?>its_point/<?php echo $lang; ?>" style="<?php echo $style; ?>">ITS Point</a>
        <div id="searchbox-container">
            <form action="<?php echo base_url(); ?>pencarian_berita/<?php echo $lang ?>" method="get" name="realm">
                <input id="keyword" name="keyword" type="text" placeholder="<?php echo $terms['search'] . ' ' . $terms['news']; ?>" value=""  />
                <input id="search-button" class="hide" type="submit" value="<?php echo $terms['search']; ?>" />
            </form>
        </div>
    </div>
    <hr/>
    <div style="overflow: hidden;">
        <div id="section-1">
            <div class="<?php echo $grid; ?>">
                <?php
                $data['judul'] = $terms['news'];
                $data['result'] = $resultNews;
                $data['lengkap'] = $terms['complete-news'];
                $this->load->view('pages/outlines/berita', $data);
                ?>
            </div>
            <div class="<?php echo $grid; ?>">
                <?php
                $data['judul'] = $terms['profile'];
                $data['result'] = $resultProfil;
                $data['lengkap'] = $terms['complete-news'];
                $this->load->view('pages/outlines/berita', $data);
                ?>
            </div>
        </div>
        <div id="section-2">
            <div class="<?php echo $grid; ?>">
                <?php
                $data['judul'] = $terms['opinion'];
                $data['result'] = $resultOpini;
                $data['lengkap'] = $terms['complete-news'];
                $this->load->view('pages/outlines/berita', $data);
                ?>
            </div>
            <div class="<?php echo $grid; ?>">
                <?php
                $data['judul'] = $terms['editorial'];
                $data['result'] = $resultEditorial;
                $data['lengkap'] = $terms['complete-news'];
                $this->load->view('pages/outlines/berita', $data);
                ?>
            </div>
        </div>
        <div id="section-3">
            <div class="<?php echo $grid; ?>">
                <?php
                $data['judul'] = $terms['other-media'];
                $data['result'] = $resultMediaLain;
                $data['lengkap'] = $terms['complete-news'];
                $this->load->view('pages/outlines/berita', $data);
                ?>
            </div>
            <div class="<?php echo $grid; ?>">
                <h3 class="margin-left-10"><?php echo $terms['eureka-tv']; ?></h3>
                <div class="border-top-1-soft padding-top-5 padding-left-10 padding-right-10 height225">
                    <?php
                    $url = "http://www.youtube.com/embed/y4E2jwBTUo8";
                    // Format gambar pada youtube
                    // http://img.youtube.com/vi/YOUTUBE_ID/default.jpg
                    // Format Embed pada youtube
                    // http://www.youtube.com/embed/YOUTUBE_ID
                    // Format link pada youtube
                    // http://www.youtube.com/watch?v=ID_YOUTUBE&feature=player_profilepage
                    ?>
                    <?php
                    $i = 0;
                    for ($i = 0; $i < sizeof($resultEureka); $i++):
                        $row = $resultEureka[$i];
                    ?>
                        <?php
                        if ($i === 0):
                        ?>
                            <iframe class="youtube-player" type="text/html" width="240" height="180" src="http://www.youtube.com/embed/<?php echo $row->youtube_id; ?>" frameborder="0"></iframe>
                            <div style="padding-top: 5px; border-top: 1px solid #CCC; padding-bottom: 5px; border-bottom: 1px solid #CCC; padding-left: 2px; padding-right: 2px;">
                        <?php
                        else:
                        ?>
                            <a href="http://www.youtube.com/watch?v=<?php echo $row->youtube_id; ?>" title=<?php echo $row->title; ?>"><img src="http://img.youtube.com/vi/<?php echo $row->youtube_id; ?>/default.jpg" width="44" height="33" alt="<?php echo $row->title; ?>" /></a>
                        <?php
                        endif;
                        ?>
                    <?php
                    endfor;
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-4">
        </div>
        <div id="section-5">
        </div>
    </div>
</div>