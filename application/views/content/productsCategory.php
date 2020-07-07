<div class="row">
    <div class="col-lg-13">
        <h1 class="my-4">Kategorie</h1>
        <div class="list-group">
            <table>
                <?php
                foreach ($categories as $category) {
                    echo "<a class='list-group-item' href=" . base_url() . "home/showProductsCategory?id=" . $category->id . ">" . $category->name . "</a>";
                }
                ?>
            </table>
        </div>
    </div>

    <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> 

        <div class="row">
            <?php
            foreach ($products as $product => $val) {
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="h-100">
                        <img class="card-img-top" src="<?php echo $val->photo_url; ?>" alt="obrazek">
                        <div class="card card-body">
                            <?php
                            echo "<a href=" . base_url() . "home/showSingleProduct?id=" . $val->id . ">" . $val->name . "</a>";
                            ?>
                            <h5><?php echo $val->price; ?></h5>
                            <p class="card-text">
                                <?php echo $val->description; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</div>

