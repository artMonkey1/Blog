<?php


namespace App\QueryFilters;


class Active extends Filter
{

    public function apply($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
