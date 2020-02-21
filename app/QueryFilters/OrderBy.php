<?php


namespace App\QueryFilters;


class OrderBy extends Filter
{
    public function apply($builder)
    {
        return $builder->orderBy(request($this->filterName()), request('dir'));
    }
}
