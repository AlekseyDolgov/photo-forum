<?php

namespace App\Filters;
use Illuminate\Http\Request;

class Filters
{
    protected $request;
    protected $builder;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    public function getFilters()
    {
        $input = $this->request->all();
        return array_filter($input, function($key) {
            return $key;
        }, ARRAY_FILTER_USE_KEY);
    }
}
