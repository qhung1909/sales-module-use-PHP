<div class="row">
    <h2>Danh mục: <?=$categoriesGet['tendm']?></h2>
        <?php foreach($productCategories as $sp) : ?>
            <div class="col-md-4 mb-4 col-sm-6">
                <div class="card">
                    <a href="<?=APPURL?>product/detail/<?=$sp['masp']?>" class="text-dark text-decoration-none">
                        <div class="card-body">
                            <img src="<?=APPURL?>upload/<?=$sp['img']?>" class="card-img-top" alt="">
                            <h5 class="card-title"><?=$sp['tensp']?></h5>
                            <p class="card-text"><?=number_format($sp['gia'])?></p>
                                <a href="<?=APPURL?>product/addToCart/<?=$sp['masp']?>" class="btn btn-primary">Mua ngay</a>
                        </div>  
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>


   