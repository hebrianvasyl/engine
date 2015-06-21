

<!-- /skins/tpl/main/show.tpl begin -->
<div class="for_banners">
    <article class="col1">
    <div class="tabs">
        <ul class="nav">
        <li class="selected"><a href="#Manufacturers">Производители</a></li>
        <li><a href="#Parameters">По параметрам</a></li>
        </ul>
        <div class="content">
        <div class="tab-content" id="Manufacturers">
            <ul class="cat-list">
                <?php echo $category_list; ?>
            </ul>
        </div>
        <div class="tab-content" id="Parameters">
            <form id="form_2" action="#" method="post">
            <div>
                <div class="radio">
                <div class="wrapper">
                    <div class="row"> <span class="left">Ключевое слово</span>
                <input type="text" class="input">
                </div>
                </div>
                </div>
                
                <div class="row"> <span class="left">Система </span>
                <select class="input1" name="system[]">
                    <option disabled selected>Выберите систему</option>
                    <option value="Крыса Лариса">Зеркальная</option>
                    <option value="Крыса Лариса">Сменная оптика, без зеркала</option>
                    <option value="Крыса Лариса">Компактная</option>
                </select>
                <a href="#" class="help"></a> </div>
                <div class="row"> <span class="left">Питание </span>
                <select class="input1" name="power[]">
                    <option disabled selected>Выберите питание</option>
                    <option value="Крыса Лариса">Работа от батарей АА</option>
                    <option value="Крыса Лариса">Работа от аккумулятора</option>
                </select>
                <a href="#" class="help"></a> </div>
                <div class="row"> <span class="left">Стабил. </span>
                <select class="input1" name="system[]">
                    <option disabled selected>Стабилизация</option>
                    <option value="Крыса Лариса">Оптическая стабилизация</option>
                    <option value="Крыса Лариса">Стабилизация сдвигом матрицы</option>
                    <option value="Крыса Лариса">Электронная стабилизация</option>
                    <option value="Крыса Лариса">Без стабилизации</option>
                </select>
                <a href="#" class="help"></a> </div>
                <div class="row"> <span class="left">Опт. зум  </span>
                <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                <a href="#" class="help"></a> </div>
                <div class="row"> <span class="left">Мегапикс.</span>
                <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                <a href="#" class="help"></a> </div>
                <div class="wrapper"> <span class="right relative"><a href="#" class="button1"><strong>Поиск</strong></a></span> <a href="#" class="link1">Очистить</a> </div>
            </div>
            </form>
        </div>
        
        </div>
    </div>
    </article>
    <div id="slider"> 
        <img src="/skins/images/banner1.png" alt=""> 
        <img src="/skins/images/banner2.png" alt=""> 
        <img src="/skins/images/banner3.png" alt=""> 
    </div>
</div>
<div class="wrapper pad1">
    <article class="col1">
        <div class="box">
            <h2 class="title">Последние новости</h2>
            <?php echo $news_rows; ?>
            <a href="<?php echo href('page=news', 'mod=all'); ?>" class="all-news">Все новости</a>
        </div>
    </article>
    <article class="col2">
        <h3>О нас<span>Интернет-магазин PhotoCamera</span></h3>
        <div class="wrapper">
            <article class="cols">
                <figure><img src="/skins/images/page1_img1.jpg" alt="" class="pad_bot2"></figure>
                <p class="pad_bot1"><strong>Гарантия качества обслуживания:</strong></p>
                <p>Интернет-магазин PhotoCamera на сегодняшний день является наиболее популярным магазином цыфровых фотоаппаратов в Украине. Такого статуса нам удалось достичь благодаря максимально широкому ассортименту, разумной ценовой политике и отличному сервису.</p>
            </article>
            <article class="cols pad_left1">
                <figure><img src="/skins/images/page1_img2.jpg" alt="" class="pad_bot2"></figure>
                <p class="pad_bot1"><strong>Для покупателя:</strong></p>
                <p>Фотоаппараты, представленные в нашем интернет-магазине Rozetka, порадуют как начинающих фотохудожников, так и опытных мастеров. В нашем ассортименте найдутся и недорогие модели, и профессиональные зеркальные цифровые фотоаппараты, цены которых более чем приемлемы.</p>
            </article>
        </div>
        <a href="<?php echo href('page=about'); ?>" class="button1"><strong>Читать дальше</strong></a>
    </article>
</div>
<!-- /skins/tpl/main/show.tpl end -->