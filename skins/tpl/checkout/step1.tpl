<div class="checkout">
    <h2 class="head">Оформление заказа</h2>
    <div>
        <form method="post">
            <label>Введите полное имя получателя <span class="red">*</span></label><br />
            <input type="text" name="customer_name" />
            <span class="customer_name error"></span>
            <label>E-mail <span class="red">*</span></label><br />
            <input type="text" name="email" />
            <span class="email error"></span>
            <label>Телефон <span class="red">*</span></label><br />
            <input type="text" name="phone" />
            <span class="phone error"></span>
            <label>Введите полный адрес (страна, город, район, улица, дом) <span class="red">*</span></label><br />
            <textarea name="adress" cols="40" rows="3"></textarea>
            <span class="adress error"></span>
            <label>Купон на скидку</label><br />
            <input type="text" name="coupon" />
            <br /><br />
            <label>Выберите способ оплаты <span class="red">*</span></label><br />
            <input type="radio" name="pay" value="Наличный"> Наличный<br />
            <input type="radio" name="pay" value="Безналичный"> Безналичный<br />
            <input type="radio" name="pay" value="WebMoney"> WebMoney
            <span class="pay error"></span>
            <input type="hidden" name="step" value="2" />
            <input type="submit" name="next" value="дальше" />
        </form>
</div>
</div>
