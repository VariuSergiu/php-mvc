<?php

include FRAMEWORK_PATH . '/protected/lib/database/' . 'mapper.class.php';

class Product extends DbMapper
{
    public $table = 'products';
    public $id = null;
    public $title = null;
    public $body = null;
    public $price = null;
    public $image = null;

    public function addToCart($id)
    {
        if (isset ($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
            return true;
        } else {
            $_SESSION['cart'][$id] = 1;
            return true;
        }
        return false;
    }

    public function totalProducts($cart)
    {
        $totalProducts = 0;
        if (is_array ($cart)) {
            foreach ($cart as $id=>$quantity) {
                $totalProducts += $quantity;
            }
        }
        return $totalProducts;
    }

    public function totalPrice($cart)
    {
        $totalPrice = 0;
        $dbh = Database::getInstance();
        if (is_array ($cart)) {
            foreach ($cart as $id=>$quantity) {
                $sql = "SELECT price FROM {$this->table}
                        WHERE id={$id}";
                //$dbh->doQuery($sql);
                $dbh->fetchAllFromDb($sql);
                $result = $dbh->loadObjectList();
                if ($result) {
                    foreach ($result as $results) {
                    $totalPrice += $results['price'] * $quantity;
                    }
                }
            }
        }
        return $totalPrice;
    }

    public function update_cart()
    {
        foreach ($_SESSION['cart'] as $id=>$qty) {
            if ($_POST[$id] == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id] = $_POST[$id];
            }
        }
    }

    
}


?>