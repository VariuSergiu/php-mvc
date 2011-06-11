<?php

class ProductController extends AppController
{
    
    public function index()
    {
        include FRAMEWORK_PATH . '/protected/models/product.php';
        $product = new Product();
        $data = $product->findAll();
        $this->registry->template->data = $data;
        $this->registry->template->show('index');
        
    }

    public function add()
    {
        include FRAMEWORK_PATH . '/protected/models/product.php';
        $product = new Product();
        $id = $_GET['id'];
        $add_item = $product->addToCart($id);
        $_SESSION['total_items'] = $product->totalProducts($_SESSION['cart']);
        $_SESSION['total_price'] = $product->totalPrice($_SESSION['cart']);
        header("Location: index");
    }

    public function checkout()
    {
        include FRAMEWORK_PATH . '/protected/models/product.php';
        $product = new Product();
        $this->registry->template->product = $product;
        $this->registry->template->welcome = 'the checkout page';
        $this->registry->template->show('checkout');
    }

    public function update()
    {
        include FRAMEWORK_PATH . '/protected/models/product.php';
        $product = new Product();
        $product->update_cart();
        $_SESSION['total_items'] = $product->totalProducts($_SESSION['cart']);
        $_SESSION['total_price'] = $product->totalPrice($_SESSION['cart']);
        //$this->registry->template->show('update');
        header("Location: checkout");
    }


}


?>