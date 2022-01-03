<?php

namespace App\ContentAdmin\SubModule;

use Closure;
use Core\Model;

class CustomQuery
{
    private $addQuery;
    private $newQuery;

    public function getAddQuery()
    {
        return $this->addQuery;
    }

    public function getNewQuery()
    {
        return $this->newQuery;
    }

    public function query($query)
    {
        $this->addQuery = $query;
    }

    public function newQuery(Model $model, Closure $query, string $variable = null)
    {
        $this->newQuery[] = [
            'variable' => $variable != null ? $variable : $model->table,
            'model' => $model,
            'query' => $query
        ];
    }

    public function execNewQuery()
    {
        $variables = [];
        foreach ($this->newQuery as $key => $value) {
            $variables[$value['variable']] = $value['query']($value['model']);
        }

        return $variables;
    }
}
