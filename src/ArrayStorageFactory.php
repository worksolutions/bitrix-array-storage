<?php
/**
 * @author Smotrov Dmitriy <dsxack@gmail.com>
 */

namespace WS\Bitrix\ArrayStorage;


class ArrayStorageFactory {
    /**
     * @param $name
     * @return AbstractArrayStorage
     */
    public static function make($name) {
        global $USER;

        if ($USER->IsAuthorized()) {
            return new DatabaseArrayStorage($USER->GetID(), $name);
        }

        return new SessionArrayStorage($name);
    }
} 