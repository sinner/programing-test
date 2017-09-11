<?php
/**
 * Created by PhpStorm.
 * User: jsinner
 * Date: 10/09/17
 * Time: 08:23 PM
 */

namespace Core;

/**
 * Class myIterator
 * @package Core
 */
class MyIterator implements \Iterator, \Countable {

    private $position = 0;

    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function setData(array $data){
        $this->array = $data;
        $this->rewind();
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }

    public function count() {
        return count($this->array);
    }

}
