<?php
/**
 * @author Smotrov Dmitriy <dsxack@gmail.com>
 */

namespace WS\Bitrix\ArrayStorage;


abstract class AbstractArrayStorage {
    private $name;

    abstract public function get();

    abstract protected function set($data);

    public function __construct($name) {
        $this->name = $name;
    }

    protected function getName() {
        return $this->name;
    }

    public function add($id) {
        $elements = $this->get();
        $elements[] = $id;
        $elements = array_unique($elements);

        $this->set($elements);

        return true;
    }

    public function delete($id) {
        $elements = $this->get();
        $elements = array_diff($elements, array($id));
        $this->set($elements);

        return $this;
    }

    public function has($id) {
        return in_array($id, $this->get());
    }
} 