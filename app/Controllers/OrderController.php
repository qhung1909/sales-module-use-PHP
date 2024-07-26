<?php

class OrderController extends CoreController{
    public function addVoucher(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order = $this->loadModel('Orders');
            $voucher = $this->loadModel('Vouchers');
            if($voucher->checkVoucher($_POST['voucher'])){
                $order->addVoucher($_POST['madh'], $_POST['voucher']);
            }
            else{
                showNoti("Mã giảm giá không hợp lệ hoặc không đủ điều kiện sử dụng","danger");
            }
            //Check voucher hợp lệ
            //Nếu hợp lệ -> addToOrders
            header('Location: '.APPURL.'product/cart');   
            //Nếu không hợp lệ -> Không thêm & thông báo
        }
    }

    public function addOrder(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $order = $this->loadModel('Orders');
        $order->addOrder($_POST['madh'], $_POST['soluong'], $_POST['tongtien']);
        showNoti('Đặt hàng thành công, Đơn hàng của bạn sẽ được xử lí', 'success');
        header('Location: '.APPURL);
        }

    }
}