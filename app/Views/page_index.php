     <div class="row">
         <h2>Sản phẩm</h2>
         <?php foreach($dsSP2 as $sp) : ?>
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
         <?php endforeach; ?>
     </div>

     <h2>Sản phẩm mới</h2>
     <div class="row">
         <?php foreach($dsPin as $sp) : ?>
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
         <?php endforeach; ?>
     </div>

     <h2>Sản phẩm xem nhiều nhất</h2>
     <div class="row">
         <?php foreach($dsPin as $sp) : ?>
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
         <?php endforeach; ?>
     </div>
     </div>

     <nav aria-label="Navigation Page">
         <ul class="pagination justify-content-center">
             <li class="page-item">
                 <a class="page-link" href="#" aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                 </a>
             </li>
             <li class="page-item"><a class="page-link" href="#">1</a></li>
             <li class="page-item"><a class="page-link" href="#">2</a></li>
             <li class="page-item"><a class="page-link" href="#">3</a></li>
             <li class="page-item">
                 <a class="page-link" href="#" aria-label="Next">
                     <span aria-hidden="true">&raquo;</span>
                 </a>
             </li>
         </ul>
     </nav>