<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Numer zamówienia</th>
            <th scope="col">Data</th>
            <th scope="col">Imię i nazwisko klienta</th>
            <th scope="col">Adres</th>
            <th scope="col">Telefon</th>
            <th scope="col">Zakupione produkty</th>
            <th scope="col">Ilość</th>
            <th scope="col">Cena</th>
            <th scope="col">Całkowita kwota</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        $subtotal = 0;
        ?>

        <tr>
            <th scope="row"><?= $order[0]->id; ?></th>
            <td><?= $order[0]->date; ?></td>
            <td><?= $order[0]->custname; ?></td>
            <td><?= $order[0]->address; ?></td>
            <td><?= $order[0]->phone; ?></td>
            <td colspan="4">
                <table>
                    <?php
                    foreach ($order as $value) {
                        $productPrice = ($value->quantity) * ($value->price);
                        ?>

                        <?php
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td style="width: 20%;"><?= $value->name; ?></td>
                        <td style="text-align: right;"><?= $value->quantity; ?></td>
                        <td style="text-align: right;"><?= $value->price; ?></td>
                        <td style="text-align: right;"><?= $productPrice; ?></td>
                    </tr>
                    <?php
                     $subtotal += $productPrice;
                    }
                    ?>
                </table>
            </td>

        </tr>
    </tbody>
</table>
<table class="table" style="text-align: right;">
    <tr>
        <td rowspan="8"><h6>Razem: <?= $subtotal; ?> PLN</h6></td>
    </tr>
</table>
<a href="<?php echo base_url(); ?>admin/index">Powrót do panelu</a>

