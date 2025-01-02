<?php

namespace MVC\Models;

use MVC\Model;

class Dashboard extends Model {

    public function getOrderCountDaily() {
        $orderData = $this->select('
            SELECT count( o.`order_id` ) AS counts
                FROM orders o
            WHERE
                DATE(created_at) = CURDATE()
        ', [] );

        return $orderData[0]['counts'];
    }

    public function getOrderCountWeek() {
        $orderData = $this->select('
            SELECT count( o.`order_id` ) AS counts
                FROM orders o
            WHERE
                WEEK(o.created_at) = WEEK(CURRENT_DATE())
        ', [] );

        return $orderData[0]['counts'];
    }

    public function getOrderCountMonth() {
        $orderData = $this->select('
            SELECT count( o.`order_id` ) AS counts
                FROM orders o
            WHERE 
                MONTH(created_at) = MONTH(CURRENT_DATE())
            AND 
                YEAR(created_at) = YEAR(CURRENT_DATE())
        ', [] );

        return $orderData[0]['counts'];
    }

    public function getOrderValueDaily() {
        $orderData = $this->select('
            SELECT SUM( o.`total_amount` ) AS val
                FROM orders o
            WHERE 
                DATE(created_at) = CURDATE()
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getOrderValueWeek() {
        $orderData = $this->select('
            SELECT SUM( o.`total_amount` ) AS val
                FROM orders o
            WHERE 
                WEEK(o.created_at) = WEEK(CURRENT_DATE())
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getOrderValueMonth() {
        $orderData = $this->select('
            SELECT SUM( o.`total_amount` ) AS val
                FROM orders o
            WHERE 
                MONTH(created_at) = MONTH(CURRENT_DATE())
            AND 
                YEAR(created_at) = YEAR(CURRENT_DATE())
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getOrderProfitDaily() {
        $orderData = $this->select('
            SELECT ROUND(SUM( (op.product_price * op.product_quantity) - (p.cost * op.product_quantity) ),2) AS val
                FROM `orders` o
                JOIN `orders_product` op ON op.order_id = o.order_id
                JOIN `products` p ON p.product_id = op.product_id
            WHERE
                DATE(o.created_at) = CURDATE()
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getOrderProfitWeek() {
        $orderData = $this->select('
            SELECT ROUND(SUM( (op.product_price * op.product_quantity) - (p.cost * op.product_quantity) ),2) AS val
                FROM `orders` o
                JOIN `orders_product` op ON op.order_id = o.order_id
                JOIN `products` p ON p.product_id = op.product_id
            WHERE
                WEEK(o.created_at) = WEEK(CURRENT_DATE())
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getOrderProfitMonth() {
        $orderData = $this->select('
            SELECT ROUND(SUM( (op.product_price * op.product_quantity) - (p.cost * op.product_quantity) ),2) AS val
                FROM `orders` o
                JOIN `orders_product` op ON op.order_id = o.order_id
                JOIN `products` p ON p.product_id = op.product_id
            WHERE 
                MONTH(o.created_at) = MONTH(CURRENT_DATE())
            AND 
                YEAR(o.created_at) = YEAR(CURRENT_DATE())
        ', [] );

        return (isset($orderData[0]['val']) ? $orderData[0]['val'] : 0);
    }

    public function getLastUserOrder() {
        $userData = $this->select('
            SELECT u.firstname, u.lastname, total_quantity AS counts, o.total_amount AS val, o.order_status
                FROM `orders` o
                JOIN users u ON u.user_id = o.users_id
            ORDER BY o.`updated_at` DESC, o.`created_at` DESC
            LIMIT 5
        ', [] );

        return $userData;
    }
    
    public function getOrderUserTop() {
        $userData = $this->select('
            SELECT u.firstname, u.lastname, COUNT(DISTINCT o.order_id) AS counts, SUM(o.total_amount) AS val
                FROM orders o
                JOIN users u ON u.user_id = o.users_id
            GROUP BY o.users_id
            ORDER BY counts DESC, val DESC
            LIMIT 5
        ', [] );

        return $userData;
    }

    public function getOrderStatus() {
        return [
            0 => [ "text" => "W trakcie", "color" => "warning" ], 
            1 => [ "text" => "Zrealizowano", "color" => "success" ], 
            2 => [ "text" => "W trakcie", "color" => "warning" ], 
            3 => [ "text" => "Anulowano", "color" => "danger" ]
        ];
    }

    public function getProductsName() {
        $productsData = $this->select('
            SELECT product_name 
                FROM products  
        ', [] );

        $result = [];
        foreach($productsData as $product) {
            $result[] = $product['product_name'];
        }

        return $result;
    }

    public function getChartDataDaily() {
        $products = $this->getProductsName();

        $data = $this->select('
            SELECT p.product_name, IF( op.order_id IS NULL, 0,ROUND(SUM( (op.product_price * op.product_quantity) ),0) ) AS val, SUM(op.product_quantity) AS counts
                FROM `products` p
                LEFT JOIN `orders_product` op ON op.product_id = p.product_id
                LEFT JOIN `orders` o ON o.order_id = op.order_id
            WHERE
                DATE(o.created_at) = CURDATE()
            GROUP BY op.product_id
        ', [] );

        $result = [];
        foreach($products as $product) {
            $result[$product] = ["val" =>  0, "counts" =>  0 ];
        }

        foreach($data as $val) {
            $result[$val['product_name']]["val"] = $val['val'];
            $result[$val['product_name']]["counts"] = $val['counts'];
        } 

        return $result;
    }

    public function getChartDataWeek() {
        $products = $this->getProductsName();

        $data = $this->select('
            SELECT p.product_name, IF( op.order_id IS NULL, 0,ROUND(SUM( (op.product_price * op.product_quantity) ),0) ) AS val, SUM(op.product_quantity) AS counts
                FROM `products` p
                LEFT JOIN `orders_product` op ON op.product_id = p.product_id
                LEFT JOIN `orders` o ON o.order_id = op.order_id
            WHERE 
                WEEK(o.created_at) = WEEK(CURRENT_DATE())
            AND 
                YEAR(o.created_at) = YEAR(CURRENT_DATE())
            GROUP BY op.product_id
        ', [] );

        $result = [];
        foreach($products as $product) {
            $result[$product] = ["val" =>  0, "counts" =>  0 ];
        }

        foreach($data as $val) {
            $result[$val['product_name']]["val"] = $val['val'];
            $result[$val['product_name']]["counts"] = $val['counts'];
        } 

        return $result;
    }

    public function getChartDataMonth() {
        $products = $this->getProductsName();

        $data = $this->select('
            SELECT p.product_name, IF( op.order_id IS NULL, 0,ROUND(SUM( (op.product_price * op.product_quantity) ),0) ) AS val, SUM(op.product_quantity) AS counts
                FROM `products` p
                LEFT JOIN `orders_product` op ON op.product_id = p.product_id
                LEFT JOIN `orders` o ON o.order_id = op.order_id
            WHERE 
                MONTH(o.created_at) = MONTH(CURRENT_DATE())
            AND 
                YEAR(o.created_at) = YEAR(CURRENT_DATE())
            GROUP BY op.product_id
        ', [] );

        $result = [];
        foreach($products as $product) {
            $result[$product] = ["val" =>  0, "counts" =>  0 ];
        }

        foreach($data as $val) {
            $result[$val['product_name']]["val"] = $val['val'];
            $result[$val['product_name']]["counts"] = $val['counts'];
        } 

        return $result;
    }


}

?>