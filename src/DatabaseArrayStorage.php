<?php
/**
 * @author Pomiluyko Igor
 * @author Smotrov Dmitriy <dsxack@gmail.com>
 */
namespace WS\Bitrix\ArrayStorage;


use CUser;

class DatabaseArrayStorage extends AbstractArrayStorage {

    private $userId;

    public function __construct($userId, $name) {
        $this->userId = $userId;

        parent::__construct('UF_' . $name);
    }

    public function get(){
        $arUser = CUser::GetByID($this->userId)->Fetch();

        return $arUser[$this->getName()] ?: array();
    }

    protected function set($data){
        $user = new CUser;

        $user->Update($this->userId, array(
            $this->getName() => $data
        ));

        return $this;
    }
}