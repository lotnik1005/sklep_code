<h1 style="margin-top: 50px;">Wstaw kategorię</h1>
<form action="admin/insertCategory.php" class="was-validated" method="POST">
    <div class="form-group">
        <label for="uname">Nazwa:</label><br>
        <input type="text" class="form-control" id="category_name" placeholder="Wpisz nazwę kategorii" name="category_name" required>
        <div class="valid-feedback">Prawidłowe</div>
        <div class="invalid-feedback">Pole kategoria jest wymagane</div>
    </div>
    <button type="submit" class="btn btn-primary">Wyślij</button>
</form>

<h1>Wstaw produkt</h1>
<form action="admin/insertProduct.php" class="was-validated" method="POST">
    <div class="form-group">
        <label for="product_name">Nazwa:</label><br>
        <input type="text" class="form-control" id="product_name" placeholder="Wpisz nazwę produktu" name="product_name" required>
        <div class="valid-feedback">Prawidłowe:</div>
        <div class="invalid-feedback">Pole nazwa jest wymagane</div>
    </div>
    <div class="form-group">
        <label for="product_price">Cena:</label><br>
        <input type="text" class="form-control" id="product_price" placeholder="Wpisz cenę produktu" name="product_price" required>
        <div class="valid-feedback">Prawidłowe</div>
        <div class="invalid-feedback">Pole cena jest wymagane</div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Wybierz kategorię</label>
        <select class="form-control" id="exampleFormControlSelect1" name="product_categories">
            <?php
            $categories = new Categories();

            $wynik = $categories->showCategories();

            echo "<table>";
            while ($row = $wynik->fetch_assoc()) {
                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
            }
            echo "</table>";
            ?>
        </select>
        <div class="valid-feedback">Prawidłowe</div>
        <div class="invalid-feedback">Pole cena jest wymagane</div>
    </div>
    <div class="form-group">
        <label for="product_description">Opis</label><br>
        <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
        <div class="valid-feedback">Prawidłowe</div>
        <div class="invalid-feedback">Pole opis jest wymagane</div>
    </div>
    <div class="ml-2 col-sm-6">
        <div id="msg"></div>
        <input type="file" name="product_image" class="file" accept="image/*">
    </div>
    <br><br>
    <button type="submit" class="btn btn-primary">Wyślij</button>
</form>

