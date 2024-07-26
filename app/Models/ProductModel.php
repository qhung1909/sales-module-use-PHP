<?php

class ProductModel extends CoreModel{
    public function getAll(){
        return $this->db->pdo_query('SELECT * From sanpham');
    }
    public function categories_getAll(){
        return $this->db->pdo_query('SELECT * From danhmuc');
    }
    public function product_getPin(){
        return $this->db->pdo_query('SELECT * FROM sanpham WHERE hide = 0 LIMIT 4');
    }
    public function product_search($keyword){
        return $this->db->pdo_query("SELECT * FROM sanpham WHERE ten_sanpham LIKE '%$keyword%'");
    }
    public function categories_getOne($iddm){
        return $this->db->pdo_query_one('SELECT * From danhmuc where iddm = ?',$iddm);
    }
    public function product_getCategories($iddm){
        return $this->db->pdo_query('SELECT * FROM sanpham where iddm =?',$iddm);
    }
    public function getDetailProducts($masp) {
        return $this->db->pdo_query_one('SELECT * FROM sanpham s INNER JOIN danhmuc dm ON s.iddm = dm.iddm WHERE s.masp = ?', $masp);
    }
    public function getRandProduct(){
        return $this->db->pdo_query('SELECT * From sanpham  ORDER BY rand() LIMIT 4');
    }
    
}