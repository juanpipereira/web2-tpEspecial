<?php
    require_once('./models/productsModel.php');
    require_once('./views/productsView.php');
    // require_once('../models');
    // require_once('./views');

    class ProductsController{
        private $pModel;
        private $mModel;
        private $view;

        public function __construct(){
            $this->pModel = new ProductsModel();
            $this->mModel = new ModelsModel();
            $this->view = new ProductsView();
        }

        public function commandProducts(){
            $products = $this->pModel->getProducts();
            $models = $this->mModel->getModels();
            
            $this->view->showProducts($products, $models);
        }
        // This mustn't change ^

        // ----------------------------------------------
        // public function commandModels(){
        // }
        // ----------------------------------------------

        public function commandProduct($prod_name){
            $product = $this->pModel->findProduct($prod_name);
            $productFound = $this->pModel->getProduct($product);
            $models = $this->mModel->getSpecificModels($productFound);

            $this->view->showProducts($productFound, $models);
        }

        // public function commandAddProduct(){
        //     addProduct
        // }

        // public function commandEditProduct(){
        //     editProduct
        // }

        // public function commandDelProduct(){
        //     delProduct
        // }

        // // This must be here because it's not the phone's models
        // // responsability to know about the other models.
        // // This is an extra form.
        // public function commandAddModel(){
        //     $m_name = $_POST['m_name'];
        //     $m_description = $_POST['m_description'];
        //     $m_photo = $_POST['m_photo'];
        //     $modToTest = $this->mModel->getModels();

        //     $i = false;
        //     foreach ($modToTest as $mtt){
        //         if(!$mtt->m_nombre == $m_name){
        //             $i = true;
        //         }
        //     }
        //     if($i){
        //         $this->mModel->addModel(array($m_name, $m_description, $m_photo));
        //     }

        //     commandProducts();
        // }
    }
        

        // public function commandProduct($prod_id){
        //     $product = $this->model->getProduct($prod_id);
        //     $this->view->showProducts(array($product));
        // }
        // WRONG: we do not use an id anymore - we need a name

        // public function commandSmartphones(){
        //     $models = $this->model->getSmartphones();
        //     $this->view->showItem();
        // } 

        // public function commandProducts($prods){
        //     switch ($prods) {
        //         case 'smartphones':
        //             $products = $this->model->getSmartphones();
        //             break;
        //         case 'laptops':
        //             $products = $this->model->getLaptops();
        //             break;
        //         case 'tablets':
        //             $products = $this->model->getTablets();
        //             break;
        //     }
        //     $this->view->displayProducts();
        // }

        // public function setProductTitle(){

        // }