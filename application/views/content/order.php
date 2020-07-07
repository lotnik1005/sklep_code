<?php

$grand_total = 0;

if($cart = $this->cart->contents()) {
    foreach($cart as $item) {
        $grand_total = $grand_total + $item['subtotal'];
    }
}
?>

<form name="billing" method="post" action="<?php echo base_url().'order/save_order' ?>" >
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Twoje zamówienie</h1>
        <table border="0" cellpadding="2px">
        	<tr><td>Suma za zamówienie:</td><td><strong>PLN <?php echo number_format($grand_total,2); ?></strong></td></tr>
            <tr><td>Twoje imię i nazwisko</td><td><input type="text" name="name" /></td></tr>
            <tr><td>Adres:</td><td><input type="text" name="address" /></td></tr>
            <tr><td>Email:</td><td><input type="text" name="email" /></td></tr>
            <tr><td>Telefon:</td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Złóż zamówienie" /></td></tr>
        </table>
	</div>
</form>

