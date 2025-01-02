<?php

namespace MVC\Models;

use MVC\Model;
use MVC\Models\Address;

class Order extends Model {

    public function getProducts() {
        $productsData = $this->select('
            SELECT 
                `product_id`,
                `product_name`,
                `short_name`,
                `description`, 
                `price`, 
                `stock_quantity`, 
                `manufacturer`,
                `url`
            FROM products
        ', [] );

        return $productsData;
    }

    public function saveOrder() {
        if(isset($_SESSION['session_order_id']) ) return;

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $productsData = $this->getProducts();

        $productsDataId = [];
        foreach($productsData as $product ) {
            $productsDataId[$product['product_id']] = $product;
        }

        $orderProduct = [];
        $totalAmount = 0;
        $totalQuantity = 0;
        foreach($post as $productId => $value) {
            if( (int) $value <= 0) continue;

            if(isset($productsDataId[$productId]) ) {
                $productInfo = $productsDataId[$productId];

                $orderProduct[] = [
                    "product_id" => $productId,
                    "product_price" => $productInfo['price'],
                    "product_quantity" => $value
                ];

                $totalAmount += (float) $productInfo['price'] * (int) $value;
                $totalQuantity += (int) $value;
            }
        }

        $query = ["INSERT INTO `orders`(`users_id`, `total_amount`, `total_quantity`) VALUES (:users_id, :total_amount, :total_quantity)", [":users_id" => $_SESSION['user']['user_id'], ":total_amount" => $totalAmount, ":total_quantity" => $totalQuantity ] ];
        $orderId = $this->insertLastId($query);
        $_SESSION['session_order_id'] = $orderId;

        foreach($orderProduct as $product) {
            $this->edit(
                [
                    "INSERT INTO `orders_product`(`order_id`, `product_id`, `product_price`, `product_quantity`) VALUES (:order_id, :product_id, :product_price, :product_quantity)",
                    [":order_id" => $orderId, ":product_id" => $product['product_id'], ":product_price" => $product['product_price'], ":product_quantity" => $product['product_quantity'] ] 
                ]
            );
        }
    }

    public function getOrderProductsInfo(int $orderId) {
        $productsOrderData = $this->select('
            SELECT 
                    op.`orders_product_id`,
                    op.`product_price`,
                    ROUND(op.`product_quantity`, 2) AS product_quantity,
                    ROUND(op.`product_price` * op.`product_quantity`, 2) AS product_sum,
                    p.`product_id`,
                    p.`product_name`,
                    p.`short_name`,
                    p.`description`,
                    p.`stock_quantity`, 
                    p.`manufacturer`,
                    p.`url`
                FROM orders_product op
                JOIN products p ON p.product_id = op.product_id
            WHERE 
                order_id= :orderId
        ', [":orderId" => $orderId ] );

        return $productsOrderData;
    }

    public function getOrderInfo(int $orderId) {
        $orderData = $this->select('
            SELECT 
                    o.`order_id`, 
                    o.`users_id`, 
                    o.`address_id`, 
                    o.`total_amount`, 
                    o.`total_quantity`,
                    u.`firstname`,
                    u.`lastname`,
                    u.`email`,
                    u.`phone`,
                    a.`postal_code` AS postalcode,
                    a.`city`,
                    a.`street`,
                    a.`number`,
                    o.`created_at`, 
                    o.`updated_at`
                FROM orders o
                JOIN users u ON u.user_id = o.users_id
                LEFT JOIN address a ON a.address_id = u.address_id
            WHERE 
                order_id = :orderId
        ', [":orderId" => $orderId ] );

        return $orderData[0];
    }

    public function confirmOrder(int $orderId) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $addres = new Address();
        $addressId = $addres->addAddress($post);

        $this->edit(
            [
                "UPDATE `orders` SET `address_id` = :address_id WHERE order_id = :order_id",
                [":address_id" => $addressId, ":order_id" => $orderId ] 
            ]
        );

        $_SESSION['message_type'] = "success";
        $_SESSION['message'] = 'Złożono zamowienie, czekaj na email z potwierdzeniem.';
    }
}

?>