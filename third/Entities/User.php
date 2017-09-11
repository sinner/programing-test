<?php

namespace Entities;

use Core\Model;

/**
 * Class User
 * @package Entities
 */
class User extends Model {

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $dni;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * User constructor.
     * @param int $id
     * @param string $dni
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct($id, $dni, $firstName, $lastName) {
        $this->id = $id;
        $this->dni = $dni;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDni(): string {
        return $this->dni;
    }

    /**
     * @param string $dni
     * @return User
     */
    public function setDni(string $dni): User {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User {
        $this->lastName = $lastName;
        return $this;
    }

    public static function isValidate(string $date): bool {
        list($day, $month, $year) = explode('/', $date);
        return checkdate((int)$month, (int)$day, (int)$year);
    }

    public static function verifyDate(string $date): bool {
        return (\DateTime::createFromFormat('d/m/Y', $date) !== false);
    }

}