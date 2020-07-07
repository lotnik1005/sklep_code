<div class="row">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Kategorie</a>
        <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false">Produkty</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Zamówienia</a>

    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="margin-left: 50px;">
            <h1 style="margin-top: 50px;">Kategorie</h1>
            <h4>Wstaw kategorię</h4>
            <form action="<?= base_url() . 'admin/insertCategory'; ?>" class="was-validated" method="POST">
                <div class="form-group">
                    <label for="uname">Wstaw nową kategorię:</label><br>
                    <input type="text" class="form-control" id="category_name" placeholder="Wpisz nazwę kategorii" name="category_name" required>
                    <div class="valid-feedback">Prawidłowe</div>
                    <div class="invalid-feedback">Pole kategoria jest wymagane</div>
                </div>
                <button type="submit" class="btn btn-primary">Wstaw</button>
            </form>

            <h4 style="margin-top: 50px;">Usuń/edytuj kategorię</h4>            

            <table class="table" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">Id kategorii</th>
                        <th scope="col">Nazwa kategorii</th>
                        <th scope="col">Usuń kategorię</th>
                        <th scope="col" style="text-align: center;">Zmień nazwę</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <th scope="row"><?= $category->id; ?></th>
                            <td><?= $category->name; ?></td>
                    <form method="post" action="<?php base_url(); ?>modify_category">
                        <td>
                            <button type="submit" name="changeCategory" value="categoryDelete" class="btn btn-danger">Usuń kategorię</button>

                        </td>
                        <td>

                            <input type="hidden" value="<?= $category->id; ?>" name="id">
                            <input type="text" value="<?= $category->name; ?>" name="name">
                            <button type="submit" name="changeCategory" value="categoryUpdate" class="btn btn-info">Zmień nazwę kategorii</button>
                        </td>
                    </form>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab" style="margin-left: 50px;">
            <h1 style="margin-top: 50px;">Produkty</h1>
            <h4>Wstaw produkt</h4>
            <form action="insertProduct" class="was-validated" method="POST">
                <div class="form-group">
                    <label for="uname">Nazwa:</label><br>
                    <input type="text" class="form-control" id="category_name" placeholder="Wpisz nazwę produktu" name="product_name" required>
                    <div class="valid-feedback">Prawidłowe</div>
                    <div class="invalid-feedback">Pole nazwa produktu jest wymagane</div>
                </div>
                <div class="form-group">
                    <label for="uname">Opis:</label><br>
                    <textarea class="form-control" placeholder="Opis produktu" name="product_description" required></textarea>
                    <div class="valid-feedback">Prawidłowe</div>
                    <div class="invalid-feedback">Pole opis produktu jest wymagane</div>
                </div>
                <div class="form-group">
                    <label for="uname">Cena:</label><br>
                    <input type="number" class="form-control" id="category_name" placeholder="Wpisz cenę produktu" name="product_price" required>
                    <div class="valid-feedback">Prawidłowe</div>
                    <div class="invalid-feedback">Pole cena produktu jest wymagane</div>
                </div>
                <div class="form-group">
                    <label for="uname">Kategoria:</label><br>
                    <select name="product_category_id" class="form-control">
                        <?php
                        foreach ($categories as $category) {
                            echo "<option value='$category->id'>" . $category->name . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Wstaw</button>
            </form>

            <h3 style="margin-top: 50px;">Edycja / usuwanie produktu</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Edytuj produkt</th>
                        <th scope="col">Usuń produkt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <th scope="row"><?= $product->id; ?></th>
                            <td><?= $product->name; ?></td>
                    <form method="post" action="<?php base_url(); ?>modify_product">
                        <td>
                            <input type="hidden" value="<?= $product->id; ?>" name="id">

                            <button type="submit" name="changeProduct" value="productUpdate" class="btn btn-info">Zmień dane produktu</button>   

                        </td>
                        <td>
                            <button type="submit" name="changeProduct" value="productDelete" class="btn btn-danger">Usuń produkt</button>
                        </td>
                    </form>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <div class="tab-pane fade text-center" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" style="margin-left: 45px;">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Numer zamówienia</th>
                        <th scope="col">Data</th>
                        <th scope="col">Imię i nazwisko klienta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <th scope="row"><?= $order->id; ?></th>
                            <td><?= $order->date; ?></td>
                            <td><?= $order->name; ?></td>
                            <td><a href="<?php base_url(); ?>get_order_details?id=<?= $order->id; ?>"><button class="btn btn-info">Szczegóły</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
?>



