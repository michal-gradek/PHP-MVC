<?php

namespace MVC\Models;

use MVC\Model;

class Address extends Model {

    public function addAddress(array $data) {
        $addressId = $this->insertLastId(
             [
                 "INSERT INTO `address`(`street`, `city`, `number`, `postal_code`) VALUES (:street, :city, :numbers, :postal_code)",
                 [":street" => $data['street'], ":city" => $data['city'], ":numbers" => $data['number'], ":postal_code" => $data['postalcode'] ] 
             ]
         );
 
         return $addressId;
    }

}

?>