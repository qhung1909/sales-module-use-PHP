<?php
class AdminController extends CoreController{
    public function index(){
        $this ->loadViewAdmin('admin_index'); 
    }

}