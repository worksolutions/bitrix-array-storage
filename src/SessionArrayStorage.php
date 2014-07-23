<?php
/**
 * @author Pomiluyko Igor
 * @author Smotrov Dmitriy <dsxack@gmail.com>
 */
namespace WS\Bitrix\ArrayStorage;


class SessionArrayStorage extends AbstractArrayStorage {

    public function get() {
        global $USER;

        $data = $USER->GetParam($this->getName());

        return $data ?: array();
    }

    protected function set($data){
        global $USER;

        $USER->SetParam($this->getName(), $data);

        return $this;
    }
}