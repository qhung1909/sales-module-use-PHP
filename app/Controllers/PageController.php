<?php
//Load Model hoặc Load view, không đc echo view ra ở đây!!
class PageController extends CoreController{
    public function index(){
        //Load Model
        $this->loadCategories(); 
        $product = $this->loadModel('Product');
        $data['dsSP2'] = $product->getAll();
        $data['dsPin'] = $product ->product_getPin(4);
        $data['categories'] = $product->categories_getAll();
        $this ->loadView('page_index',$data); 
    }
    public function contact(){
        $this->loadCategories(); 
        $this->loadView('page_contact');
    }
    public function about(){
        echo 'About';
    }
    public function error(){
        $this->loadView('page_error');
    }

}