<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <strong>Giỏ hàng</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Ảnh SP</th>
                                <th>Sản Phẩm</th>
                                <th>Gía bán</th>
                                <th>Số Lượng</th>
                                <th>Thành tiền</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $soluong = 0;
                            $tongtien = 0;
                            $tienShip = 15000;
                            foreach($cart as $sp) : ?>
                            <tr>
                                <td>
                                    <img class="w-100"
                                    src="<?=APPURL?>upload/<?=$sp['img']?>"
                                        class="card-img-top" alt="">
                                </td>
                                <td><?=$sp['tensp']?></td>
                                <td><?= number_format($sp['gia']) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary <?=($sp['soluong']<= 1)?'disabled':'' ?>" href="<?=APPURL?>product/cartItem/<?=$sp['madh']?>/<?=$sp['masp']?>/less">-</a>
                                    <?=$sp['soluong']?>
                                    <a class="btn btn-sm btn-outline-primary <?=($sp['soluong']>= $sp['tonkho'])?'disabled':'' ?>" href="<?=APPURL?>product/cartItem/<?=$sp['madh']?>/<?=$sp['masp']?>/more">+</a>
                                </td>
                                <td><?=number_format($sp['soluong'] * $sp['gia'])?>đ</td>
                                <td><a href="<?=APPURL?>product/cartItem/<?=$sp['madh']?>/<?=$sp['masp']?>/remove" class="btn btn-outline-danger btn-sm">Xóa</a></td>
                            </tr>
                            
                            <?php
                            $tongtien+= $sp['soluong'] * $sp['gia'] ;
                            $soluong+= $sp['soluong'];
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-end" colspan="4">Tổng thành tiền</th>
                                <th class="text-end"><?=number_format($tongtien)?>đ</th>
                                <th>
                                    <a href="" class="btn btn-outline-danger btn-sm">Xóa hết</a>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                <div class="cart-footer">
                    Tổng: <?=$soluong ?> sản phẩm
                </div>       


                <?php
                print_r($voucher);
                // print_r($voucher);
                $giagiam = 0;
                if(isset($voucher['giagiam'])){
                    $giagiam = $voucher['giagiam'];
                }
                else if(isset($voucher['giagiam'])){
                    $giagiam = min(($tongtien+$tienShip)*$voucher['tilegiam']/100,$voucher['giamtoida']);
                }
                
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <strong>Hóa đơn</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">Tạm tính</div>
                        <div class="col-6 text-end"><strong><?=number_format($tongtien)?>đ</strong></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">Phí giao hàng</div>
                        <div class="col-6 text-end"><strong><?=number_format($tienShip)?>đ</strong></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">Mã giảm giá</div>
                        <div class="col-6 text-end">
                            <strong>- <?=number_format($giagiam)?>đ</strong>
                        </div>
                        <div class="col-12 text-end">      
                        <form action="<?=APPURL?>order/addVoucher" method="post">    
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?= (isset($sp['magiamgia']))?$sp['magiamgia']:'' ?>" name="voucher">
                                <input type="hidden" name="madh" value="<?=$sp['madh']?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm ">SUBMIT</button>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">Tổng tiền</div>
                        <div class="col-6 text-end"><strong><?=
                            number_format($tongtien+$tienShip-$giagiam)
                        ?>đ</strong></div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary mt-2 d-block w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Đặt Hàng
            </button>
        </div>
    </div>
</div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <form method="POST" action='<?=APPURL?>order/addOrder'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin giao hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="HoTen" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" id="HoTen" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="DienThoai" class="form-label">Điện thoại</label>
                            <input type="number" class="form-control" id="DienThoai">
                        </div>
                        <div class="mb-3">
                            <label for="DiaChi" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="DiaChi">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Xác nhận & Đặt hàng</button>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" name="madh" value="<?=$sp['madh']?>">
    <input type="hidden" name="tongtien" value="<?=$tongtien+$tienShip-$giagiam?>">
    <input type="hidden" name="soluong" value="<?=$soluong?>">

    </form>
