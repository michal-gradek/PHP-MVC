<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\Order;
use MVC\Models\User;

class OrderController extends Controller {
    public function cart() {
        if(isset($_SESSION['is_logged_in']) && !isset($_SESSION['session_order_id']) ) {
            $model = new Order();
            $products = $model->getProducts();

            $this->render('order/cart', [ "products" => $products ] );
        } elseif(isset($_SESSION['is_logged_in']) && isset($_SESSION['session_order_id'])) {
            $this->redirect('order/checkout');
        } else {
            $this->redirect('user/login');
        }
    }

    public function checkout() {
        $model = new Order();
        $model->saveOrder();

        $orderProductsInfo = $model->getOrderProductsInfo($_SESSION['session_order_id']);
        $orderInfo = $model->getOrderInfo($_SESSION['session_order_id']);

        if( !empty($orderProductsInfo) ) {
            $this->render('order/checkout', [ "orderInfo" => $orderInfo, "orderProductsInfo" => $orderProductsInfo ] );
        } else {
            unset($_SESSION['session_order_id']);
            $this->redirect('order/cart');
        }
    }

    public function confirm() {
        $model = new Order();

        if(isset($_SESSION['session_order_id']) ) {
            $model->confirmOrder($_SESSION['session_order_id']);
            unset($_SESSION['session_order_id']);
        }

        $this->redirect('');
    }
}

?>