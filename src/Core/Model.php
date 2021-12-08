<?php 

namespace Core;

use App\QueryBuilder\Model\QueryBuilder;

class Model extends QueryBuilder
{
    private $mustHaveProperty = [
        'table',
        'primaryKey',
    ];

    public function __get($property)
    {
        foreach ($this->mustHaveProperty as $key => $value) {
            if (!isset($this->$value)) {
                echo 'Exception: Property <b>' . $value . '</b> must be defined in class <b>' . get_class($this) . '</b>';
                die();
            }
        }

        return $this->$property;
    }

    public function lastOrder()
    {
        $tableColumn = $this->columnExists('urutan');
        if (!$tableColumn) {
            echo 'Undefined column "urutan" in table "'.$this->table.'"';
            die();
        }

        $lastData = $this->orderBy('created_at', 'DESC')->first();
        if (!$lastData) {
            $lastOrder = 1;
        } else {
            $lastOrder = intval($lastData['urutan']) + 1;
        }

        return $lastOrder;
    }
}
