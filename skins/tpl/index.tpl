<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">   
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>" />  
    <meta name="description" content="<?php echo $description; ?>" />

    <link rel="stylesheet" href="/skins/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="/skins/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="/skins/css/font.css" type="text/css" media="all">
    <link rel="stylesheet" href="/skins/css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="/skins/js/jquery-1.5.2.js" ></script>

    <script type="text/javascript" src="/skins/js/tabs.js"></script>
    <script type="text/javascript" src="/skins/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="/skins/js/atooltip.jquery.js"></script>
    <script type="text/javascript" src="/skins/js/jquery.tools.min_2.js"></script>
    <script type="text/javascript" src="/skins/js/script.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
    <![endif]-->
</head>
<body id="page">
    <div class="main">
        <!-- header -->
        <header>
            <div class="wrapper">
                <h1><a href="<?php echo href('host'); ?>" id="logo">AirLines</a></h1>
                <span id="slogan">PhotoCamera<br />интернет магазин цифровых фотоаппаратов</span>
                <nav id="top_nav">
                    <ul>
                        <li><a href="<?php echo href('host'); ?>" class="nav1">Главная</a></li>
                        <li><a href="#" class="nav2">Карта сайта</a></li>
                        <li><a href="<?php echo href('page=contacts'); ?>" class="nav3">Контакты</a></li>
                    </ul>
                </nav>
                <div class="mini-cart">
                    <?php echo show_cart(); ?>
                </div>
            </div>
            <!-- menu begin -->
            <nav>
                <ul id="menu">
                    <li <?php echo $active_menu['main']; ?>><a href="<?php echo href('host'); ?>"><span><span>Главная</span></span></a></li>
                    <li <?php echo $active_menu['about']; ?>><a href="<?php echo href('page=about'); ?>"><span><span>О нас</span></span></a></li>
                    <li <?php echo $active_menu['production']; ?>><a href="<?php echo href('page=production'); ?>"><span><span>Каталог</span></span></a></li>
                    <li <?php echo $active_menu['news']; ?>><a href="<?php echo href('page=news', 'mod=all'); ?>"><span><span>Новости</span></span></a></li>
                    <li <?php echo $active_menu['contacts']; ?> class="end"><a href="<?php echo href('page=contacts'); ?>"><span><span>Контакты</span></span></a></li>
                </ul>
            </nav>
        <!-- menu end -->
        </header>
        <!-- header end -->

        <!-- content -->
        <section id="content">
            <?php echo $content; ?>
        </section>
        <!-- content end -->

        <!-- footer -->
        <footer>
            <div class="wrapper">
                <ul id="social-icons">
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon1.jpg" alt=""></a></li>
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon2.jpg" alt=""></a></li>
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon3.jpg" alt=""></a></li>
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon4.jpg" alt=""></a></li>
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon5.jpg" alt=""></a></li>
                    <li><a href="#" class="normaltip"><img src="/skins/images/icon6.jpg" alt=""></a></li>
                </ul>
            <div class="links">2012 &copy; <a href="#">Гебрян Василь</a> Все права сохранены<br />
                ДВНЗ "Ужгородский Національный Університет"<br />математичний факультет<br />спеціальність "прикладна математика"</div>
            </div>
        </footer>
        <!-- footer end-->
        
    </div>
    <script type="text/javascript">Cufon.now();</script>
    <script type="text/javascript">
    $(document).ready(function () {
        tabs.init();
        $("img[rel]").overlay();
    });
    jQuery(document).ready(function ($) {
        $('#form_1, #form_2, #form_3').jqTransform({
            imgPath: 'jqtransformplugin/img/'
        });
    });
    $(window).load(function () {
        $('#slider').nivoSlider({
            effect: 'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft' 
            slices: 15,
            animSpeed: 500,
            pauseTime: 6000,
            startSlide: 0, //Set starting Slide (0 index)
            directionNav: false, //Next & Prev
            directionNavHide: false, //Only show on hover
            controlNav: false, //1,2,3...
            controlNavThumbs: false, //Use thumbnails for Control Nav
            controlNavThumbsFromRel: false, //Use image rel for thumbs
            controlNavThumbsSearch: '.jpg', //Replace this with...
            controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
            keyboardNav: true, //Use left & right arrows
            pauseOnHover: true, //Stop animation while hovering
            manualAdvance: false, //Force manual transitions
            captionOpacity: 1, //Universal caption opacity
            beforeChange: function () {},
            afterChange: function () {},
            slideshowEnd: function () {} //Triggers after all slides have been shown
        });
    });
    </script>
</body>
</html>