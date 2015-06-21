<!-- /skins/tpl/news/show.tpl begin -->
<div class="news">
    <h2 class="head">Новости</h2>
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
            <?php echo $rows; ?>
            <div class="page-nav">
                <?php echo $page_menu; ?>
            </div> 
        </article>
    </div>
</div>
<!-- /skins/tpl/news/show.tpl end -->