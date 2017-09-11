<?php

namespace Core;

/**
 * Class Model
 * @package Core
 */
class Producto {

    private $mysqli;

    public function __construct() {
        $this->mysqli = $mysqli = new \mysqli("localhost", "my_user", "my_password", "productos_db");;
    }

    public function getProductsCount() {
        $sql = 'SELECT COUNT(*) AS total FROM productos';
        $result = $this->mysqli->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

}