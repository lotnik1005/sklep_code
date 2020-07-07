<h1>Zmiana danych produktu</h1>


<form action="saveUpdateProduct" method="post">
    <div class="form-row">
        <?php foreach($product as $prod=>$val): ?>
        <input type="hidden" value="<?= $val->id; ?>" name="product_id">
        <div class="form-group col-md-8">
            <label for="product_name">Nazwa</label>
            <input type="text" class="form-control" id="product_name" placeholder="<?= $val->name; ?>" value="<?= $val->name; ?>" name="product_name">
        </div>

        <div class="form-group col-md-4">
            <label for="category_name">Kategoria</label>
            <select id="category_name" class="form-control" name="category_id">
                <?php foreach($categories as $category=>$val1): ?>
                <option value="<?= $val1->id; ?>"><?= $val1->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="product_description">Opis produktu</label>
            <textarea class="form-control" id="product_description" name="product_description"><?= $val->description; ?></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="product_price">Cena</label>
            <input type="text" class="form-control" id="product_price" placeholder="<?= $val->price; ?>" value="<?= $val->price; ?>" name="product_price">
        </div>
        
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary">Zaktualizuj</button>
</form>


