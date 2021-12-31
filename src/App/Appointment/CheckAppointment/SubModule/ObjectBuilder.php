<?php

namespace App\Appointment\CheckAppointment\SubModule;

use Core\Model;

class ObjectBuilder
{
    private $object;
    private $bothOption = false;

    public function add(string $type, Model $model) : ObjectBuilder
    {
        $this->object[] = [
            'type' => $type,
            'model' => $model,
            'message' => '',
            'result' => ''
        ];

        return $this;
    }

    public function usingBothOption() : ObjectBuilder
    {
        $this->bothOption = true;

        return $this;
    }

    public function getObject()
    {
        return $this->object;
    }

    public function getOption()
    {
        return $this->bothOption;
    }

    public function setObject(string $type, string $object_key, $object_value) : ObjectBuilder
    {
        foreach ($this->object as $key => $value) {
            if ($value['type'] == $type) {
                $this->object[$key][$object_key] = $object_value;
            }
        }

        return $this;
    }

    public function isEmpty()
    {
        if (empty($this->object)) {
            echo 'Object is empty';
            die();
        }
    }

    public function getResult()
    {
        $result = [];

        foreach ($this->object as $key => $value) {
            $result[$value['model']->table] = $value['result'];
        }

        return $result;
    }
}
