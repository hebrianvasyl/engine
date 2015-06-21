<div class="cart">
    <h2 class="head">Корзина</h2>
    <div>
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <th>
                Наименование
            </th>
            <th width="10%">
                Количество
            </th>
            <th>
                Цена
            </th>
        </tr>
        <?php echo $cart_items; ?>
        <tr>
            <td colspan="3" align="right">
                <strong>Общая сумма: <?php echo $total_sum; ?> грн.</strong>
            </td>
        </tr>
    </table>
    <a href="<?php echo href('page=cart', 'mod=remove'); ?>">Очистить корзину</a> | <a href="<?php echo href('page=checkout'); ?>">Оформить заказ</a>
    </div>
</div>
