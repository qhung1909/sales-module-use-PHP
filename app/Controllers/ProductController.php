<?php

class ProductController extends CoreController{
    public function tracking(){
        $this->loadView('page_tracking');
    }
    public function categories($iddm){
        $this->loadCategories(); 
        $product = $this->loadModel('Product'); 
        $data['categoriesGet'] = $product->categories_getOne($iddm);
        $data['productCategories'] = $product->product_getCategories($iddm);
        $this->loadView('page_categories',$data);
        
    }
    public function detail($masp){
        $this->loadCategories(); 
        $product = $this->loadModel('Product'); 
        $data['detail'] = $product->getDetailProducts($masp);
        if (!$data['detail']) {
            header("HTTP/1.0 404 Not Found");
            $this->loadView('page_error');
            exit();
        }
        
        $data['rand'] = $product->getRandProduct();
        $this->loadView('page_detail', $data); 
    }
    
    public function addToCart($masp) {
        // Đã đăng nhập -> lưu vào database
        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user']['matk'];
            $order = $this->loadModel('Orders');
            $cart = $order->getCartByUser($matk);
            if (!$cart) {
                // Chưa có giỏ hàng -> Tạo giỏ hàng
                $order->addCart($matk);
                $cart = $order->getCartByUser($_SESSION['user']['matk']);
            }
    
            // Thêm SP vào giỏ
            // $Cart tức là đơn hàng -> gio-hang -> madh
            // Đã có giỏ hàng -> Thêm SP vào giỏ
            $result = $order->addProductToCart($cart['madh'], $masp);
            print_r($result);
            if ($result) {
                header('Location: '.APPURL.'product/cart');
                exit;
            }
        } else {
            // Chưa đăng nhập -> Lưu vào Session
            // Chưa có giỏ hàng -> Tạo giỏ hàng
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $found = false;
            $i = 0;
            foreach ($_SESSION['cart'] as $sp) {
                if ($sp['masp'] == $masp) { // Đã có SP -> tăng SLuong lên
                    $_SESSION['cart'][$i]['soluong']++;
                    $found = true;
                    break;
                }
                $i++;
            }
            if (!$found) {
                array_push($_SESSION['cart'], [
                    "masp" => $masp,
                    "soluong" => 1,
                ]);
            }
            // Có giỏ hàng thì thêm SP
            // SP có chưa
            // Có rồi thì tăng SLuong
        }
    }
    
    public function cart() {
        $this->loadCategories(); 
        // Đã đăng nhập -> load cart từ database
        $order = $this->loadModel('Orders');
        $voucher = $this->loadModel('Vouchers');
        if (isset($_SESSION['user'])) {
            $cart = $order->getProductsInCart($_SESSION['user']['matk']);
            if (isset($cart[0]['magiamgia'])) {
                $data['voucher'] = $voucher->getById($cart[0]['magiamgia']);
                print_r($data['voucher']);
            }
        }
        $data['cart'] = $cart;
        // Chưa đăng nhập -> Load cart từ SESSION VÀ DATABASE
        $this->loadView('page_cart',$data);
    }
    

    public function cartItem($madh, $masp, $loai){
        $this->loadCategories(); 
        $order = $this->loadModel('Orders');
        if($loai == 'more'){
            $order->increaseItem($madh,$masp);
        }
        else if($loai == 'remove'){
            $order->removeItem($madh,$masp);
        }
        else{
            $order->decreaseItem($madh,$masp);
        }
        header('Location: '.APPURL.'product/cart');
    }
}
