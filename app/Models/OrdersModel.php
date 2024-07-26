<?php

class OrdersModel extends CoreModel{
    public function getCartByUser($matk){
        return $this->db->pdo_query_one("SELECT * FROM donhang WHERE matk = ? AND trangthai = 'gio-hang'", $matk);
    }
    public function addCart($matk){
        return $this->db->pdo_execute("INSERT INTO donhang(`matk`) VALUES(?)",$matk);
    }
    public function addProductToCart($madh,$masp){
        $kq = $this->hasCart($madh,$masp);
        if($kq){// Đã có SP trong Cart -> Tăng SL sản phẩm lên
            return $this->db->pdo_execute("UPDATE chitietdonhang SET soluong = soluong + 1 WHERE madh = ? AND masp = ?",$madh,$masp);
        } else{  // Chưa có SP trong Cart -> Thêm SP vào
            return $this->db->pdo_execute("INSERT INTO chitietdonhang(`madh`,`masp`) VALUES(?,?) ",$madh,$masp);
        }
    }
    public function hasCart($madh,$masp){
        return $this->db->pdo_query_one("SELECT * FROM chitietdonhang WHERE madh = ? AND masp = ?",$madh,$masp);
    }
    public function getProductsInCart($matk){   
        return $this->db->pdo_query("SELECT dh.madh, sp.masp, sp.tensp, sp.gia, ct.soluong, sp.img, sp.soluong as tonkho FROM donhang dh 
        INNER JOIN chitietdonhang ct ON dh.madh=ct.madh 
        INNER JOIN sanpham sp ON sp.masp = ct.masp 
        WHERE dh.matk = ? AND dh.trangthai = 'gio-hang'", $matk);
    }
    public function increaseItem($madh,$masp){
        return $this->db->pdo_execute("UPDATE chitietdonhang SET soluong = soluong + 1 WHERE madh = ? AND masp = ? ",$madh,$masp);
    }

    public function decreaseItem($madh,$masp){
        return $this->db->pdo_execute("UPDATE chitietdonhang SET soluong = soluong - 1 WHERE madh = ? AND masp = ? ",$madh,$masp);
    }
    
    public function removeItem($madh,$masp){
        return $this->db->pdo_execute("DELETE FROM chitietdonhang WHERE madh = ? AND masp = ? ",$madh,$masp);
    }
    public function addVoucher($madh,$voucher){
        return $this->db->pdo_execute("UPDATE donhang SET magiamgia = ? WHERE madh = ? ",$voucher,$madh);
    }
    public function addOrder($madh, $soluong, $tongtien){
        // Chốt đơn
         $this->db->pdo_execute("UPDATE donhang SET soluongsp = ? , tongtien = ?, ngaydat = ?, trangthai ='cho-giao'
        WHERE madh = ?", $soluong , $tongtien,date('y-m-d h:i:s'), $madh);

        // Chốt giá
        $this->db->pdo_execute("UPDATE chitietdonhang ct SET giaban = (
            SELECT gia FROM sanpham sp WHERE ct.masp = sp.masp
         ) 
         WHERE madh = ? ",$madh);
    }
}