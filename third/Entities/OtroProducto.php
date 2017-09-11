<?php
/**
 * Created by PhpStorm.
 * User: jsinner
 * Date: 10/09/17
 * Time: 11:19 PM
 */

namespace Entities;

use Core\Producto;

/**
 * Class User
 * @package Entities
 */
class OtroProducto extends Producto {

    public function getProductsCount() {
        return parent::getProductsCount() * 100;
    }

}