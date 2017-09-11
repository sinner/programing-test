<?php

namespace Core;

/**
 * Class Model
 * @package Core
 */
class Model {

    public function getMyClassName(): array {
        return [
            'What you are looking for?',
            get_class($this),
            get_called_class(),
            get_parent_class($this),
        ];
    }

    public static function getMyClassNameFromStatic(): string {
        return get_called_class();
    }

}