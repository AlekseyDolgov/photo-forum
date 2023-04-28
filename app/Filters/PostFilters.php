<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilters
{
    public function apply(Builder $query, $filters)
    {
        foreach ($filters as $filterName => $value) {
            $methodName = 'filterBy' . ucfirst($filterName);

            if (method_exists($this, $methodName)) {
                $this->$methodName($query, $value);
            }
        }

        return $query;
    }

    public function filterByTitle(Builder $query, $value)
    {
        $query->where('title', 'LIKE', '%' . $value . '%');
    }

    public function filterByUserId(Builder $query, $value)
    {
        $query->where('user_id', $value);
    }

    public function filterByChannelId(Builder $query, $value)
    {
        $query->where('channel_id', $value);
    }
}
