<!-- /skins/tpl/production/show.tpl begin -->
<div class="production">
    <h2 class="head"><?php echo $back_link; ?></h2>
    <div class="wrapper pad1">
        <article class="col1">
            <div class="box">
                <h2 class="title">Это интересно</h2>
                <div class="banners">
                    <?php echo $banner_rows; ?>
                </div>
            </div>
        </article>
        <article class="col2">
            <?php echo $production; ?>
            <div class="page-nav">
                <?php echo $page_menu; ?>
            </div> 
        </article>
    </div>
</div>
<!-- /skins/tpl/production/show.tpl end -->