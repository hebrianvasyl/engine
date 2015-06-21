<?php

    $meta = array(
        'main'          => array(   'title'         => 'Главная',
                                    'keywords'      => 'фотоаппараты, фотики',
                                    'description'   => 'PhotoCamera - Интернет-магазин по продаже цифровых фотоаппаратов'
                                ),
        'news'          => array(   'title'         => 'Новости',
                                    'keywords'      => 'новости, акции, известия',
                                    'description'   => 'Свежие новости и последние акции в интернет-магазине PhotoCamera'
                                ),
        'article'       => array(   'title'         => 'Статьи',
                                    'keywords'      => 'статьи, полезные советы',
                                    'description'   => 'Советы и рекомендации от специалистов PhotoCamera'
                                ),
        'production'    => array(   'title'         => 'Продукция',
                                    'keywords'      => 'фотоаппараты, фотики',
                                    'description'   => 'Цифровые фотоапараты от PhotoCamera - лучшая продукция'
                                ),
        'payment'         => array( 'title'         => 'Оплата',
                                    'keywords'      => 'оплата, способы оплаты',
                                    'description'   => 'Как оплатить продукцию на сайте PhotoCamera'
                                ),
        'about'         => array(   'title'         => 'О нас',
                                    'keywords'      => '',
                                    'description'   => 'О интернет-магазине PhotoCamera'
                                ),
        'delivery'         => array('title'         => 'Доставка',
                                    'keywords'      => 'способы доставки, доставка',
                                    'description'   => 'Способы доставки на сайте PhotoCamera'
                                ),
        'contacts'      => array(   'title'         => 'Контакты',
                                    'keywords'      => 'адрес, телефоны',
                                    'description'   => 'Контактные данные интернет-магазина PhotoCamera'
                                ),
        'cart'          => array(   'title'         => 'Корзина',
                                    'keywords'      => '',
                                    'description'   => 'Ваша корзина на сайте PhotoCamera'
                                ),
    );
    
    if(file_put_contents('./setup/meta.txt', serialize($meta)))
            echo 'Ищем файл в папке setup';
