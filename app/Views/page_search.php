<div class="row">
        <h2>Kết quả tìm kiếm với : <?=$searchSP?> </h2>
       
            <div class="col-md-3 mb-4 col-sm-6">
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

        </div>