<!-- /skins/tpl/cart/cart_rows.tpl begin -->
<tr>
    <td><?php echo $tpl_name; ?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="prod_id" value="<?php echo $tpl_id; ?>" />
            <input type="text" class="input" name="prod_count" value="<?php echo $tpl_count; ?>" size="2" maxlength="2" />
            <input type="submit" class="button" name="update_cart" value="О" />
        </form>
    </td>
    <td class="price" width="20%"><?php echo $tpl_total_price; ?> грн.</td>
</tr>
<!-- /skins/tpl/cart/cart_rows.tpl end -->
