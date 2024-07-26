<?php

class VouchersModel extends CoreModel{
    public function checkVoucher($magiamgia){
         $voucher =$this->db->pdo_query_one('SELECT * From magiamgia WHERE magiamgia = ? ',$magiamgia);
         if(!$voucher) return false;

         if($voucher['soluong']<=0) return false;

         $now = new DateTime();
         if(!(new DateTime($voucher['ngaybatdau']) <= $now && $now <= new DateTime($voucher['ngayketthuc']))){
            return false;
         }
         
         return true;
    }

    public function getById($magiamgia){
        return $this->db->pdo_query_one('SELECT * FROM magiamgia WHERE magiamgia = ?',$magiamgia);
    }

}