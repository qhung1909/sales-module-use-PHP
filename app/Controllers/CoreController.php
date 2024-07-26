<?php
class CoreController{

    protected $data;

    public function loadView($viewName, $data = []) {
        if (isset($this->data['categories'])) {
            $data['categories'] = $this->data['categories'];
        }
        extract($data);
        include_once '../app/Views/layout_header.php';
        include_once '../app/Views/'.$viewName.'.php';
        include_once '../app/Views/layout_footer.php';
    }

    public function loadViewAdmin($viewName, $data = []){
        extract($data);
        include_once '../app/Views/layout_admin_header.php';
        include_once '../app/Views/'.$viewName.'.php';
        include_once '../app/Views/layout_admin_footer.php';
    }

    public function loadCategories($data = []) {
        extract($data);
        $product = $this->loadModel('Product');
        $this->data['categories'] = $product->categories_getAll();
    }

    public function loadModel($modelName){
        // $modelName = 'user';
        // -> userModel.
        // -> new userModel() 
        $model = $modelName."Model";
        return new $model();
    }
    
}


?>