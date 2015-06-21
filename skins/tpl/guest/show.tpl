<!-- /skins/tpl/guest/show.tpl begin -->
    <div class="guest">
        <h2 class="guest_head">Отзывы</h2>
        <strong style="color:red"><?php echo getInfo($info); ?></strong>
        <?php echo $rows; ?>
        <div style="text-align:center;" >
            <?php echo $page_menu; ?>        
            <form action="" name="post" method="post">   
            Имя:<br />   
            <input name="form[value1]" type="text"  value="<?php echo $POST['value1'];?>"/><br />   
            <?php include PHT_ROOT .'/skins/tpl/bbcode.tpl'; ?>  
            <textarea id="text" name="form[value2]" cols="70" rows="10"><?php echo $POST['value2'];?></textarea><br /> 
            <br />   
            <input name="ok" type="submit" /> <br /> 
            <br /> 
            </form>  
        </div> 
    </div>
<!-- ./skins/tpl/guest/show.tpl end -->