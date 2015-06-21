<!-- /skins/tpl/production/product.tpl begin -->
<div class="product">
    <h3><?php echo $tpl_name; ?></h3>
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td rowspan="2">
                <img src="<?php echo $tpl_src; ?>" alt="<?php echo $tpl_name; ?>" title="<?php echo $tpl_name; ?>" rel="#mies1" border="0" />
                <!-- first overlay. id attribute matches our selector -->
                <div class="simple_overlay" id="mies1">
                <!-- large image -->
                <img src="<?php echo $tpl_src; ?>" alt="<?php echo $tpl_name; ?>" title="<?php echo $tpl_name; ?>" rel="#mies1" border="0" />
                </div>
            </td>
            <td width="130px">
                <span class="uan"><?php echo $tpl_price; ?> <span>грн.</span></span><br />
                <span class="usd">$ <?php echo $tpl_price_dlr; ?></span>
            </td>
            <td>
                <strong>Доставка</strong><br />
                • по Киеву: 35 грн. -  бесплатно<br />
                • в регионы: 50 грн.<br />
                <a href="<?php echo href('page=delivery'); ?>">Подробнее →</a>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <form action="" method="post" id="add-to-cart">
                    <input type="hidden" name="id" value="<?php echo $tpl_id; ?>" />
                    <input type="hidden" name="name" value="<?php echo $tpl_name; ?>" />
                    <input type="hidden" name="price" value="<?php echo $tpl_price; ?>" />
                    <label>Количество: </label>
                    <input type="text" class="input" name="count" value="1" size="2" maxlength="2" />
                    <input type="submit" class="button" name="add_to_cart" value="Добавить в корзину" />
                </form>
            </td>
        </tr>
    </table> 
    <br clear="all" />
    <strong>Характеристики:</strong>
    <table class="features" width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="label">
                Система
            </td>
            <td class="value">
                <?php echo $tpl_system; ?>
            </td>   
        </tr>
        <tr>
            <td class="label">
                Стабилизация изображения
            </td>
            <td class="value">
                <?php echo $tpl_stabilization ; ?>
            </td>
        </tr>
        <tr>
            <td class="label">
                Количество эффективных пикселей
            </td>
            <td class="value">
                <?php echo $tpl_pixels; ?>
            </td>
        </tr>
        <tr>
            <td class="label">
                Оптический зум
            </td>
            <td class="value">
                <?php echo $tpl_zoom; ?>
            </td>
        </tr>
        <tr>
            <td class="label">
                Питание
            </td>
            <td class="value">
                <?php echo $tpl_power; ?>
            </td>
        </tr>
    </table>
    <br />
    <strong>Описание:</strong>
    <p><?php echo $tpl_description; ?></p>
    
</div>
<!-- /skins/tpl/production/product.tpl end -->