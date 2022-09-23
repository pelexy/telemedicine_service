<?php

namespace App\QueryFilters;





class Isavailable extends Filter
{

  protected function applyFilter($builder)
  {
    return $builder->where($this->filterName(),request($this->filterName()));
  }
}