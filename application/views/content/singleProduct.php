<div class="row">
    <?php 
        foreach($product as $val) {
            
        $id = $val->id;
        $name = $val->name;
        $price = $val->price;
        $description = $val->description;
        $photo_url = $val->photo_url;
    ?>        
  
    <div class="col-lg-4">
        <img src="<?= $photo_url; ?>" alt="obrazek">
    </div>
    <div class="col-lg-8">
        <h1><?= $name; ?></h1>
        <h4><?= $price; ?> PLN</h4>
        <p><?= $description; ?></p>
        <?php
            echo form_open('cart/add');
            echo form_hidden('id', $id);
            echo form_hidden('name', $name);
            echo form_hidden('price', $price);
            echo form_submit('action', 'Dodaj do koszyka');
            echo form_close();
        ?>
    </div>
    
    <?php
        }
    ?>
</div>

